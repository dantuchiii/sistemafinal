<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoDet;
use App\Http\Requests\PedidoRequest;


class PedidoDetController extends Controller
{
    public function store(){
        
        
        
    }
    
    
    
    
    public function sum($id, $num)
    {
        $pedet = PedidoDet::find($id);
        
        
        
        if($num==1){
            $pedet->cant= $pedet->cant - 1;
            $pedet->precio= $pedet->product->precio * $pedet->cant;
            $pedet->pedido->total = $pedet->pedido->total - $pedet->product->precio;
            $pedet->pedido->cantidad = $pedet->pedido->cantidad - 1;
        }else{
            $pedet->cant= $pedet->cant + 1;
            $pedet->precio= $pedet->product->precio * $pedet->cant;
            $pedet->pedido->total = $pedet->pedido->total + $pedet->product->precio;
            $pedet->pedido->cantidad = $pedet->pedido->cantidad + 1;
        }
        
        
        $pedet->pedido->save();
        $pedet->save();
        return back();
         
        
    }
    
    public function destroy($id)
    {
        $pedet = PedidoDet::find($id);
        $pedido = $pedet->pedido;
        $pedido->total= $pedido->total - $pedet->precio;
        $pedido->cantidad= $pedido->cantidad - $pedet->cant;
        $pedido->save();
        $pedet->delete();
        
        if($pedido->cantidad == 0){
            
            return redirect()->route('welc')->with('info', 'No hay productos en el carro');
            
        }else{
            return back();
        }
    }
    
    
    public function test2(PedidoRequest $request){
        
        echo $request->esa;
    }
    
    
}
