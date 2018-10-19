@extends('layouts.start')

@section('content')

<div class="col-md-12">

<div class="row d-flex flex-row">
<div class="p-2">
<h2>Detalles del Diseño</h2>
</div>
<div class="p-2 d-flex align-items-center">
<a class="btn btn-warning float-right" href="{{ route('Articulos.edit', $articulo->id) }}"><i class="far fa-edit"></i>Editar</a>
</div>
<div class="ml-auto p-2 d-flex align-items-center">
<a href="{{ route('Products.show', $articulo->producto->id) }}" class="btn btn-info">Volver</a> 
</div>
</div>

<hr />
<div class="row">
<img src="{{ URL::to('/image/'. $articulo->imagen)  }}" width="300" height="300">
<div class="col-md-5">
<br />
<h2 class="px-lg-2 py-4">{{ $articulo->name }}</h2>
<p  class="px-lg-2"><strong> Precio:</strong> ${{ $articulo->precio }}</p>
<p  class="px-lg-2"><strong> Material:</strong> {{ $articulo->material->name }}</p>
<p  class="px-lg-2"><strong> Color:</strong> {{ $articulo->color->name }}</p>
</div>

</div>

</div>








@endsection