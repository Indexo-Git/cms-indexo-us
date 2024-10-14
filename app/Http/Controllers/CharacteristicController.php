<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Characteristic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CharacteristicController extends Controller
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
     * Handle new characteristic request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $characteristic = new Characteristic();
        $validator = $this->validateCharacteristic($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($characteristic, $request->all())){
            return redirect()->route('edit-attribute', $request->input('attribute-id'))->with([
                'success' => 'characteristics.created-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'characteristics.created-error'
        ]);
    }

    /**
     * Show characteristic edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $characteristic = Characteristic::find($id);
        return view('app.attribute.form')->with([
            'title' => 'characteristics.edit',
            'characteristic' => $characteristic,
            'attribute' => Attribute::find($characteristic->attribute_id)
        ]);
    }

    /**
     * Handle update characteristic request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $characteristic = Characteristic::find($request->input('id'));
        $validator = $this->validateCharacteristic($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($characteristic, $request->all())){
            return redirect()->route('edit-attribute', $request->input('attribute-id'))->with([
                'success' => 'characteristics.updated-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'characteristics.updated-error'
        ]);
    }

    /**
     * Save attribute
     * @param Characteristic $characteristic
     * @param array $data
     * @return boolean
     */
    protected function save(Characteristic $characteristic,array $data): bool
    {
        $characteristic->name = $data['char-name'];
        $characteristic->attribute_id = $data['attribute-id'];
        return $characteristic->save();
    }

    /**
     * Get a validator for an incoming characteristic registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateCharacteristic(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'char-name' => 'required|min:1|max:50',
            'attribute-id' => 'required'
        ]);
    }

    /**
     * Delete characteristic
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $characteristic = Characteristic::find($id);
        if($characteristic){
            if($characteristic->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'characteristics.product-related'
                ]);
            }
            if($characteristic->delete()){
                return redirect()->back()->with([
                    'success' => 'characteristics.deleted-success'
                ]);
            }
        }
        return redirect()->back()->with([
            'error' => 'characteristics.non-existent'
        ]);
    }

    /**
     * Handle bulk characteristic actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        foreach ($request->input('id') as $id){
            $characteristic = Characteristic::find($id);
            if($characteristic->products()->count() > 0){
                return redirect()->back()->with([
                    'error' => 'characteristics.product-related'
                ]);
            }
            $characteristic->delete();
        }
        return redirect()->back();
    }
}
