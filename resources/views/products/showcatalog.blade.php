@extends('layouts.start')

@section('content')
@include('products.fragments.info')
<div class="col-md-12">
<h2>Descripción del Producto <a href="{{ route('Products.catalog') }}" class="btn btn-info float-right">Volver</a> </h2>
<hr />
<div class="row">
<img src="{{ URL::to('/image/'. $articulo->imagen)  }}" width="500" height="500">
<div class="col-md-5">
<br />
<h2 class="px-lg-5" style="margin-top: -15px;">{{ $articulo->producto->name }}</h2>
<p  class="px-lg-5" style="margin-top: -7px;">{{ $articulo->producto->categoria->name }}, {{ $articulo->name }}</p>
<p class="px-lg-5" style="font-size: xx-large; margin-bottom: -10px; margin-top: -10px;"><strong>${{ $articulo->precio }}</strong></p>
<p  class="px-lg-5" style="font-size: smaller; color: gray;">El diseño seleccionado afecta el precio</p>
<p  class="px-lg-5" style="font-size: smaller; margin-top: -13px;">Articulo Numero: {{ $articulo->id }}</p>
<p  class="px-lg-5">{{ $articulo->producto->body }}</p>
<p  class="px-lg-5"><a style="color: #606060;">Tamaño</a> ancho: {{ $articulo->producto->ancho }}cm, alto: {{ $articulo->producto->altura }}cm, largo: {{ $articulo->producto->largo }}cm</p>
<div class="container px-lg-5">

<label class="control-label">Diseño</label>
<select class="form-control" name="art" id="select-art" >
    @foreach($articulo->producto->articulos()->get() as $art)
        @if($art->id == $articulo->id)
        <option value="{{ $art->id }}" selected="true">{{ $art->name }}</option>
        @else
        <option value="{{ $art->id }}">{{ $art->name }}</option>
        @endif
    @endforeach
</select>

</div>
<div class="container px-lg-5">
<form class="py-4 px-lg-3" method="POST" action="{{ route('Products.add', $articulo->id) }}">
                {{ csrf_field() }} 
                
                <div class="form-group row">
                
                <input class="form-control col-3" type="number" value="1" min="1" id="inputisito" name="canti">
                @if(auth::check())
                <button type="submit" class="btn btn-success ml-3"><i class="fa fa-cart-plus"></i> Agregar al carro</button>
                @else
                <a data-toggle="modal" data-target="#logeo " href=""><button class="btn btn-success ml-3"><i class="fa fa-cart-plus"></i> Agregar al carro</button></a>    
                @endif
                </div>
                
             </form>
</div>
</div>
</div>


@include('layouts.fragment.logeo')


</div>








@endsection