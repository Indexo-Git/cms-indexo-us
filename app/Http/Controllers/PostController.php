<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostView;
use App\Models\Post;
use App\Rules\MetaDataLength;
use App\Traits\ImageTrait;
use App\Traits\SlugifyTrait;
use App\Traits\SitemapTrait;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Validator;

class PostController extends Controller
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
        $this->middleware('auth')->except(['blog', 'single','getPosts']);
    }

    /**
     * Show blog page.
     *
     * @return View
     */
    public function blog(): View
    {
        return view('web.blog')->with([
            'title' => 'Blog',
            'metaTitle' => 'Blog | indexo',
            'description' => 'We create the best content on Digital Marketing. Strategies, SEO, E-commerce, Social Media, Trends and much more.',
            'keywords' => '',
            'schema' => 1,
            'metaImage' => 'meta-indexo-us.jpg',
            'noIndex' => false,
            'services' => Category::all(),
        ]);
    }

    /**
     * Show blog page.
     * @param string $url
     * @return View
     */
    public function single(string $url): View
    {
        $post = Post::where('url', $url)->first();
        if(!$post){
            abort(404);
        }
        if(!Auth::check()) {
            $view = new PostView();
            $view->post_id = $post->id;
            $view->save();
        }
        return view('web.single')->with([
            'metaTitle' => $post->meta_title,
            'title' => $post->title,
            'description' => $post->meta_description,
            'keywords' => $post->keywords,
            'schema' => 5,
            'metaImage' => asset('storage/posts/' . $post->id.'.jpg'),
            'breadcrumbs' => 'Blog',
            'noIndex' => false,
            'post' => $post,
            'posts' => Post::where('category_id', $post->category_id)->get()
        ]);
    }

    /**
     * Get posts for blog page, paginated by 5
     *
     * @param Request $request
     * @return string
     */
    public function getPosts(Request $request): string
    {
        if ($request->ajax()) {
            $posts = Post::where('published', 1)->latest()->paginate(5);
            //dd($posts);
            $articles = '';
            foreach ($posts as $post) {
                $articles.='<div class="col-md-6"><div class="blog-single mb-50 wow fadeIn text-center" data-wow-delay=".3s">';
                $articles.='<div class="blog-thumb">';
                $articles.='<picture><source srcset="'.asset('storage/posts/'.$post->id.'.webp').'"type="image/webp">';
                $articles.='<img src="'.asset('storage/posts/' . $post->id.'.jpg').'" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="'.$post->title.'">';
                $articles.='</picture></div><div class="blog-desc mt-30">';
                //$articles.='<ul class="blog-category"><li><a href="'.url($post->category->url).'">'.$post->category->name.'</a></li></ul>';
                $articles.='<h3><a href="'.route('single', $post->url).'">'.$post->title.'</a></h3>';
                $articles.='<p class="mb-0">'.$post->description.'</p>';
                $articles.='<ul class="blog-date-time"><li><i class="fa fa-clock-o"></i>'.Carbon::parse($post->created_at)->format('d/m/Y').'</li></ul>';
                $articles.='</div></div></div>';
            }
            return $articles;
        }
        return redirect()->route('blog');
    }

    /**
     * Show admin posts page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('app.post.index')->with([
            'title' => 'posts.title',
            'categories' => Category::all(),
            'posts' => Post::with('views')->get()
        ]);
    }

    /**
     * Create new post page.
     *
     * @return View
     */
    public function new(): View
    {
        return view('app.post.form')->with([
            'title' => 'posts.add',
            'categories' => Category::all(),
            'post' => new Post()
        ]);
    }

    /**
     * Handle new post request
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request): mixed
    {
        $post = new Post();
        $validator = $this->validatePost($request->all(), $post);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $post = $this->save($post, $request->all());
        $this->sitemap();
        $results = $this->processCustomImage($request->file('image'), ['folder' => 'posts/', 'width' => 831, 'height' => 346, 'id' => $post->id,'number' => null]);
        if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
            return redirect()->route('posts')->with([
                'success' => 'posts.created-success'
            ]);
        return redirect()->back()->with([
            'error' => 'posts.created-error'
        ]);
    }

    /**
     * Show edit post page.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('app.post.form')->with([
            'title' => 'posts.edit',
            'post' => Post::find($id),
            'categories' => Category::all()
        ]);
    }


    /**
     * Handle update post request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $post = Post::find($request->input('id'));
        if(!$request->hasFile('image')){
            $request->request->remove('image');
        }
        $validator = $this->validatePost($request->all(), $post);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $post = $this->save($post, $request->all());
        $this->sitemap();
        if($request->has('image')) {
            $results = $this->processCustomImage($request->file('image'), ['folder' => 'posts/', 'width' => 831, 'height' => 346, 'id' => $post->id, 'number' => null]);
            if (array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
                return redirect()->back()->with([
                    'error' => 'posts.updated-error'
                ]);
        }
        return redirect()->route('posts')->with([
            'success' => 'posts.updated-success'
        ]);
    }

    /**
     * Save post
     *
     * @param Post $post
     * @param array $data
     *
     * @return Post
     */
    protected function save(Post $post, array $data): Post
    {
        $post->title = $data['title'];
        $post->url = $data['url'] ?? $this->slugify($post->title);
        $post->description = $data['description'];
        $post->content = $data['content'];
        $post->category_id = $data['category'];
        $post->published = 1;
        $post->meta_title = $data['meta-title'];
        $post->meta_description = $data['meta-description'];
        $post->keywords = $data['keywords'];
        $post->save();
        return $post;
    }


    /**
     * Validate post data
     * @param array $data
     * @param Post $post
     * @return mixed
     */
    protected function validatePost(array $data, Post $post): mixed
    {
        return Validator::make($data, [
            'title' => ['required','min:2','max:200', Rule::unique('posts')->ignore($post->id)],
            'description' => 'required',
            'image' => 'sometimes|required|image|max:10000',
            'category' => 'required|exists:categories,id',
            'content' => 'required',
            'meta-title' => ['required', new MetaDataLength()],
            'meta-description' => ['required', new MetaDataLength()],
            'keywords' => 'required|min:2|max:50000'
        ]);
    }

    /**
     * Delete post request
     *
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $post = Post::find($id);
        if($post){
            if($post->delete()){
                $this->sitemap();
                return redirect()->back()->with([
                    'success' => 'posts.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'posts.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'posts.non-existent'
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
                $post = Post::find($id);
                switch ($request->input('action')){
                    case 'draft':
                        $post->published = !$post->published;
                        $post->save();
                        break;
                    case 'delete':
                        $post->delete();
                        break;
                }
            }
        }
        return redirect()->back();
    }
}
