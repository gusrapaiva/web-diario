<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diario extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'data',
        'id_user'
    ];
}
