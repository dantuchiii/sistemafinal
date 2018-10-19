
@extends('layouts.start')

@section('content')
<div class="row">
    <div class="col-md-12"> 
        <h2>
            Listado de productos
            <a class="btn btn-info float-right" href="{{ route('welc') }}">Volver</a>
        </h2>
        @include('products.fragments.info')
        <hr />
        <div class="row py-1">
            <div class="col-md-4">
                <form method="GET" action="{{ route('Products.index') }}" class="form-inline px-1">
                    <div class="form-group">
                    <input type="text" name="nombrep" class="form-control" placeholder="Nombre del Producto">
                    </div>
                    
                    <div class="form-group px-2">
                    <button type="submit" class="btn btn-primary"  ><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th>Nombre de producto</th>
                    <th>Categoria</th>
                    <th>Personalizable</th>
                    <th colspan="2"></th>
                </tr>
            </thead>  
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->categoria->name }}</td>
                    @if( $product->customable == true)
                    <td> Si </td>
                    @else
                    <td> No </td>
                    @endif
                    <td>
                        <a class="btn btn-info " href="{{ route('Products.show', $product->id) }}"><i class="far fa-eye"></i> Ver</a>
                    </td>
                    <td>       
                        <a class="btn btn-warning" href="{{ route('Products.edit', $product->id) }}"><i class="far fa-edit"></i> Editar</a>
                    </td>
                   
                    
                </tr>
                @endforeach
            </tbody>
                  
        </table>
        {!! $products->links('vendor.pagination.bootstrap-4') !!}
        <a href="{{ route('Products.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Producto</a>
        
    </div>
</div>
    

@endsection