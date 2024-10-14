<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user's wishlist page
     * @return View
     */
    public function index(): View
    {
        return view('app.wishlist.index')->with([
            'title' => 'Mi lista de deseos'
        ]);
    }

    /**
     * Handle add to wishlist request
     * @param Request $request
     * @return RedirectResponse
     */
    public function add(Request $request): RedirectResponse
    {
        if(!Auth::user()->wishlist->contains('product_id',$request->input('product'))){
            if(Product::find($request->input('product'))){
                $wishlist = new Wishlist();
                $wishlist->product_id = $request->input('product');
                $wishlist->user_id = Auth::id();
                if($wishlist->save()){
                    return redirect()->back()->with([
                        'success' => 'Producto agregado correctamente a tu lista de deseos.'
                    ]);
                }
            }
        }

        return redirect()->back()->with([
            'error' => 'Ocurrió un error al agregar el producto a tu lista de deseos.'
        ]);
    }

    /**
     * Handle bulk wishlist actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        if($request->input('action')){
            foreach ($request->input('id') as $id){
                $wishlist = Wishlist::find($id);
                if($request->input('action') == 'delete'){
                    $wishlist->delete();
                }
            }
        }
        return redirect()->back()->with([
            'success' => 'Lista de deseos actualizada correctamente.'
        ]);
    }
}
