<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\articulos;
use App\PedidoDet;
use App\Product;
use App\User;
use auth;
use Carbon;

class PedidoController extends Controller
{
    
    
    
    public function index()
    {
        $pedidos = Pedido::orderBy('id', 'DESC')->paginate();

        return view('pedidos.index', compact('pedidos'));    
        
    }
    
    public function index2(){
        
        $pedidos = Pedido::where('usuario_id', auth::id())->orderBy('id', 'DESC')->paginate(6);
        
        return view('pedidos.index2', compact('pedidos'));
    }
    
    public function show($id)
    {
        $pedido = Pedido::find($id);
        
        
        return view('pedidos.show', compact('pedido'));
        
    }
    
    public function show2($id)
    {
        $pedido = Pedido::find($id);
        
        $detalle = $pedido->pedido_detalle()->paginate(3);
        return view('pedidos.show2', compact('detalle','pedido'));
        
    }
    
    public function create()
    {
        $users = User::orderBy('id', 'ASC')->paginate();
        return view('pedidos.create', compact('users'));
        
    }
    
    
    
    
    
    
    
    
    //Funci
    
    public function carro(){
        
        $pedido = Pedido::where('estado',0)->where('usuario_id', auth::id())->first();
        
        if(empty($pedido) || $pedido->cantidad == 0){
            return back()->with('info','No hay productos agregado al carro');
            
        }else{
        
        $detalle = $pedido->pedido_detalle()->paginate(4);
        
        
        
        if(empty($detalle)){
            return back()->with('info','No hay productos agregado al carro');
        }else{
        
        $articulos = new articulos;
        
        
        
        //$prod = $detalle->product()->getAttribute()
        return view('pedidos.carro', compact('pedido'),compact('detalle'), compact('articulos'));
        }
        }
        
    }
    
    
    
    
    public function confirmarpedido(Pedido $pedido){
        
        $pedido->estado = 1;
              
        //$pedet = $pedido->pedido_detalle()->get();
        
        
        $pedido->fecha = Carbon\Carbon::now();
        
        $pedido->save();
        
              
        
        return redirect()->route('Pedido.index2')->with('info','Nuevo pedido realizado');
        
        
        
    }
    
    
    public function test($id){
        
        $pedido = Pedido::find($id);
        
        $producto = Product::all();
        $array = [];
        
        
        
        
        
        return view('pruebitadelnico', compact('pedido','producto','array'));
        
    }
    
    
}
