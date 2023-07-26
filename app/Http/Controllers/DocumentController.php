<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Typedoc;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function view_type()
    {
        $types = Typedoc::paginate();
        return view('docs.index', compact('types'));
    }
    public function create_type()
    {
        $types = Typedoc::paginate();
        return view('docs.create_type', compact('types'));
    }
    public function store_type(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $type = new Typedoc();
        $type->name = $request->name;

        $type->save();

        //redirige a una ruta
        return redirect()->route('type',$type);
    }
    public function edit_type(Typedoc $tipo){
        $types = Typedoc::paginate();
        return view('docs.edit_type', compact('tipo','types'));
    }

    public function update_type(Request $request, $id){
        $curso = Typedoc::find($id);
        $request->validate([
            'name' => 'required'
        ]);
        $curso->name = $request->name;
        $curso->save();
        //redirige a una ruta
        return redirect()->route('type',$curso);
    }

    public function delete_type($id){
        $type = Typedoc::find($id);
        $type->delete();

        return redirect()->route('type');
    }

    public function view_doc($id){
        $documents = Document::where('type', $id)->orderBy('created_at', 'desc')->paginate(10);
        $name = Typedoc::find($id);
        $types = Typedoc::paginate();
        if ($name) {
            $nom = $name->name;
        } else {
            // Manejar la situación cuando $name es nulo
            $nom = "Nombre no encontrado"; // O cualquier valor predeterminado
            return view('docs.create_doc', compact('types'));
        }
        return view('docs.show_docs', compact('documents','types','nom'));
    }
}
