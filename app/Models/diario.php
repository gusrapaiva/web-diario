<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'data',
        'id_user',
        'imagem'
    ];
}
