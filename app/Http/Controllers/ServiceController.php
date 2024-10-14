<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Service;
use App\Models\ServiceView;
use App\Rules\MetaDataLength;
use App\Traits\ImageTrait;
use App\Traits\SitemapTrait;
use App\Traits\SlugifyTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    use ImageTrait;
    use SitemapTrait;
    use SlugifyTrait;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('single');
    }

    /**
     * Show single service web page
     * @param string $url
     * @return View
     */
    public function single(string $url): View
    {
        $service = Service::where('url', $url)->first();
        if(!$service){
            abort(404);
        }
        if(!Auth::check()){
            $view = new ServiceView();
            $view->service_id = $service->id;
            $view->save();
        }
        $calls = null;
        if($url == 'call-tracking-colorado'){
            $calls = Call::orderBy('start', 'desc')->take(4)->get();
        }
        return view('web.services.' . $service->view)->with([
            'title' => $service->name,
            'metaTitle' => $service->meta_title,
            'description' => $service->meta_description,
            'keywords' => $service->keywords,
            'metaImage' => asset('storage/services/meta/'.$service->id.'.jpg'),
            'schema' => 4,
            'noIndex' => false,
            'service' => $service,
            'calls' => $calls
        ]);
    }

    /**
     * Show services admin page
     * @return View
     */
    public function index(): View
    {
        return view('app.service.index')->with([
            'title' => 'services.title',
            'services' => Service::with('views')->get()
        ]);
    }

    /**
     * Show new service page
     * @return View
     */
    public function new(): View
    {
        return view('app.service.form')->with([
            'title' => 'services.add',
            'service' => new Service()
        ]);
    }

    /**
     * Handle new service request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $service = new Service();
        $validator = $this->validateService($request->all(), $service);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($service, $request->all())){
            $this->sitemap();
            $results = $this->processCustomImage($request->file('image'), ['folder' => 'services/meta/', 'width' => 1201, 'height' => 628, 'id' => $service->id, 'number' => null]);
            $this->processProductImage($request->file('image'), ['folder' => 'services', 'id' => $service->id,'number' => null]);
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
                return redirect()->route('services')->with([
                    'success' => 'services.created-success'
                ]);
        }
        return redirect()->back()->with([
            'error' => 'services.created-error'
        ]);
    }

    /**
     * Show service edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('app.service.form')->with([
            'title' => 'services.edit',
            'service' => Service::find($id)
        ]);
    }

    /**
     * Handle update service request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $service = Service::find($request->input('id'));
        if(!$request->hasFile('image')){
            $request->request->remove('image');
        }
        $validator = $this->validateService($request->all(), $service);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($service, $request->all())){
            $results = [];
            if($request->hasFile('image')) $results = $this->processCustomImage($request->file('image'), ['folder' => 'services/meta/', 'width' => 1201, 'height' => 628, 'id' => $service->id, 'number' => null]);
            $this->sitemap();
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
                return redirect()->route('services')->with([
                    'success' => 'services.updated-success'
                ]);
        }
        return redirect()->back()->with([
            'error' => 'services.updated-error'
        ]);
    }

    /**
     * Save service
     * @param Service $service
     * @param array $data
     * @return boolean
     */
    protected function save(Service $service,array $data): bool
    {
        $service->name = $data['name'];
        $service->description = $data['description'];
        $service->url = $data['url'] ?? $this->slugify($service->name);
        $service->view = $data['view'];
        $service->meta_title = $data['meta-title'];
        $service->meta_description = $data['meta-description'];
        $service->keywords = $data['keywords'];
        return $service->save();
    }

    /**
     * Get a validator for an incoming service registration request.
     * @param  array  $data
     * @param Service $service
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateService(array $data, Service $service): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required','min:2','max:50', Rule::unique('services')->ignore($service->id)],
            'description' => 'required',
            'image' => 'sometimes|required|image|max:10000',
            'meta-title' => ['required', new MetaDataLength()],
            'meta-description' => ['required', new MetaDataLength()],
            'keywords' => 'required|min:2|max:50000'
        ]);
    }

    /**
     * Delete service
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $service = Service::find($id);
        if($service){
            if($service->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'services.posts-related'
                ]);
            }
            $this->deleteOne('services', $service->id,1);
            if($service->delete()){
                $this->sitemap();
                return redirect()->route('services')->with([
                    'success' => 'services.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'services.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'services.non-existent'
        ]);
    }

    /**
     * Handle bulk service actions request
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        foreach ($request->input('id') as $id){
            $service = Service::find($id);
            if($service->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'services.posts-related'
                ]);
            } else{
                $this->deleteOne('services', $service->id,1);
                $service->delete();
            }
        }
        return redirect()->back()->with([
            'success' => 'services.delete-success'
        ]);
    }
}
