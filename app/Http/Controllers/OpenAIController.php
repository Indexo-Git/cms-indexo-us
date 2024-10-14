<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Traits\OpenAITrait;
use App\Traits\SlugifyTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class OpenAIController extends Controller
{
    use OpenAITrait;
    use SlugifyTrait;
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show zone page
     * @return View
     */
    public function index(): View
    {
        return view('app.openai.form')->with([
            'title' => 'openai.title',
            'categories' => Category::all()
        ]);
    }

    /**
     * Handle create Open AI content request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $category = Category::find($request->input('category'));
        $description = $this->getMetaDescription($request->input('title'));
        $content = $this->getIntroduction($request->input('title'));
        $content .= "<br><br><br><!-- POST CONTENT HERE --><br><br><br>";
        $content .= $this->getConclusion($request->input('title'), url($category->url), $request->input('keyword'));

        $post = new Post();
        $post->title = $request->input('title');
        $post->url = $this->slugify($request->input('title'));
        $post->description = $description;
        $post->content = $content;
        $post->category_id = $category->id;
        $post->published = 1;
        $post->meta_title = $this->removeQuotesIfNeeded($this->getMetaTitle($request->input('title')));
        $post->meta_description = $description;
        $post->keywords = $this->getKeywords($request->input('title'));

        if($post->save()) {
            return redirect()->route('posts')->with([
                'success' => 'posts.created-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'posts.created-error'
        ]);
    }

    protected function removeQuotesIfNeeded($inputString) {
        if (is_string($inputString) && strlen($inputString) >= 2) {
            $firstChar = substr($inputString, 0, 1);
            $lastChar = substr($inputString, -1);

            if ($firstChar === '"' && $lastChar === '"') {
                // Remove the double quotes at the beginning and end of the string
                return substr($inputString, 1, -1);
            }
        }
        return $inputString;
    }

}
