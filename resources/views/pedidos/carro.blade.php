@extends('layouts.start')

@section('content')

    <div class="col-md-12">
        <h2>
            Productos del carro
            <a href="{{ URL::previous() }}" class="btn btn-info float-right">Volver</a>
        </h2>
        @include('products.fragments.info')

        <table class="table">
              
            <tbody>
            
                @foreach($detalle as $det)
                    

                <tr>
                    <td style="vertical-align: middle; text-align: center; width: 1%;"><strong>{{ $det->cant }}</strong> Unidades</td>
                    
                    <td style="vertical-align: middle; width: 1%;"><img src="{{ URL::to('/image/'. $det->articulos->imagen)  }}" width="125px" height="125px"></td>
                    
                    <td><h5  >{{ $det->articulos->producto->name }}</h5>
                        <p  style="margin-top: -10px;">{{ $det->articulos->producto->categoria->name }}</p>
                        <p  style="font-size: large;  margin-top: -20px;"><strong>${{ $det->unitario }}</strong></p>
                        <p  style="margin-top: -10px;" >{{ $det->articulos->name }}</p>
                        <p  style="margin-top: -20px;" >Ancho: {{ $det->articulos->producto->ancho }} cm, Alto: {{ $det->articulos->producto->altura }}cm, Largo: {{ $det->articulos->producto->largo }}cm</p>
                        <p  style="margin-top: -20px; margin-bottom: -1px;" ><a style="color: gray; ;">Articulo Número: {{ $det->articulos->id }}</a></p>
                    </td>
                    
                    <td style="vertical-align: middle;">Total <strong class="float-right">${{ $det->precio }}</strong></td>
                        
                     <td style="vertical-align: middle; width: auto;"><form action="{{ route('PedidoDet.destroy', $det->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Borrar</button>
                        </form>
                        </td>   
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                @endforeach
                

            </tbody>
                              
        </table>
        {{ $detalle->links('vendor.pagination.bootstrap-4') }}
        <hr />
        <div class="row">
        <div class="col-md-12">
        <h2>Resúmen</h2>
        <hr style="border: 1px solid"/>
        <p><strong>Cantidad Productos</strong><strong class="float-right">{{ $pedido->cantidad }}</strong></p>
        <p><strong>Precio Total</strong><strong class="float-right">${{ $pedido->total }}</strong></p>

        <a class="btn btn-success float-right" data-toggle="modal" data-target="#confirmarpedido " href="">Confirmar</a>
        
        </div>
        </div>
        
    <div class="modal fade" id="confirmarpedido">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="d-flex justify-content-center modal-header">Confirmar Pedido</div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-md-12">
                            
                            <p><strong>Cantidad Productos</strong><strong class="float-right">{{ $pedido->cantidad }}</strong></p>
                            <p><strong>Precio Total</strong><strong class="float-right">${{ $pedido->total }}</strong></p>
                            <p>¿Está seguro de realizar este pedido?</p>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <a class="btn btn-danger" data-dismiss="modal" style="color: white;">Cancelar</a>
                    <a class="btn btn-success" href="{{ route('Pedido.confirmarpedido', $pedido) }}">Confirmar</a>
                </div>
            </div>
              
        </div>

    </div>
                
        
    </div>




  <!--  <div class="col-sm-4">
        mensaje
    </div> -->
    
    <!-- {{ route('Pedido.confirmarpedido', $pedido) }} -->
    

@endsection