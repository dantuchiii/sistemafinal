<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

use App\articulos;
use App\PedidoDet;
use App\CategoriaProducto;
use App\CaracteristicaArticulo;
use App\Product;
use App\caracteristica;
use App\Http\Requests\ProductRequest;
use auth;
use App\User;
use App\Http\Requests\PedidoRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    
    
    
    public function index(Request $request)
    {
        
        
        $products = Product::name($request->get('nombrep'))->orderBy('id', 'DESC')->paginate();
        

        return view('products.index', compact('products'));    
        
    }
    
    
    
    
    public function show($id)
    {
        $product = Product::find($id);
        
        return view('products.showproduct', compact('product'));
        
    }
    
    
    
    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        
        return back()->with('info', 'El producto fue eliminado');
    }
    
    
    
    
    public function edit($id)
    {
        $product = Product::find($id);
        $categorias = CategoriaProducto::all();
        return view('products.edit2', compact('product', 'categorias'));
        
    }
    
    
    
    public function create()
    {
        $categorias = CategoriaProducto::all();
        
        $caracteristicasc = caracteristica::where('caracteristicatipo_id','=', 1)->get();
        $caracteristicasm = caracteristica::where('caracteristicatipo_id','=', 2)->get();
        return view('products.create2', compact('categorias','caracteristicasc','caracteristicasm'));
        
    }
    
    
    
    
    public function store(Request $request)
    {
        $product = new Product;
        $articulo = new articulos;
        $carart = new CaracteristicaArticulo;
        $carart2 = new CaracteristicaArticulo;
        
        $cat = CategoriaProducto::find($request->category);
        $mat = caracteristica::find($request->material);
        $col = caracteristica::find($request->color);
        
        $articulo->name = $request->name2;
        $articulo->precio = $request->precio;
       
        $carart->caracteristica()->associate($mat);
        $carart2->caracteristica()->associate($col);
        
        $articulo->original = true;
                
        $product->name = $request->name;
        $product->body = $request->body;
        $product->categoria()->associate($cat);
        $product->largo = $request->largo;
        $product->ancho = $request->ancho;
        $product->altura = $request->altura;
        
        if($request->customable==null){
            $product->customable = false;
        }else{
            $product->customable = true;
        }
                
                
                
         $img = $request->file('imagen');
         $new_name = rand(). '.' . $img->getClientOriginalExtension();
         $destinationPath = 'image/';
         $img->move($destinationPath, $new_name);
         
         $articulo->imagen = $new_name;
              
        
         $product->save();
        
         $articulo->producto()->associate($product);
        
        
         $articulo->save();
        
         $carart->articulo()->associate($articulo);
         $carart2->articulo()->associate($articulo);
         $carart->save();
         $carart2->save();
        


         return redirect()->route('Products.index')->with('success','El producto se ha agregado');
        
        
        
    }
    
   
   
   
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $categoria = CategoriaProducto::find($request->category);
        
        $product->name = $request->name;
        $product->body = $request->body;
        $product->largo = $request->largo;
        $product->ancho = $request->ancho;
        $product->altura = $request->altura;
        $product->categoria()->associate($categoria);
        
        if($request->customable==null){
            $product->customable = false;
        }else{
            $product->customable = true;
        }
        
                
               
        $product->save();
        
        return redirect()->route('Products.index')->with('info','El producto se ha modificado');
    }
    
    
    public function showcatalog($id){
        
        $articulo = articulos::find($id);
        
        return view('products.showcatalog', compact('articulo'));
        
    }

    
    
    
    
    
        //Catalogo
        public function catalogo()
    {
        $products = Product::orderBy('id', 'DESC')->paginate();

        return view('products.catalog', compact('products'));    
        
    }
    
    
    
    
    //MEJORAR FUNCION -> Agregar producto al carro
    
    public function add2(PedidoRequest $request, $id){
        
        
        
        $pedido = Pedido::where('estado',0)->where('usuario_id', auth::id())->first();
        $pedet = new PedidoDet;
        $articulo = articulos::find($id);
        
        if(auth::check()){
        
        $user = User::find(Auth::id());
        
        if(empty($pedido))
        {
            $pedido = new Pedido;
        
            $pedido->usuario()->associate($user);
            $pedido->estado = 0;
            $pedido->cantidad = 0;
            $pedido->total = 0;
            //$pedido->save();
            
        }
        
        //Detectar si articulo ya esta en el carro
        
        foreach($pedido->pedido_detalle()->get() as $deti){
            
            if($deti->articulos->id == $articulo->id){
                
                $deti->cant = $deti->cant + $request->canti;
                
                $deti->precio = $deti->precio + ($articulo->precio * $request->canti);
                $pedido->cantidad = $pedido->cantidad + $request->canti;
                $pedido->total = $pedido->total + ($articulo->precio * $request->canti);
                
                $deti->save();
                $pedido->save();
                              
                return redirect()->route('Product.showcatalog', ['id' => $articulo->id])->with('info', 'Producto agregado al carro');
                
            }
            
        }
        
        //Agregar producto al carro

        $pedet->cant = $request->canti;
        $pedet->unitario = $articulo->precio;
        $pedet->precio = $articulo->precio * $request->canti;
        $pedido->cantidad = $pedido->cantidad + $request->canti;
        $pedido->total = $pedido->total + ($pedet->precio);
        $pedet->pedido()->associate($pedido);
        $pedet->articulos()->associate($articulo);
        
        $pedet->pedido->save();
        $pedet->save();
        
        }
        else{
            
            return redirect()->route('Product.showcatalog', ['id' => $articulo->id])->with('info', 'Tienes que iniciar sesion primero');
        }
        
        return redirect()->route('Product.showcatalog', ['id' => $articulo->id])->with('info', 'Producto agregado al carro');
        
        
    }
        
        
        
        
    
    
    
    
    
    

    
    
    
}
