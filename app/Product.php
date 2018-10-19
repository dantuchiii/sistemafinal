<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'body', 'customable','categoria_id',
    ];
    
    
    
    public function categoria()
    {
        return $this->belongsTo('App\CategoriaProducto');
    }
    
    public function articulos()
    {
        return $this->hasMany('App\articulos');
    }
    
    
    
    
    //METODOS SCOPE
    
    public function scopeName($query, $nombrep){
        
        
        if($nombrep != null){
            
        
        return $query->where('name','LIKE', "%$nombrep%");
        }
    }
    
    
}
