<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaArticulo extends Model
{
    public function caracteristica()
    {
        return $this->belongsTo('App\caracteristica', 'caracteristica_id');
    }
    
    public function articulo()
    {
        return $this->belongsTo('App\articulos', 'articulos_id');
    }
}
