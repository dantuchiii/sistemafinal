@extends('layouts.start')

@section('content')


    <div class="col-md-12">
        <h2>
            Agregar Producto   
                  
        </h2>
        
        <hr />
        <h3>
            Datos básicos 
                  
        </h3>
        <form method="POST" action="{{ route('Products.store') }}" class="form-horizontal" enctype="multipart/form-data" id="formularioprod">
            {{ csrf_field() }}
            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Nombre del Producto</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif            
            </div>
            
            
            
             <div class="form-group">
                <label for="categoria" class="control-label">Categoria</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>       
                
            </div>
            
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="descripción" class="control-label">Descripción del producto</label>
                <textarea form="formularioprod" name="body" id="body" class="form-control" maxlength="125" required></textarea>   
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
                    <input id="largo" type="number" class="form-control input-group-addon" name="largo" style="display: inline;" required/>    
                </div>                 
            
                <div class="col-md-2">
                    <label for="width" class="control-label">Ancho</label>
                    <input id="ancho" type="number" class="form-control" name="ancho" required/> 
                </div>    
                      
                <div class="col-md-2">
                    <label for="height" class="control-label">Altura</label>
                    <input id="altura" type="number" class="form-control" name="altura" required/>            
                </div>
                
            </div>
                
            <div class="form-group">
                <label for="personalizable" class="control-label">Personalizable</label>
                @if(empty($product))
                <input id="customable" type="checkbox" name="customable"/>    
                @else
                <input id="customable" type="checkbox" name="customable" value="{{ $product->customable }}"/>    
                @endif                        
            </div>
            
            
            
            
            <hr />
            
            
            
                        
            <h3>
            Configurar el Diseño Original del Producto                  
            </h3>
            
            <div class="form-group">
                <label for="name2" class="control-label">Nombre del diseño</label>
                <input id="name2" type="text" class="form-control" name="name2" required/>
            </div>
            
            <div class="form-group">
            
                
                <label for="precio" class="control-label">Precio</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >$</span>
                    </div>
                <input id="precio" type="number" class="form-control col-md-4" name="precio" min="1" required/>
                </div>
             </div>  
                
             <div class="form-group row">   
                
                <div class="col-md-3">
                <label for="material" class="control-label">Material</label>
                <select class="form-control" name="material" id="material">
                    @foreach($caracteristicasm as $mat)
                        <option value="{{ $mat->id }}">{{ $mat->name }}</option>
                    @endforeach
                </select>   
                </div>
              
                <div class="col-md-3">
                <label for="color" class="control-label">Color</label>
                <select class="form-control" name="color" id="color">
                    @foreach($caracteristicasc as $col)
                        <option value="{{ $col->id }}">{{ $col->name }}</option>
                    @endforeach
                </select>   
                </div>
             </div>   
                
                
                
             <div class="form-group">
            
                
                <label for="imagen" class="control-label">Imagen</label>
                <input id="imagen" type="file" class="form-control" name="imagen"/>
                
             </div>     
                
                
                
                
            </div>
            
             <br />
        
            <a href="{{ route('Products.index') }}" class="btn btn-danger col-2 ml-3">Cancelar</a> 
            <button type="submit" class="btn btn-primary col-2 ml-3">Guardar</button> 
            
            
         
        </form>
        <div class="row">
        <br />
        </div>
        
       
   
        
        
        
        
                
    



@endsection