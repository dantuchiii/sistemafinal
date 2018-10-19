@extends('layouts.start')

@section('content')
<div class="row">
    <div class="col-md-12"> 
        
        <h2>
            Mis Pedidos <a class="btn btn-info float-right" href="{{ route('welc') }}">Volver</a>
            <!--<a href="{{ route('Pedido.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Nuevo</a>-->
        </h2>
        @include('products.fragments.info')
        
        <hr />
        <table class="table table-hover table-striped table-bordered col-md-10">
            <thead>
                <tr>
                    <th width="15%">N° de Pedido</th>
                    <th width="20%">Cantidad Productos</th>
                    <th width="15%">Precio Total</th>
                    <th width="15%">Fecha</th>
                    <th colspan="1">&nbsp;</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($pedidos as $pe)
                @if($pe->estado != 0 )
                <tr>
                    
                    <td style="text-align: right;">{{ $pe->id }}</td>
                    <td style="text-align: right;">{{ $pe->cantidad }}</td>
                    <td style="text-align: right;">${{ $pe->total }}</td>
                    <td style="text-align: right;">{{ $pe->fecha }}</td>
                    <td align="center">
                        <a class="btn btn-info " href="{{ route('Pedido.show2', $pe->id) }}"><i class="far fa-eye"></i> Ver</a>
                    </td>
                    
                    
                    
                </tr>
                @endif
                @endforeach
            </tbody>
                  
        </table>
        {!! $pedidos->links('vendor.pagination.bootstrap-4') !!}
        
    </div>

    </div>

@endsection