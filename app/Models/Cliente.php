<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
class Cliente extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'preferencias'
    ];
    protected $guard_name = 'cliente';
    
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
