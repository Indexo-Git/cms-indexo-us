<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\CharacteristicProduct;
use App\Models\ProductView;
use App\Rules\MetaDataLength;
use App\Traits\ImageTrait;
use App\Traits\SitemapTrait;
use App\Traits\SlugifyTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    use SitemapTrait;
    use ImageTrait;
    use SlugifyTrait;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('single','zoom');
    }

    /**
     * Show single product web page
     * @param string $url
     * @return View
     */
    public function single(string $url): View
    {
        $product = Product::where('url', $url)->first();
        if(!$product){
            abort(404);
        }
        if(!Auth::check()){
            $view = new ProductView();
            $view->product_id = $product->id;
            $view->save();
        }
        return view('web.product')->with([
            'title' => $product->meta_title,
            'description' => $product->meta_description,
            'keywords' => $product->keywords,
            'schema' => 3,
            'metaImage' => asset('storage/products/single/'.$product->id.'.jpg'),
            'breadcrumbs' => $product->name,
            'noIndex' => false,
            'product' => $product,
            'reviews' => null
        ]);
    }

    /**
     * Show products page
     * @return View
     */
    public function index(): View
    {
        return view('app.product.index')->with([
            'title' => 'products.title',
            'products' => Product::all()
        ]);
    }

    /**
     * Show new product page
     * @return View
     */
    public function new(): View
    {
        return view('app.product.form')->with([
            'title' => 'products.add',
            'product' => new Product(),
            'categories' => Category::all(),
            'attributes' => Attribute::all()
        ]);
    }

    /**
     * Handle new product request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $product = new Product();
        $validator = $this->validateProduct($request->all(), $product);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($product, $request->all())){
            $results = $this->saveProductData($request, $product->id);
            $this->sitemap();
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
                return redirect()->route('products')->with([
                    'success' => 'products.created-success'
                ]);
        }
        return redirect()->back()->with([
            'error' => 'products.created-error'
        ]);
    }

    /**
     * Show product edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $product = Product::find($id);
        return view('app.product.form')->with([
            'title' => 'products.edit',
            'product' => $product,
            'categories' => Category::all(),
            'attributes' => Attribute::all(),
            'hasExtraImages' => Storage::disk('public')->exists('/products/carousel/'.$product->id. '-2.jpg') || Storage::disk('public')->exists('/products/carousel/'.$product->id. '-3.jpg') || Storage::disk('public')->exists('/products/carousel/'.$product->id. '-4.jpg') || Storage::disk('public')->exists('/products/carousel/'.$product->id. '-5.jpg')
        ]);
    }

    /**
     * Handle update product request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $product = Product::find($request->input('id'));
        if(!$request->hasFile('image')){
            $request->request->remove('image');
        }
        $validator = $this->validateProduct($request->all(), $product);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($product, $request->all())){
            $results = $this->saveProductData($request, $product->id);
            $this->sitemap();
            if(!array_search(false, array_column($results, 'jpg')) && !array_search(false, array_column($results, 'webp')))
                return redirect()->route('products')->with([
                    'success' => 'products.updated-success'
                ]);
        }
        return redirect()->back()->with([
            'error' => 'products.updated-error'
        ]);
    }

    /**
     * Save product
     * @param Product $product
     * @param array $data
     * @return boolean
     */
    protected function save(Product $product,array $data): bool
    {
        $product->sku = $data['sku'];
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->url = $this->slugify($data['name']);
        $product->regular_price = $data['regular-price'];
        $product->sale_price = $data['sale-price'];
        $product->stock_management = isset($data['stock-management']);
        $product->stock_status = $data['stock-status'] ?? null;
        $product->sold_individually = isset($data['stock-individually']);
        $product->virtual = isset($data['virtual']);
        $product->new = isset($data['new']);
        $product->featured = isset($data['featured']);
        $product->width = $data['width'];
        $product->height = $data['height'];
        $product->length = $data['length'];
        $product->weight = $data['weight'];
        $product->hidden = isset($data['hidden']);
        $product->meta_title = $data['meta-title'];
        $product->meta_description = $data['meta-description'];
        $product->keywords = $data['keywords'];
        $product->extra = $data['extra'];
        return $product->save();
    }

    /**
     * Get a validator for an incoming product registration request.
     * @param  array  $data
     * @param Product $product
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateProduct(array $data, Product $product): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required','min:2','max:200', Rule::unique('products')->ignore($product->id)],
            'description' => 'required|min:2',
            'image' => 'sometimes|required|image|max:10000',
            'image-two' => 'sometimes|image|max:10000',
            'image-three' => 'sometimes|image|max:10000',
            'image-four' => 'sometimes|image|max:10000',
            'image-five' => 'sometimes|image|max:10000',
            'regular-price' => 'required|numeric',
            'sale-price' => 'nullable|numeric|lt:regular-price',
            'sku' => 'nullable|min:2|max:50',
            'categories' => 'required',
            'characteristics' => 'sometimes',
            'meta-title' => ['required', new MetaDataLength()],
            'meta-description' => ['required', new MetaDataLength()],
            'keywords' => 'required|max:50000',
            'extra' => 'nullable|min:2|max:50000'
        ]);
    }

    /**
     * Save categories, characteristics and images from product
     * @param Request $request
     * @param int $id
     * @return array
     */
    protected function saveProductData(Request $request, int $id): array
    {
        $results = [];
        $this->saveCategories($request->input('categories'), $id);
        if($request->has('characteristics')){
            $this->saveCharacteristics($request->input('characteristics'), array_values(array_filter($request->input('stocks'), function($value) {return ($value !== null && $value !== false && $value !== '');})) , $id);
        } else{
            CharacteristicProduct::where('product_id', $id)->delete();
        }
        if($request->hasFile('image')) $results[] = $this->processProductImage($request->file('image'), ['folder' => 'products', 'id' => $id, 'number' => 1]);
        $results[] = $this->loopMakeImages($request, $id, 2, 5, $results, 'products');
        return $results;
    }

    /**
     * Duplicate product
     * @param $id
     * @return RedirectResponse
     */
    public function duplicate($id): RedirectResponse
    {
        $product = Product::find($id);
        $duplicate = $product->replicate()->fill([
            'name' => $product->name . ' (d)'
        ]);
        if($duplicate->save()){
            $this->saveCategories([], $duplicate->id, true, $product->categories);
            $this->saveCharacteristics([],[], $duplicate->id, true, $product->characteristics);
            $this->duplicateImage('products', $product->id, $duplicate->id);
        }
        return redirect()->route('products')->with([
            'success' => 'products.duplicated-success'
        ]);
    }

    /**
     * Save categories relation with product deleting any old record first
     * @param array $categoriesIDS
     * @param int $productID
     * @param bool $duplicate
     * @param mixed|null $categories
     * @return void
     */
    private function saveCategories(array $categoriesIDS, int $productID, bool $duplicate = false, mixed $categories = null){
        CategoryProduct::where('product_id', $productID)->delete();
        if($duplicate){
            foreach ($categories as $category){
                $categoryProduct = new CategoryProduct();
                $categoryProduct->category_id = $category->id;
                $categoryProduct->product_id = $productID;
                $categoryProduct->save();
            }
        } else{
            foreach ($categoriesIDS as $categoryID){
                $categoryProduct = new CategoryProduct();
                $categoryProduct->category_id = $categoryID;
                $categoryProduct->product_id = $productID;
                $categoryProduct->save();
            }
        }
    }

    /**
     * Save characteristics relations with product deleting any old record first
     * @param array $characteristicsIDS
     * @param array $stocks
     * @param int $productID
     * @param bool $duplicate
     * @param mixed|null $characteristics
     * @return void+
     */
    private function saveCharacteristics(array $characteristicsIDS, array $stocks, int $productID, bool $duplicate = false, mixed $characteristics = null){
        CharacteristicProduct::where('product_id', $productID)->delete();
        if(count($characteristicsIDS)){
            if($duplicate){
                foreach ($characteristics as $characteristic) {
                    $characteristicProduct = new CharacteristicProduct();
                    $characteristicProduct->product_id = $productID;
                    $characteristicProduct->characteristic_id = $characteristic->id;
                    $characteristicProduct->stock = $characteristic->pivot->stock;
                    $characteristicProduct->save();
                }
            } else{
                foreach ($characteristicsIDS as $key => $characteristicID) {
                    $characteristicProduct = new CharacteristicProduct();
                    $characteristicProduct->product_id = $productID;
                    $characteristicProduct->characteristic_id = $characteristicID;
                    $characteristicProduct->stock = $stocks[$key];
                    $characteristicProduct->save();
                }
            }
        }

    }

    /**
     * Delete product
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $product = Product::find($id);
        if($product){
            $this->deleteCategoryRelation($product);
            $this->deleteCharacteristicsRelation($product);
            $this->deleteAll('products', $product->id);
            if($product->delete()){
                return redirect()->route('products')->with([
                    'success' => 'products.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'products.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'products.non-existent'
        ]);
    }

    /**
     * Delete category-product's relation
     *
     * @param Product $product
     * @return void
     */
    protected function deleteCategoryRelation(Product $product)
    {
        foreach($product->categories as $category){
            CategoryProduct::where('product_id', $product->id)->where('category_id', $category->id)->delete();
        }
    }

    /**
     * Delete characteristics-product's relation
     *
     * @param Product $product
     * @return void
     */
    protected function deleteCharacteristicsRelation(Product $product)
    {
        foreach($product->characteristics as $characteristic){
            CharacteristicProduct::where('product_id', $product->id)->where('characteristic_id', $characteristic->id)->delete();
        }
    }

    /**
     * Delete image
     * @param int $id
     * @param $number
     * @return RedirectResponse
     */
    public function deleteImage(int $id, $number): RedirectResponse
    {
        if($number != 1) $this->deleteOne('products', $id, $number);
        return redirect()->back()->with([
            'success' => 'products.image-deleted-success'
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
                $product = Product::find($id);
                switch ($request->input('action')){
                    case 'new':
                        $product->new = !$product->new;
                        $product->save();
                        break;
                    case 'hidden':
                        $product->hidden = !$product->hidden;
                        $product->save();
                        break;
                    case 'delete':
                        $this->deleteCategoryRelation($product);
                        $this->deleteCharacteristicsRelation($product);
                        $this->deleteAll('products', $product->id);
                        $product->delete();
                        break;
                }
            }
        }
        return redirect()->back();
    }

    /**
     * Get product original image
     * @param string $url
     * @param int $variation
     * @return string|void
     */
    public function zoom(string $url, int $variation){
        $product = Product::where('url', $url)->first();
        if($product){
            if(Storage::disk('public')->exists('/products/originals/'.$product->id. '-'.$variation.'.jpg')) {
                return "<picture><source srcset=\"". asset('storage/products/originals/'.$product->id. '-'.$variation.'.webp') ."\" type=\"image/webp\"><img class=\"zoom-product\" src=\"".asset('storage/products/originals/'.$product->id. '-'.$variation.'.jpg')."\" alt=\"$product->name\"></picture>";
            }
        }
    }
}
