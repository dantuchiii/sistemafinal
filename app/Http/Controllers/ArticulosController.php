<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\color;
use App\Material;
use App\articulos;
use App\Product;
use App\caracteristica;
use App\CaracteristicaArticulo;
use File;
use DB;


class ArticulosController extends Controller
{
    
    public function store(Request $request, $id){

        $this->validate($request, [
        'name2' => 'required|max:2',
        

        ]);
             
        $articulo = new articulos;
        $product = Product::find($id);
        $mat = caracteristica::find($request->material);
        $col = caracteristica::find($request->color);
        $carart = new CaracteristicaArticulo;
        $carart2 = new CaracteristicaArticulo;
        
        
        $articulo->name = $request->name2;
        $articulo->precio = $request->precio;

        $carart->caracteristica()->associate($mat);
        $carart->idt = 2;
        $carart2->caracteristica()->associate($col);
        $carart2->idt = 1;

        
        $articulo->original = false;
        
        $img = $request->file('imagen');
        $new_name = rand(). '.' . $img->getClientOriginalExtension();
        $destinationPath = 'image/';
        $img->move($destinationPath, $new_name);
         
        $articulo->imagen = $new_name;
        
        $articulo->producto()->associate($product);
        
        $articulo->save();

        $carart->articulo()->associate($articulo);
        $carart2->articulo()->associate($articulo);
        $carart->save();
        $carart2->save();
        
        //return view('products.showproduct', compact('product'));
        return redirect()->route('Products.show', $articulo->producto->id)->with('success','El diseño se ha agregado');
    }
    
    
    public function create($id)
    {
        $idp = $id;
        
        $caracteristicasc = caracteristica::where('caracteristicatipo_id','=', 1)->get();
        $caracteristicasm = caracteristica::where('caracteristicatipo_id','=', 2)->get();
                
        return view('articulos.createarticulo', compact('idp','caracteristicasc','caracteristicasm'));
        
    }
    
    
    public function show($id){
        
        $articulo = articulos::find($id);
        
        return view('articulos.show', compact('articulo'));
        
    }
    
    
    public function edit($id)
    {
        $articulo = articulos::find($id);
       
        $caracteristicasc = caracteristica::where('caracteristicatipo_id','=', 1)->get();
        $caracteristicasm = caracteristica::where('caracteristicatipo_id','=', 2)->get();
        return view('articulos.editarticulo', compact('articulo','caracteristicasc','caracteristicasm'));
        
    }

    public function update(Request $request, $id){
              
        $articulo = articulos::find($id);

        $mat = $articulo->caracteristicaarticulo()->where('idt', 2)->first();
        $col = $articulo->caracteristicaarticulo()->where('idt', 1)->first();

        $mat->articulo()->dissociate($articulo);
        $col->articulo()->dissociate($articulo);

        DB::table('caracteristica_articulos')->where('id', '=', $mat->id)->delete();
        DB::table('caracteristica_articulos')->where('id', '=', $col->id)->delete();
        

        $mat = caracteristica::find($request->material);
        $col = caracteristica::find($request->color);
        $carart = new CaracteristicaArticulo;
        $carart2 = new CaracteristicaArticulo;

        
        
        $articulo->name = $request->name2;
        $articulo->precio = $request->precio;
        $carart->caracteristica()->associate($mat);
        $carart->idt = 2;
        $carart2->caracteristica()->associate($col);
        $carart2->idt = 1;
        //$articulo->original = false;
        
        $img = $request->file('imagen');
        $new_name = rand(). '.' . $img->getClientOriginalExtension();
        $destinationPath = 'image/';
        $img->move($destinationPath, $new_name);
        
        
        
        $articulo->imagen = $new_name;
        
        
        
        $articulo->save();

        $carart->articulo()->associate($articulo);
        $carart2->articulo()->associate($articulo);
        $carart->save();
        $carart2->save();
        
        return view('Articulos.show', compact('articulo'));
        
    }
    
    public function byArticulo($id){
        
        $articulo = articulos::find($id);
        
        return $articulo;
    }

    public function typeaheadart(Request $request, $art){
        if($request->ajax()){

            $articulo = articulos::where('name','LIKE', '%'.$art.'%')->get();

            if($articulo->isNotEmpty()){
                return response()->json('articulos' => $articulo);
            }
        }

    }



}


