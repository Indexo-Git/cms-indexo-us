<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AccountController extends Controller
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
     * Show user account page
     *
     * @return View
     */
    public function index(): View
    {
        return view('app.account.index')->with([
            'title' => 'Mi cuenta'
        ]);
    }

    /**
     * Handle update account request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        if(!$request->input('password')){
            $request->request->remove('password');
        }
        $user = User::find(Auth::id());
        $validator = $this->validateAccount($request->all(), $user);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->has('password')) $user->password = bcrypt($request->input('password'));
        if($user->save()){
            return redirect()->back()->with([
                'success' => 'Cuenta actualizada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar la cuenta.'
        ]);
    }

    /**
     * Get a validator for an incoming update account request.
     * @param  array  $data
     * @param User $user
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateAccount(array $data, User $user): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|min:2|max:255',
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|required|string|min:8|confirmed'
        ]);
    }
}
