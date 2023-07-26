<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Typedoc;
use Illuminate\Http\Request;

class DocumentSingleController extends Controller
{
    public function create_doc(){
        $types = Typedoc::paginate();
        return view('docs.create_doc', compact('types'));
    }
    public function store_doc(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'archive' => 'required',
            'type' => 'required'
        ]);

        $type = new Document();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->archive = $request->archive;
        $type->type = $request->type;

        $type->save();

        //redirige a una ruta
        return redirect()->route('home',$type);
    }
    public function edit_doc(Document $tipo){
        $types = Typedoc::paginate();
        return view('docs.edit_doc', compact('tipo','types'));
    }
    public function update_doc(Request $request, $id){
        $type = Document::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'archive' => 'required'
        ]);
        $type->name = $request->name;
        $type->description = $request->description;
        $type->archive = $request->archive;

        $type->save();
        //redirige a una ruta
        return redirect()->route('home',$type);
    }

    public function delete_doc($id){
        $type = Document::find($id);
        $type->delete();

        return redirect()->route('home');
    }
}
