<?php

namespace App\Http\Controllers;

use App\Models\Diario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class DiarioController extends Controller
{
    
    public function readAll(Request $request)
    {   
        $registros = Diario::where('id_user', $request->user()->id)->get();

        return view('/dashboard', ['registros' => $registros]);
    }
    
        public function createView()
    {
        return view("diario-create");
    }

    public function addRegister(Request $request)
    {   

        if($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $request->file('imagem')->storeAs('public/imagens', $fileNameToStore);
        } else {
            $fileNameToStore = 'placeholder.png';
        }


        $dados = $request->validate([
            'titulo' => 'string|required',
            'texto' => 'string|required',
            'data' => 'string|required',
            'id_user' => 'int|required',
        ]);
        
        $dados = [
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'data' => $request->data,
            'id_user' => $request->id_user,
            'imagem' => $fileNameToStore
        ];

        
        Diario::create($dados);
        return redirect('dashboard');
    }

    public function viewUpdate(Diario $id, Request $request)
    {
        return view('diario-view', ['registros' => $id]);
    }

    public function updateDiario(Diario $id, Request $request)
    {

        if($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $request->file('imagem')->storeAs('public/imagens', $fileNameToStore);
        } else {
            $fileNameToStore = 'placeholder.png';
        }

        $dados = $request->validate([
            'titulo' => 'string|required',
            'texto' => 'string|required',
            'data' => 'string|required',
        ]);

        $dados = [
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'data' => $request->data,
            'id_user' => $request->id_user,
            'imagem' => $fileNameToStore
        ];

        $id->fill($dados);
        $id->save();
        
        return Redirect::to('dashboard');
    }

    public function destroy(Diario $id)
    {
        $id->delete();
        return redirect('dashboard');
    }

}
