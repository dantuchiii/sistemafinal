<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    protected $fillable = [
        'name', 'precio', 'imagen', 'product_id', 'color_id', 'material_id',
    ];
    
    public function producto()
    {
        return $this->belongsTo('App\Product','product_id');
    }
    
    
    
    public function pedido_detalle()
    {
        return $this->hasMany('App\PedidoDet');
    }
    
    public function caracteristicaarticulo()
    {
        return $this->hasMany('App\CaracteristicaArticulo');
    }
}
