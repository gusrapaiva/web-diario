<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Diario;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::All();
    
        $dados = [];

        foreach($usuarios as $usuario){
            $quant = Diario::where('id_user', $usuario->id)->count();
            
            $dados [] = [
                'nome' => $usuario->name,
                'email' => $usuario->email,
                'usertype' => $usuario->usertype,
                'quantidade' => $quant
            ];
        }


        return view('admin.dashboard', ["usuarios" => $dados]);
    }

}
