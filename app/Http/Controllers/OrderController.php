<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['cart','handle', 'remove', 'preview', 'update']);
    }

    /**
     * Get user order's history
     * @return View
     */
    public function history(): View
    {
        return view('app.order.user')->with([
            'title' => 'Mis pedidos',
            'characteristics' => Characteristic::all()
        ]);
    }

    /**
     * Show order details
     * @param string $hash
     * @return View
     */
    public function details(string $hash): View
    {
        return view('app.order.details')->with([
            'title' => 'Detalles del pedido',
            'order' => Order::where('hash', $hash)->first(),
            'characteristics' => Characteristic::all()
        ]);
    }

    /**
     * Show order details print version
     * @param string $hash
     * @return View
     */
    public function print(string $hash): View
    {
        return view('app.order.print')->with([
            'title' => 'Detalles del pedido',
            'order' => Order::where('hash', $hash)->first(),
            'characteristics' => Characteristic::all()
        ]);
    }

    /**
     * Manage order
     * @param string $hash
     * @return View
     */
    public function manage(string $hash): View
    {
        return view('app.order.manage')->with([
            'title' => 'Gestionar pedido',
            'order' => Order::where('hash', $hash)->first(),
            'characteristics' => Characteristic::all()
        ]);
    }

    /**
     * Update order status request
     * @param Request $request
     * @return RedirectResponse
     */
    public function status(Request $request): RedirectResponse
    {
        $order = Order::find($request->input('order'));
        $order->status = $request->input('status');
        if($order->save()){
            return redirect()->back()->with([
                'success' => '¡Estado del pedido actualizado correctamente!'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar el estado del pedido.'
        ]);
    }

    /**
     * Handle create/update order request
     * @param Request $request
     * @return RedirectResponse
     */
    public function handle(Request $request): RedirectResponse
    {
        $validator = $this->validateOrder($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = Auth::check() ? Order::cart(Auth::id())->first() : Order::cart(session()->getId())->first();

        if(!$order){
            $order = new Order();
            $order->hash = 'X-' . date('dmY') . str_pad( Order::all()->count(), 5, "0", STR_PAD_LEFT );
            $order->user_id = Auth::check() ? Auth::id() : null;
            $order->session_id =session()->getId();
        }
        if(!$order->save()){
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al agregar este producto al carrito.'
            ]);
        }

        $attributes = array();
        foreach ($request->all() as $key => $value){
            if(is_int($key)){
                $attributes[] = [$key => $value];
            }
        }

        $orderProduct = OrderProduct::where('product_id', $request->input('product'))->where('order_id', $order->id)->whereJsonContains('attributes', $attributes)->first();
        $product = Product::find($request->input('product'));
        if($orderProduct){
            $orderProduct->quantity = $orderProduct->quantity + $request->input('quantity');
        } else {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $request->input('product');
            $orderProduct->quantity = $request->input('quantity');
            $orderProduct->attributes = $attributes;
        }
        $orderProduct->price = $orderProduct->quantity * ($product->sale_price ? : $product->regular_price);
        $order->subtotal = $order->subtotal + $orderProduct->price;

        if($orderProduct->save() && $order->save()){
            return redirect()->back()->with([
                'success' => 'Carrito de compras actualizado.'
            ]);
        }

        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar el carrito.'
        ]);

    }

    /**
     * Get a validator for an incoming order registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateOrder(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'quantity' => 'required|integer',
            'product' => 'required|integer|exists:products,id'
        ]);
    }

    /**
     * Remove article from order
     * @param int $id
     * @param int $order
     * @return RedirectResponse
     */
    public function remove(int $id, int $order): RedirectResponse
    {
        $orderProduct = OrderProduct::find($id);
        $order = Order::find($order);
        $order->subtotal = $order->subtotal - $orderProduct->price;
        if(!$orderProduct->delete()){
            return redirect()->back()->with([
                'success' => 'Ocurrió un error al actualizar el carrito.'
            ]);
        }
        if($order->details->count() == 0){
            $order->subtotal = 0;
        }
        if(!$order->save()){
            return redirect()->back()->with([
                'success' => 'Ocurrió un error al actualizar el carrito.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Carrito de compras actualizado.'
        ]);
    }

    /**
     * Show order in cart
     * @return View|RedirectResponse
     */
    public function cart(): View|RedirectResponse
    {
        $order = Auth::check() ? Order::cart(Auth::id())->first() : Order::cart(session()->getId())->first();

        if($order){
            return view('web.cart')->with([
                'title' => 'Carrito',
                'metaTitle' => 'Carrito',
                'description' => '',
                'keywords' => '',
                'metaImage' => 'meta-default',
                'breadcrumbs' => 'Carrito',
                'noIndex' => true
            ]);
        }

        return redirect()->route('index');
    }

    /**
     * Handle update order request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $order = Order::find($request->input('order'));
        $subtotal = 0;
        foreach ($order->details as $detail){
            if($request->has('quantity-'.$detail->product_id)){
                $detail->quantity = $request->input('quantity-'.$detail->product_id);
                $product = Product::find($detail->product_id);
                $detail->price = $detail->quantity * ($product->sale_price ? : $product->regular_price);
                $subtotal = $subtotal + $detail->price;
                if(!$detail->save()){
                    return redirect()->back()->with([
                        'error' => 'Ocurrió un error al actualizar el carrito.'
                    ]);
                }
            }
        }
        $order->subtotal = $subtotal;
        $order->shipping_id = null;
        $order->total = $subtotal;
        if(!$order->save()){
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al actualizar el carrito.'
            ]);
        }
        return redirect()->back()->with([
            'success' => 'Carrito de compras actualizado.'
        ]);
    }

    /**
     * Show completed order page
     * @param string $hash
     * @return View|RedirectResponse
     */
    public function completed(string $hash): View|RedirectResponse
    {
        $order = Order::where('hash', $hash)->first();
        if($order && $order->status === 1){
            return view('web.completed')->with([
                'title' => 'Pedido completa',
                'metaTitle' => 'Pedido completa',
                'description' => '',
                'keywords' => '',
                'metaImage' => 'meta-default',
                'breadcrumbs' => 'Pedido completa',
                'noIndex' => true,
                'completed'=> Order::where('hash', $hash)->first()
            ]);
        }
        return redirect()->route('checkout');
    }

    /**
     * Handle delete order
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $order = Order::find($id);
        $order->status = 0;
        $order->cart = 0;
        if($order->save()){
            return redirect()->route('dashboard')->with([
                'success' => '¡Pedido borrado correctamente!'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al borrar el pedido.'
        ]);
    }
}
