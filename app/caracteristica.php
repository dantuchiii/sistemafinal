<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristica extends Model
{
    
    
    public function caracteristicatipo()
    {
        return $this->belongsTo('App\caracteristicatipo','caracteristicatipo_id');
    }
    
    public function caracteristicaarticulo()
    {
        return $this->hasMany('App\CaracteristicaArticulo');
    }
}
