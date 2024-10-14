<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Characteristic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AttributeController extends Controller
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
     * Show attributes page
     * @return View
     */
    public function index(): View
    {
        return view('app.attribute.index')->with([
            'title' => 'attributes.title',
            'attributes' => Attribute::all()
        ]);
    }

    /**
     * Show new attribute page
     * @return View
     */
    public function new(): View
    {
        return view('app.attribute.form')->with([
            'title' => 'attributes.add',
            'attribute' => new Attribute(),
            'characteristic' => new Characteristic()
        ]);
    }

    /**
     * Handle new attribute request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $attribute = new Attribute();
        $validator = $this->validateAttribute($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($attribute, $request->all())){
            return redirect()->route('edit-attribute', $attribute->id)->with([
                'success' => 'attributes.created-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'attributes.created-error'
        ]);
    }

    /**
     * Show attribute edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $attribute = Attribute::find($id);
        return view('app.attribute.form')->with([
            'title' => 'attributes.edit',
            'attribute' => $attribute,
            'characteristic' => new Characteristic(),
            'characteristics' => Characteristic::where('attribute_id', $attribute->id)->get()
        ]);
    }

    /**
     * Handle update attribute request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $attribute = Attribute::find($request->input('id'));
        $validator = $this->validateAttribute($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($attribute, $request->all())){
            return redirect()->route('attributes')->with([
                'success' => 'attributes.updated-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'attributes.updated-error'
        ]);
    }

    /**
     * Save attribute
     * @param Attribute $attribute
     * @param array $data
     * @return boolean
     */
    protected function save(Attribute $attribute,array $data): bool
    {
        $attribute->name = $data['name'];
        return $attribute->save();
    }

    /**
     * Get a validator for an incoming attribute registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateAttribute(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|min:2|max:50',
        ]);
    }

    /**
     * Delete attribute
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $attribute = Attribute::find($id);
        if($attribute){
            if($this->deleteCharacteristics($attribute)){
                if($attribute->delete()){
                    return redirect()->back()->with([
                        'success' => 'attributes.delete-success'
                    ]);
                }
                return redirect()->back()->with([
                    'error' => 'attributes.delete-error'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'attributes.characteristics-related'
            ]);

        }
        return redirect()->back()->with([
            'error' => 'attributes.non-existent'
        ]);
    }

    /**
     * Handle bulk attribute actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        foreach ($request->input('id') as $id){
            $attribute = Attribute::find($id);
            if($this->deleteCharacteristics($attribute)){
                $attribute->delete();
            } else{
                return redirect()->back()->with([
                    'error' => 'attributes.characteristics-related'
                ]);
            }
        }
        return redirect()->route('attributes')->with([
            'success' => 'attributes.delete-success'
        ]);
    }

    /**
     * Delete attribute's characteristics
     *
     * @param Attribute $attribute
     * @return bool
     */
    protected function deleteCharacteristics(Attribute $attribute): bool
    {
        foreach($attribute->characteristics as $characteristic){
            if($characteristic->products->count() > 0){
                return false;
            }
            $characteristic->delete();
        }
        return true;
    }
}
