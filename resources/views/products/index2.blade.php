
@extends('layouts.start')

@section('content')

    <div class="col-md-12"> 
        <h2>
            Listado de productos
            <a href="{{ route('Products.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Nuevo</a>
        </h2>
        @include('products.fragments.info')
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th>Nombre de producto</th>
                    <th>Categoria</th>
                    <th>Personalizable</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->categoria->name }}</td>
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
                    <td>       
                        <form action="{{ route('Products.destroy', $product->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i> borrar </button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
                  
        </table>
        {!! $products->render() !!}
        <a class="btn btn-info" href="{{ route('welc') }}">Volver</a>
    </div>

    

@endsection