<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    protected $fillable = [
        'estado', 'cantidad', 'total', 'fecha', 'descripcion', 'usuario_id',
    ];
    
        public function pedido_detalle()
    {
        return $this->hasMany('App\PedidoDet');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }    
    
}
