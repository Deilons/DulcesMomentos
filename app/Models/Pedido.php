<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

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
