<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Category;
use App\Models\CategoryView;
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

class CategoryController extends Controller
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
     * Show single category web page
     * @param string $url
     * @return View
     */
    public function single(string $url): View
    {
        $category = Category::where('url', $url)->first();
        if(!$category){
            abort(404);
        }
        if(!Auth::check()){
            $view = new CategoryView();
            $view->category_id = $category->id;
            $view->save();
        }
        return view('web.services.' . $category->view)->with([
            'title' => $category->name,
            'metaTitle' => $category->meta_title,
            'description' => $category->meta_description,
            'keywords' => $category->keywords,
            'metaImage' => asset('storage/categories/meta/'.$category->id.'.jpg'),
            'schema' => 2,
            'noIndex' => false,
            'category' => $category
        ]);
    }

    /**
     * Show categories admin page
     * @return View
     */
    public function index(): View
    {
        return view('app.category.index')->with([
            'title' => 'categories.title',
            'categories' => Category::with('views')->get()
        ]);
    }

    /**
     * Show new category page
     * @return View
     */
    public function new(): View
    {
        return view('app.category.form')->with([
            'title' => 'categories.add',
            'category' => new Category()
        ]);
    }

    /**
     * Handle new category request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $category = new Category();
        $validator = $this->validateCategory($request->all(), $category);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($category, $request->all())){
            $this->sitemap();
            $results = $this->processCustomImage($request->file('image'), ['folder' => 'categories/meta/', 'width' => 1201, 'height' => 628, 'id' => $category->id, 'number' => null]);
            $this->processProductImage($request->file('image'), ['folder' => 'categories', 'id' => $category->id,'number' => null]);
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
            return redirect()->route('categories')->with([
                'success' => 'categories.created-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'categories.created-error'
        ]);
    }

    /**
     * Show category edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('app.category.form')->with([
            'title' => 'categories.edit',
            'category' => Category::find($id)
        ]);
    }

    /**
     * Handle update category request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $category = Category::find($request->input('id'));
        if(!$request->hasFile('image')){
            $request->request->remove('image');
        }
        $validator = $this->validateCategory($request->all(), $category);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($category, $request->all())){
            $results = [];
            if($request->hasFile('image')) $results = $this->processCustomImage($request->file('image'), ['folder' => 'categories/meta/', 'width' => 1201, 'height' => 628, 'id' => $category->id, 'number' => null]);
            $this->sitemap();
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
            return redirect()->route('categories')->with([
                'success' => 'categories.updated-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'categories.updated-error'
        ]);
    }

    /**
     * Save category
     * @param Category $category
     * @param array $data
     * @return boolean
     */
    protected function save(Category $category,array $data): bool
    {
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->url = $data['url'] ?? $this->slugify($category->name);
        $category->view = $data['view'];
        $category->meta_title = $data['meta-title'];
        $category->meta_description = $data['meta-description'];
        $category->keywords = $data['keywords'];
        return $category->save();
    }

    /**
     * Get a validator for an incoming category registration request.
     * @param  array  $data
     * @param Category $category
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateCategory(array $data, Category $category): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required','min:2','max:50', Rule::unique('categories')->ignore($category->id)],
            'description' => 'required',
            'image' => 'sometimes|required|image|max:10000',
            'meta-title' => ['required', new MetaDataLength()],
            'meta-description' => ['required', new MetaDataLength()],
            'keywords' => 'required|min:2|max:50000'
        ]);
    }

    /**
     * Delete category
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $category = Category::find($id);
        if($category){
            if($category->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'categories.posts-related'
                ]);
            }
            $this->deleteOne('categories', $category->id,1);
            if($category->delete()){
                $this->sitemap();
                return redirect()->route('categories')->with([
                    'success' => 'categories.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'categories.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'categories.non-existent'
        ]);
    }

    /**
     * Handle bulk category actions request
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        foreach ($request->input('id') as $id){
            $category = Category::find($id);
            if($category->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'categories.posts-related'
                ]);
            } else{
                $this->deleteOne('categories', $category->id,1);
                $category->delete();
            }
        }
        return redirect()->back()->with([
            'success' => 'categories.delete-success'
        ]);
    }
}
