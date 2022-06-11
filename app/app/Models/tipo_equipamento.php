<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_equipamento extends Model
{
    protected $fillable = [
        'nome',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    use HasFactory;
}
