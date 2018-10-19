@extends('layouts.start')

@section('content')

<div class="container col-12">
    <div class="row">
        <div class="col-md-12">
            <h2>
                Detalles del Pedido <a href="{{ route('Pedido.index') }}" class="btn btn-info float-right">Volver</a>
            </h2>
        </div>
    </div>
    
    
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h4 class="font-weight-bold mb-4">Informacion del cliente</h4>
                            <p class="mb-1" ><strong>Nombre:</strong> {{ $pedido->usuario->nombre }}</p>
                            <p class="mb-1" ><strong>Apellido:</strong> {{ $pedido->usuario->apellido }}</p>
                            <p class="mb-1" ><strong>Documento:</strong> {{ $pedido->usuario->dni }}</p>
                            
    
            
                <div class="row py-5">
                    <div class="col-md-12">
                        <h4 class="font-weight-bold mb-4">Productos del pedido</h4>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Diseño</th>
                                    <th>N° del Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Total</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($pedido->pedido_detalle()->get() as $det)
                                    <tr>
                                        <td>{{ $det->articulos->producto->name }}</td>
                                        <td>{{ $det->articulos->name }}</td>
                                        <td style="text-align: right;">{{ $det->articulos->id }}</td>
                                        <td style="text-align: right;">{{ $det->cant }}</td>
                                        <td style="text-align: right;">${{ $det->unitario }}</td>
                                        <td style="text-align: right;">${{ $det->precio }}</td>
                                    </tr>
                                @endforeach
                                <tr style="font-weight: bold;">
                                    <td colspan="2"  >TOTAL </td>
                                    <td> </td>
                                    <td style="text-align: right;">{{ $pedido->cantidad }}</td>
                                    <td> </td>
                                    
                                    <td style="text-align: right;">${{ $pedido->total }}</td>
                                        
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>
            </div>
            <br />
            
            
            
            
        </div>
    </div>   
    
    
     


</div>



@endsection