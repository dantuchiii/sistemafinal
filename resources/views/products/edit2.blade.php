@extends('layouts.start')

@section('content')


    <div class="col-md-12">
        <h2>
            Editar Producto  
                  
        </h2>
        
        <hr />
        <h3>
            Datos básicos 
                  
        </h3>
        <form method="POST" action="{{ route('Products.update', $product->id) }}" class="form-horizontal" enctype="multipart/form-data" id="formularioprod">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Nombre del Producto</label>
                <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" required autofocus>
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif            
            </div>
            
            
            
             <div class="form-group">
                <label for="categoria" class="control-label">Categoria</label>
                <select name="category" class="form-control" id="category">
                    @foreach($categorias as $cat)
                        @if($product->categoria->id == $cat->id)
                        <option value="{{$cat->id}}" selected="true">{{ $cat->name }}</option>
                        @else
                        <option value="{{$cat->id}}">{{ $cat->name }}</option>
                        @endif
                    @endforeach
                </select>       
                
            </div>
            
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="descripción" class="control-label">Descripción del producto</label>
                <textarea form="formularioprod" name="body" id="body" class="form-control" maxlength="125" required>{{ $product->body }}</textarea>   
                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif      
                
                     
            </div>
           
                       
            <label> Medidas (en centimetros) </label>
            <div class="form-group row">
            
                <div class="col-md-2">
                    <label for="length" class="control-label">Largo</label>
                    <input id="largo" type="number" class="form-control input-group-addon" name="largo" style="display: inline;" required value="{{ $product->largo }}"/>    
                </div>                 
            
                <div class="col-md-2">
                    <label for="width" class="control-label">Ancho</label>
                    <input id="ancho" type="number" class="form-control" name="ancho" required value="{{ $product->ancho }}"/> 
                </div>    
                      
                <div class="col-md-2">
                    <label for="height" class="control-label">Altura</label>
                    <input id="altura" type="number" class="form-control" name="altura" required value="{{ $product->altura }}"/>            
                </div>
                
            </div>
                
            <div class="form-group">
                <label for="personalizable" class="control-label">Personalizable</label>
                @if($product->customable == true)
                <input id="customable" type="checkbox" name="customable" checked="true"/>    
                @else
                <input id="customable" type="checkbox" name="customable"/>    
                @endif                        
            </div>
            
             </div>
            
            <a href="{{ route('Products.show', $product->id) }}" class="btn btn-danger col-2 ml-3">Cancelar</a> 

            <button type="submit" class="btn btn-primary col-2 ml-3">Guardar</button>  
            
            
            
            </form>
            
           

            <div class="row">
        <br />
        </div>
 
 @endsection  