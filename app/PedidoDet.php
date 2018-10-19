<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDet extends Model
{
    protected $fillable = [
        'cant', 'precio', 'articulo_id', 'pedido_id',
    ];
    
    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'pedido_id');
    }
    
    public function articulos()
    {
        return $this->belongsTo('App\articulos', 'articulo_id');
    }    
    

    
 
    
}
