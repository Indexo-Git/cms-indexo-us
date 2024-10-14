<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\StateZone;
use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ZoneController extends Controller
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
     * Show zone page
     * @return View
     */
    public function index(): View
    {
        return view('app.zone.index')->with([
            'title' => 'Zonas',
            'zones' => Zone::all(),
            'states' => State::count()
        ]);
    }

    /**
     * Show new zone page
     * @return View
     */
    public function new(): View
    {
        return view('app.zone.form')->with([
            'title' => 'Nueva zona',
            'zone' => new Zone(),
            'states' => State::available()
        ]);
    }

    /**
     * Handle new zone request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $zone = new Zone();
        $validator = $this->validateZone($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($zone, $request->all())){
            $this->saveStates($request->input('states'), $zone->id);
            return redirect()->route('zones')->with([
                'success' => 'Zona creada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al crear la zona.'
        ]);
    }

    /**
     * Show zone edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $zone = Zone::find($id);
        return view('app.zone.form')->with([
            'title' => 'Editar zona',
            'zone' => $zone,
            'states' => State::all()
        ]);
    }

    /**
     * Handle update zone request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $zone = Zone::find($request->input('id'));
        $validator = $this->validateZone($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($zone, $request->all())){
            $this->saveStates($request->input('states'), $zone->id);
            return redirect()->route('zones')->with([
                'success' => 'Zona actualizada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al actualizar la zona.'
        ]);
    }

    /**
     * Save zone
     * @param Zone $zone
     * @param array $data
     * @return boolean
     */
    protected function save(Zone $zone,array $data): bool
    {
        $zone->name = $data['name'];
        $zone->price = $data['price'];
        return $zone->save();
    }

    /**
     * Save states relations with zone, deleting any old record first
     * @param array $statesIDS
     * @param int $zoneID
     * @return void
     */
    private function saveStates(array $statesIDS, int $zoneID){
        StateZone::where('zone_id', $zoneID)->delete();
        foreach ($statesIDS as $stateIDS){
            $stateZone = new StateZone();
            $stateZone->zone_id = $zoneID;
            $stateZone->state_id = $stateIDS;
            $stateZone->save();
        }
    }

    /**
     * Get a validator for an incoming zone registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateZone(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|min:2|max:50',
            'price' => 'required|numeric|min:0',
            'states' => 'required'
        ]);
    }
}
