<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\color;
use App\Material;
use App\articulos;
use App\Product;
use File;


class ArticulosController extends Controller
{
    
    public function store(Request $request, $id){
              
        $articulo = new articulos;
        $product = Product::find($id);
        $mat = caracteristica::find($request->material);
        $col = caracteristica::find($request->color);
        
        
        
        $articulo->name = $request->name2;
        $articulo->precio = $request->precio;
        $articulo->caracteristicaarticulo()->associate($col); 
        $articulo->caracteristicaarticulo()->associate($mat);
        $articulo->original = false;
        
        $img = $request->file('imagen');
        $new_name = rand(). '.' . $img->getClientOriginalExtension();
        $destinationPath = 'image/';
        $img->move($destinationPath, $new_name);
         
        $articulo->imagen = $new_name;
        
        $articulo->producto()->associate($product);
        
        $articulo->save();
        
        return view('products.showproduct', compact('product'));
        
    }
    
    
    public function create($id)
    {
        $idp = $id;
        $materiales = Material::all();
        $colores = color::all();
        $caracteristicasc = caracteristica::where('caracteristicatipo_id','=', 1)->get();
        $caracteristicasm = caracteristica::where('caracteristicatipo_id','=', 2)->get();
                
        return view('articulos.createarticulo', compact('materiales','colores','idp','caracteristicasc','caracteristicasm'));
        
    }
    
    
    public function show($id){
        
        $articulo = articulos::find($id);
        
        return view('articulos.show', compact('articulo'));
        
    }
    
    
    public function edit($id)
    {
        $articulo = articulos::find($id);
        $materiales = Material::all();
        $colores = color::all();
        $caracteristicasc = caracteristica::where('caracteristicatipo_id','=', 1)->get();
        $caracteristicasm = caracteristica::where('caracteristicatipo_id','=', 2)->get();
        return view('articulos.editarticulo', compact('articulo', 'materiales','colores','caracteristicasc','caracteristicasm'));
        
    }

    public function update(Request $request, $id){
              
        $articulo = articulos::find($id);
        $mat = caracteristica::find($request->material);
        $col = caracteristica::find($request->color);
        
        
        
        $articulo->name = $request->name2;
        $articulo->precio = $request->precio;
        $articulo->caracteristicaarticulo()->associate($col); 
        $articulo->caracteristicaarticulo()->associate($mat);
        //$articulo->original = false;
        
        $img = $request->file('imagen');
        $new_name = rand(). '.' . $img->getClientOriginalExtension();
        $destinationPath = 'image/';
        $img->move($destinationPath, $new_name);
        
        
        
        $articulo->imagen = $new_name;
        
        
        
        $articulo->save();
        
        return view('Articulos.show', compact('articulo'));
        
    }
    
    public function byArticulo($id){
        
        $articulo = articulos::find($id);
        
        return $articulo;
    }

    
}


