<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
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
     * Handle new zone request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $note = new Note();
        $validator = $this->validateNote($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($note, $request->all())){
            return redirect()->back()->with([
                'success' => 'Nota agregada correctamente.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Ocurrió un error al agregar la nota.'
        ]);
    }

    /**
     * Save zone
     * @param Note $note
     * @param array $data
     * @return boolean
     */
    protected function save(Note $note,array $data): bool
    {
        $note->content = $data['content'];
        $note->order_id = $data['order'];
        $note->user_id = Auth::id();
        return $note->save();
    }


    /**
     * Get a validator for an incoming zone registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateNote(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'content' => 'required',
        ]);
    }

    /**
     * Delete note
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $note = Note::find($id);
        if($note && Auth::id() == $note->user->id){
            if($note->delete()){
                return redirect()->back()->with([
                    'success' => 'Nota eliminada correctamente.'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'Ocurrió un error al tratar de eliminar la nota.'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'La nota que deseas eliminar no existe o no te pertenece.'
        ]);
    }
}
