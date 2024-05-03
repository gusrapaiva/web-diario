<?php

namespace App\Http\Controllers;

use App\Models\diario;
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
        $dados = $request->validate([
            'titulo' => 'string|required',
            'texto' => 'string|required',
            'data' => 'string|required',
            'id_user' => 'int|required',
        ]);

        Diario::create($dados);
        return redirect('dashboard');
    }

}
