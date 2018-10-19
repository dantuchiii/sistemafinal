
@extends('layouts.start')

@section('content')
<div class="row">
    <div class="col-md-12"> 
        <h2>
            Catálogo de productos
            <a class="btn btn-info float-right" href="{{ route('welc') }}">Volver</a>
        </h2>
        <hr />
        @include('products.fragments.info')
        
        <div class="row">
        
        @foreach($products as $prod)
            @php
                $art = $prod->articulos()->get()
            @endphp
        <div class="col-md-3 py-2">
        
        <div class="card" style="width: 15rem;">
        @foreach($prod->articulos()->get() as $art)
            @if($art->original == true)
            <a href="{{ route('Product.showcatalog', $art->id) }}"><img class="card-img-top" src="{{ URL::to('/image/'. $art->imagen)  }}" alt="Card image cap"></a>
               
        <div class="card-body">
            <strong style="font-size: x-large;" class="card-title">{{ $prod->name }}</strong>
            <p class="card-text">{{ $prod->categoria->name }}</p> 
            <p style="size: x-large; margin-top: -1rem;" class="card-text"><strong>${{ $art->precio }}</strong></p>
            
        </div>
        </div>
        @endif
        @endforeach
        </div>
         
        @endforeach        
        

        
        
        
         
        

        




        {!! $products->render() !!}
        <br />
        
    </div>
    </div>
    
    </div>
    

@endsection