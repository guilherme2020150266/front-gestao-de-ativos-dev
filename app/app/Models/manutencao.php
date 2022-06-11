<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = "manutencoes";

    protected $fillable = [
        'tecnico',
        'funcionario_id',
        'users_id',
        'equipamento_id',
    ];
}
