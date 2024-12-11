<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'detalles',
        'estado',
        'prioridad',
        'fecha_entrega',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
