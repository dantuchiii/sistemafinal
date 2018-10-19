<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $fillable = [
        'name',
    ];
    
        public function productos()
    {
        return $this->hasMany('App\Product');
    }
}
