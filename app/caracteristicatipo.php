<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristicatipo extends Model
{
    
    
    
    public function caracteristica()
    {
        return $this->hasMany('App\caracteristica');
    }
}
