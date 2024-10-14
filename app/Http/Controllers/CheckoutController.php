<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\State;
use App\Models\User;
use App\Traits\MercadoPagoTrait;
use App\Traits\OpenpayTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    use MercadoPagoTrait;
    use OpenpayTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'login', 'register']);
    }

    /**
     * Show checkout page
     * @return RedirectResponse|View
     * @throws Exception
     */
    public function index(): View|RedirectResponse
    {
        $order = Auth::check() ? Order::cart(Auth::id())->first() : Order::cart(session()->getId())->first();
        $preference = null;
        if($order->billing_id && $order->shipping_id){
            $preference = $this->setPreference($order);
        }
        if($order){
            return view('web.checkout.index')->with([
                'title' => 'Checkout',
                'metaTitle' => 'Checkout',
                'description' => '',
                'keywords' => '',
                'metaImage' => 'meta-default',
                'breadcrumbs' => 'Checkout',
                'noIndex' => true,
                'states' => State::all(),
                'preference' => $preference
            ]);
        }
        return redirect()->route('index');
    }

    /**
     * Custom login from checkout
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $sessionID = session()->getId();
        $credentials = $request->validateWithBag('login',[
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $order = Order::where('session_id', $sessionID)->first();
            if(!$order){
                $order = new Order();
                $order->hash = uniqid("X-", false).'-'. str_pad( Order::all()->count(), 5, "0", STR_PAD_LEFT );
            }
            $order->user_id = Auth::id();
            $this->removeOldCarts(Auth::id());
            if($order->save()){
                $request->session()->regenerate();
                return redirect()->back()->with(['success' => 'Inicio de sesión correcto.']);
            }
        }
        return redirect()->back()->withErrors([
            'email' => 'El usuario y contraseña que proporcionó no corresponde a nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Handle register user and address request
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        $sessionID = session()->getId();
        $request->validateWithBag('register',[
            'name' => ['required','string','min:2','max:255'],
            'email' => ['required','email','max:255', 'unique:users'],
            'password' => ['required','string','min:8','confirmed'],
            'alias' => ['required','string','min:2','max:45'],
            'phone' => ['required','numeric','digits:10'],
            'address' => ['required','string','min:2','max:500'],
            'suburb' => ['required','string','min:2','max:200'],
            'city' => ['required','string','min:2','max:150'],
            'state' => ['required','numeric','exists:states,id'],
            'postal-code' => ['required','numeric','digits:5'],
            'alias-alt' => ['nullable','string','min:2','max:45'],
            'phone-alt' => ['nullable','numeric','digits:10'],
            'address-alt' => ['nullable','string','min:2','max:500'],
            'suburb-alt' => ['nullable','string','min:2','max:200'],
            'city-alt' => ['nullable','string','min:2','max:150'],
            'state-alt' => ['nullable','numeric','exists:states,id'],
            'postal-code-alt' => ['nullable','numeric','digits:5']
        ]);
        $user = $this->createUser($request->all());
        if($user->save()){
            $address = $this->createAddress($request->all(), $user->id, 1);
            if($address->save()){
                // if($request->has('other'))
                $this->updateOrder($sessionID, $user->id, $address->id);
                Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
                return redirect()->route('checkout')->with([
                    'success' => 'Registro e inicio de sesión realizado correctamente.'
                ]);
            }
            $user->delete();
            return redirect()->back()->withErrors([
                'error' => 'Ocurrió un error al registrar el usuario.',
            ])->withInput();
        }

        return redirect()->back()->withErrors([
            'error' => 'Ocurrió un error al registrar el usuario.',
        ])->withInput();
    }

    /**
     *  Protected function to create user
     * @param array $data
     * @return User
     */
    protected function createUser(array $data): User
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->hash = uniqid("id", false);
        return $user;
    }

    /**
     * Protected function to create address
     * @param array $data
     * @param int $userID
     * @return Address
     */
    protected function createAddress(array $data, int $userID): Address
    {
        $address = new Address();
        $address->alias = $data['alias'];
        $address->name = $data['name'];
        $address->phone = $data['phone'];
        $address->address = $data['address'];
        $address->suburb = $data['suburb'];
        $address->city = $data['city'];
        $address->state_id = $data['state'];
        $address->postal_code = $data['postal-code'];
        $address->user_id = $userID;
        $address->main = true;
        $address->country = 'MX';
        return $address;
    }

    /**
     * Assign stored ID session order to logged user
     * @param string $sessionID
     * @param int $userID
     * @param int $addressID
     * @return void
     */
    protected function updateOrder(string $sessionID, int $userID, int $addressID){
        $order = Order::where('session_id', $sessionID)->first();
        $order->user_id = $userID;
        $order->shipping_id = $addressID;
        $order->billing_id = $addressID;
        $order->save();
    }

    /**
     * Handle shipping address setting request
     * @param Request $request
     * @return RedirectResponse
     */
    public function setShipping(Request $request): RedirectResponse
    {
        $request->validateWithBag('shipping',[
            'shipping' => ['required', Rule::exists('addresses', 'id')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            }),]
        ]);
        $order = Order::cart(Auth::id())->first();
        $order->shipping_id = $request->input('shipping');
        $order->total = $order->shipping->state->zones[0]->price + $order->subtotal;
        if($order->save()){
            return redirect()->back()->with(['success' => 'Dirección de envío elegida correctamente.']);
        }
        return redirect()->back()->withErrors([
            'error' => 'Ocurrió un error al elegir la dirección de envío, inténtalo de nuevo por favor.',
        ])->withInput();
    }

    /**
     * Handle billing address setting request
     * @param Request $request
     * @return RedirectResponse
     */
    public function setBilling(Request $request): RedirectResponse
    {
        $request->validateWithBag('billing',[
            'billing' => ['required', Rule::exists('addresses', 'id')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            }),]
        ]);
        $order = Order::cart(Auth::id())->first();
        $order->billing_id = $request->input('billing');
        if($order->save()){
            return redirect()->back()->with(['success' => 'Dirección de facturación elegida correctamente.']);
        }
        return redirect()->back()->withErrors([
            'error' => 'Ocurrió un error al elegir la dirección de facturación, inténtalo de nuevo por favor.',
        ])->withInput();
    }

    /**
     * Process openpay payment
     * @param Request $request
     * @return RedirectResponse
     */
    public function openpay(Request $request)
    {
        $order = Order::cart(Auth::id())->first();
        $order->hash =  uniqid("X-", false).'-'. str_pad( Order::all()->count(), 5, "0", STR_PAD_LEFT );
        $customer = array(
            'name' => $order->billing->name,
            'last_name' => $order->billing->name,
            'phone_number' => $order->billing->phone,
            'email' => Auth::user()->email);

        $charge = $this->charge($customer, $request->all(), $order->total , $order->hash);
        if(isset($charge->original['error'])){
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al procesar el pago. Por favor inténtelo nuevamente.',
            ]);
        }
        $order->charge_id = $charge->original['data']->id;
        $order->cart = 0;
        $order->status = 1;
        $order->save();

        return redirect()->route('completed-order', $order->hash);
    }

    /**
     * Successful Mercado Pago payment
     * @return RedirectResponse
     */
    public function mercadopagoSuccess(): RedirectResponse
    {
        $order = $this->savePayment($_GET);
        if($order->cart){
            $order->hash =  uniqid("X-", false).'-'. str_pad( Order::all()->count(), 5, "0", STR_PAD_LEFT );
            $order->cart = 0;
            $order->status = 1;
            $order->save();
        }

        return redirect()->route('completed-order', $order->hash);
    }

    /**
     * Failure Mercado Pago payment
     * @return RedirectResponse
     */
    public function mercadopagoFailure(): RedirectResponse
    {
        $order = $this->savePayment($_GET);
        $order->status = 7;
        $order->save();
        return redirect()->back()->withErrors([
            'error' => 'Ocurrió un error al procesar tu pago, verifica tus datos e inténtalo nuevamente.',
        ]);
    }

    /**
     * Pending Mercado Pago payment
     * @return RedirectResponse
     */
    public function mercadopagoPending(): RedirectResponse
    {
        $order = $this->savePayment($_GET);
        $order->status = 8;
        $order->save();
        return redirect()->back()->withErrors([
            'error' => 'Tu pago procedió pero aparece como pendiente de validación, no repitas tu pago y espera nuestro contacto.',
        ]);
    }

    /**
     * Save Mercado Pago payment response
     * @param array $response
     * @return Order
     */
    protected function savePayment(array $response): Order
    {
        $order = Order::cart(Auth::id())->first();
        $payment = new OrderPayment();
        $payment->order_id = $order->id;
        $payment->response = $response;
        $payment->save();
        return $order;
    }

    /**
     * @param int $id
     * @return void
     */
    protected function removeOldCarts(int $id){
        Order::where('user_id', $id)->where('cart',1)->update(['cart' => 0]);
    }
}
