<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AddressController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show addresses page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('app.address.index')->with([
            'title' => 'Direcciones'
        ]);
    }

    /**
     * Show new address page
     * @return View
     */
    public function new(): View
    {
        return view('app.address.form')->with([
            'title' => 'Nueva dirección',
            'address' => new Address(),
            'states' => State::all()
        ]);
    }

    /**
     * Handle new address request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $address = new Address();
        $validator = $this->validateAddress($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($address, $request->all())){
            return redirect()->route('addresses')->with([
                'success' => 'Dirección creada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al crear la dirección.'
        ]);
    }

    /**
     * Show address edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $address = Address::find($id);
        return view('app.address.form')->with([
            'title' => 'Editar dirección',
            'address' => $address,
            'states' => State::all()
        ]);
    }

    /**
     * Handle update address request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $address = Address::find($request->input('id'));
        $validator = $this->validateAddress($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($address, $request->all())){
            return redirect()->route('addresses')->with([
                'success' => 'Dirección actualizada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar la dirección.'
        ]);
    }

    /**
     * Save address
     * @param Address $address
     * @param array $data
     * @return boolean
     */
    protected function save(Address $address,array $data): bool
    {
        $address->alias = $data['alias'];
        $address->name = $data['name'];
        $address->phone = $data['phone'];
        $address->address = $data['address'];
        $address->suburb = $data['suburb'];
        $address->city = $data['city'];
        $address->state_id = $data['state'];
        $address->postal_code = $data['postal-code'];
        $address->country = 'MX';
        $address->rfc = strtoupper($data['rfc']);
        $address->user_id = Auth::id();
        $address->main = !Auth::user()->addresses->count();
        return $address->save();
    }

    /**
     * Get a validator for an incoming address registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateAddress(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'alias' => 'required|string|min:2|max:45',
            'name' => 'required|string|min:2|max:200',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|min:2|max:500',
            'suburb' => 'required|string|min:2|max:200',
            'city' => 'required|string|min:2|max:150',
            'state' => 'required|numeric|exists:states,id',
            'postal-code' => 'required|numeric|digits:5',
            'rfc' => 'nullable|string|min:13|max:13',
            'type' => 'numeric',
        ]);
    }

    /**
     * Set address as main
     * @param int $id
     * @return RedirectResponse
     */
    public function main(int $id): RedirectResponse
    {
        $address = Address::find($id);
        if($address){
            $this->clearMain();
            $address->main = true;
            $address->save();
        }
        return redirect()->back()->with(['success' => 'Dirección establecida como predeterminada correctamente']);
    }

    /**
     * Set all addresses not main
     * @return void
     */
    protected function clearMain(){
        foreach (Auth::user()->addresses as $address){
            $address->main = false;
            $address->save();
        }
    }

    /**
     * Delete address
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $address = Address::find($id);
        if($address){
            if($address->delete()){
                return redirect()->back()->with([
                    'success' => 'Dirección eliminada correctamente.'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al tratar de eliminar la dirección.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'La dirección que deseas eliminar no existe.'
        ]);
    }

}
