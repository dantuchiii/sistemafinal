@extends('layouts.start')

@section('content')

<div class="container col-12">
    <div class="row">
        <div class="col-md-12">
            <h2>
                Detalles del Pedido <a href="{{ route('Pedido.index2') }}" class="btn btn-info float-right">Volver</a>
            </h2>
        </div>
    </div>
    <hr />
    
    <div class="row py-3">
        <div class="col-md-12">
            
                
                            <p class="mb-1 col-md-6" ><strong>Fecha:</strong><a class="float-right"> {{ $pedido->fecha }}</a></p>
                            <p class="mb-1 col-md-6" ><strong>Cantidad productos:</strong><a class="float-right">{{ $pedido->cantidad }}</a></p>
                            <p class="mb-1 col-md-6" ><strong>Total:</strong><a class="float-right"> ${{ $pedido->total }}</a></p>
                            
    
            <br />
                <div class="row py-2">
                    <div class="col-md-12">
                        <h4 class="font-weight-bold mb-4">Productos del pedido</h4>
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
                    
                </tr>
                @endforeach
                

            </tbody>
                              
        </table>
        {{ $detalle->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            
            

    </div>
</div>   
    
</div>



@endsection