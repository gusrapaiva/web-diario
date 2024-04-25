<?php

namespace App\Http\Controllers;

use App\Models\diario;
use App\Http\Requests\StorediarioRequest;
use App\Http\Requests\UpdatediarioRequest;

class DiarioController extends Controller
{
    
    public function createView()
    {
        return view("diario-create");
    }

}
