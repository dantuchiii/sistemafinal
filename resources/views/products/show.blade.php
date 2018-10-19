@extends('layouts.start')

@section('content')

@include('products.fragments.info')
<div class="container py-3 col-9">

    <div class="card">
      <div class="row ">
        <div class="col-md-4">
        <label>{{ asset($articulo->name) }}</label>
        <img src="{{ URL::to('/image/'. $articulo->imagen)  }}" width="250px">
        @if($product->file)
            <img src="{{ $product->file }}" width="250px">
        @endif 
          </div>
          <div class="col-md-8 px-2 py-2">
            <div class="card-block px-4">
            <div class="row py-2">
              <h4 class="card-title">{{ $product->name }}</h4>
            </div>
            <div class="row py-2">  
              <p class="card-text"><b>Descripcion: </b>{{ $product->body }} </p>
            </div>
            <div class="row py-1">  
              <p class="card-text"><b>Precio: $</b>{{ $product->precio }} </p>
            </div>
            
            <div class="row d-flex py-4">
            <div class="col-12">
             <form method="POST" action="{{ route('Products.add', $product->id) }}">
                {{ csrf_field() }} 
                <div class="form-group row">
                <input class="form-control col-2" type="number" value="1" min="1" id="inputisito" name="canti">
                
                <button type="submit" class="btn btn-success col-4 ml-3"><i class="fa fa-cart-plus"></i> Agregar al carro</button>
                </div>
             </form>
            </div>  
            </div>   
          </div>

        </div>
      </div>
    </div>
    <br />
    <a href="{{ route('Products.index') }}" class="btn btn-info">Volver</a>
</div>











        
@endsection