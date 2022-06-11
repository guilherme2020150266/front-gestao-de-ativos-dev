<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movimentacoes extends Model
{
    use HasFactory;

    protected $table = "movimentacoes";

    protected $fillable = [
        'telefone',
        'funcionarios_id',
        'users_id',
        'termo_responsabilidade',
        'equipamento_id',
        'tipo_movimentacao'
    ];
}
