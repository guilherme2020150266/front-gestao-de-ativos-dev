<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'tipo_equipamento_id',
        'modelo',
        'fabricante',
        'numero_serie',
        'status',
        'numero_patrimonio',
        'cpu',
        'memoria_ram', 
        'valor',
        'valor_atual',
        'data_compra',
    ];

    use HasFactory;

}