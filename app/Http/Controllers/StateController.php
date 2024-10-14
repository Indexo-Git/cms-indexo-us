<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class StateController extends Controller
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
     * Show states page
     * @return View
     */
    public function index(): View
    {
        return view('app.state.index')->with([
            'title' => 'Estados',
            'states' => State::all()
        ]);
    }

    /**
     * Show new state page
     * @return View
     */
    public function new(): View
    {
        return view('app.state.form')->with([
            'title' => 'Nuevo estado',
            'state' => new State()
        ]);
    }

    /**
     * Handle new attribute request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $state = new State();
        $validator = $this->validateState($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($state, $request->all())){
            return redirect()->route('states')->with([
                'success' => 'Estado creado correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al crear el estado.'
        ]);
    }

    /**
     * Show state edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $state = State::find($id);
        return view('app.state.form')->with([
            'title' => 'Editar estado',
            'state' => $state
        ]);
    }

    /**
     * Handle update state request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $state = State::find($request->input('id'));
        $validator = $this->validateState($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($state, $request->all())){
            return redirect()->route('states')->with([
                'success' => 'Estado actualizado correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar el estado.'
        ]);
    }

    /**
     * Save state
     * @param State $state
     * @param array $data
     * @return boolean
     */
    protected function save(State $state,array $data): bool
    {
        $state->name = $data['name'];
        return $state->save();
    }

    /**
     * Get a validator for an incoming state registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateState(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|min:2|max:45',
        ]);
    }

    /**
     * Delete state
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $state = State::find($id);
        if($state){
            if($state->delete()){
                return redirect()->back()->with([
                    'success' => 'Estado eliminado correctamente.'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al tratar de eliminar el estado.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'El estado que deseas eliminar no existe.'
        ]);
    }

    /**
     * Handle bulk state actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        foreach ($request->input('id') as $id){
            $state = State::find($id);
            if(!$state){
                return redirect()->back()->with([
                    'error' => 'Ocurrió un error al eliminar el estado'
                ]);
            }
            $state->delete();
        }
        return redirect()->route('states')->with([
            'success' => 'Estados eliminados correctamente.'
        ]);
    }
}
