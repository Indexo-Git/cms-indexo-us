<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Traits\ImageTrait;
use App\Traits\SitemapTrait;
use App\Traits\SlugifyTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Validator;

class PortfolioController extends Controller
{
    use ImageTrait;
    use SlugifyTrait;
    use SitemapTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['portfolio', 'single']);
    }

    /**
     * Show portfolios page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('app.portfolio.index')->with([
            'title' => 'portfolios.title',
            'portfolios' => Portfolio::all()
        ]);
    }

    /**
     * Show portfolio page.
     *
     * @return View
     */
    public function portfolio(): View
    {
        return view('web.portfolios')->with([
            'title' => 'Portafolio',
            'description' => '',
            'keywords' => '',
            'noIndex' => false,
            'portfolios' => Portfolio::all()
        ]);
    }

    /**
     * Show single portfolio page.
     * @param string $url
     * @return View
     */
    public function single(string $url): View
    {
        $portfolio = Portfolio::where('url', $url)->first();
        $portfolio->views++;
        $portfolio->save();
        return view('web.portfolio')->with([
            'title' => $portfolio->title,
            'description' => $portfolio->description,
            'keywords' => $portfolio->description,
            'noIndex' => false,
            'portfolio' => Portfolio::where('url', $url)->first()
        ]);
    }

    /**
     * Create new portfolio page.
     *
     * @return View
     */
    public function new(): View
    {
        return view('app.portfolio.form')->with([
            'title' => 'portfolios.add',
            'portfolio' => new Portfolio()
        ]);
    }

    /**
     * Handle new portfolio request
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request): mixed
    {
        $portfolio = new Portfolio();
        $validator = $this->validatePorfolio($request->all(), $portfolio);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $portfolio = $this->save($portfolio, $request->all());
        $this->sitemap();
        $results[] = $this->loopMakeImages($request, $portfolio->id, 1, 5, [], 'portfolios');
        if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
            return redirect()->route('portfolios')->with([
                'success' => 'portfolios.created-success'
            ]);
        return redirect()->back()->with([
            'error' => 'portfolios.created-error'
        ]);
    }

    /**
     * Show edit portfolio page.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('app.portfolio.form')->with([
            'title' => 'portfolios.edit',
            'portfolio' => Portfolio::find($id)
        ]);
    }


    /**
     * Handle update portfolio request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $portfolio = Portfolio::find($request->input('id'));
        if(!$request->hasFile('image')){
            $request->request->remove('image');
        }
        $validator = $this->validatePorfolio($request->all(), $portfolio);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $portfolio = $this->save($portfolio, $request->all());
        $this->sitemap();
        $results[] = $this->loopMakeImages($request, $portfolio->id, 1, 5, [], 'portfolios');
        if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
            return redirect()->route('portfolios')->with([
                'success' => 'portfolios.updated-success'
            ]);
        return redirect()->back()->with([
            'error' => 'portfolios.updated-error'
        ]);
    }

    /**
     * Save portfolio
     *
     * @param Portfolio $portfolio
     * @param array $data
     *
     * @return Portfolio
     */
    protected function save(Portfolio $portfolio, array $data): Portfolio
    {
        $portfolio->title = $data['title'];
        $portfolio->url = $this->slugify($portfolio->title);
        $portfolio->description = $data['description'];
        $portfolio->client = $data['client'];
        $portfolio->date = $data['date'];
        $portfolio->skills = $data['skills'];
        $portfolio->location = $data['location'];
        $portfolio->save();
        return $portfolio;
    }


    /**
     * Validate portfolio data
     * @param array $data
     * @param Portfolio $portfolio
     * @return mixed
     */
    protected function validatePorfolio(array $data, Portfolio $portfolio): mixed
    {
        return Validator::make($data, [
            'title' => ['required','min:2','max:200', Rule::unique('portfolios')->ignore($portfolio->id)],
            'description' => 'required',
            'client' => 'string|min:2|max:500',
            'date' => 'string|min:2|max:500',
            'skills' => 'string|min:2|max:500',
            'images' => 'sometimes|required|image|max:10000'
        ]);
    }

    /**
     * Delete portfolio request
     *
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $portfolio = Portfolio::find($id);
        if($portfolio){
            if($portfolio->delete()){
                $this->sitemap();
                return redirect()->back()->with([
                    'success' => 'portfolios.delete-success'
                ]);
            } else{
                return redirect()->back()->with([
                    'error' => 'portfolios.delete-error'
                ]);
            }
        }
        return redirect()->back()->with([
            'error' => 'portfolios.non-existent'
        ]);

    }

    /**
     * Handle bulk product actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        if($request->input('action')){
            foreach ($request->input('id') as $id){
                $portfolio = Portfolio::find($id);
                $portfolio->delete();
            }
        }
        return redirect()->back();
    }

    /**
     * Delete image
     * @param int $id
     * @param $number
     * @return RedirectResponse
     */
    public function deleteImage(int $id, $number): RedirectResponse
    {
        if($number != 1) $this->deleteOne('portfolios', $id, $number);
        return redirect()->back()->with([
            'success' => 'Imagen eliminada correctamente.'
        ]);
    }

}
