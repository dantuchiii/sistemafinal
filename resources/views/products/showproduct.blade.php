@extends('layouts.start')

@section('content')
<div class="row">
<div class="col-md-12">
<div class="row d-flex flex-row">
<div class="p-2">
<h2>Detalles del Producto</h2>
</div>
<div class="p-2 d-flex align-items-center">
<a class="btn btn-warning" href="{{ route('Products.edit', $product->id) }}"><i class="far fa-edit"></i>Editar</a>
</div>
<div class="ml-auto p-2 d-flex align-items-center">
<a href="{{ route('Products.index') }}" class="btn btn-info float-right">Volver</a>
</div>

</div>
<hr />
<h2>{{ $product->name }}</h2>
<p><label><strong>Categoría:</strong></label> {{ $product->categoria->name }}</p>
<p><label><strong>Descripción:</strong></label> {{ $product->body }}</p> 
<p><label><strong>Medidas:</strong></label> Largo {{ $product->largo }}cm/ Ancho {{ $product->ancho }}cm/ Altura {{ $product->altura }}cm</p>
<br />

<h2>Diseños<a class="btn btn-primary float-right" href="{{ route('Articulos.create2', $product->id) }}" style="color: white;"><i class="fas fa-plus"></i>Agregar Diseño</a></h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th width="20px">ID</th>
            <th width="230px">Producto</th>
            <th>Precio</th>
            <th>Material</th>
            <th>Color</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product->articulos()->get() as $art)
        <tr>
            <td style="vertical-align: middle;">{{ $art->id }}</td>
            <td><img src="{{ URL::to('/image/'. $art->imagen)  }}" width="50px" height="50px"> {{ $art->name }}</td>
            <td style="vertical-align: middle;">${{ $art->precio }}</td>
            <td style="vertical-align: middle;">
                @foreach($art->caracteristicaarticulo()->get() as $artcar)
                    @if($artcar->idt == 1)    
                        {{ $artcar->caracteristica->name }}
                    @endif
                @endforeach
            </td>
            <td style="vertical-align: middle;">
                @foreach($art->caracteristicaarticulo()->get() as $artcar)
                    @if($artcar->idt == 2)    
                        {{ $artcar->caracteristica->name }}
                    @endif
                @endforeach
            </td>
            <td style="vertical-align: middle;">
                <a class="btn btn-info " href="{{ route('Articulos.show', $art->id) }}"><i class="far fa-eye"></i> Ver</a>
            </td>
            <td style="vertical-align: middle;">       
                <a class="btn btn-warning" href="{{ route('Articulos.edit', $art->id) }}"><i class="far fa-edit"></i> Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>




</div>


</div>





@endsection