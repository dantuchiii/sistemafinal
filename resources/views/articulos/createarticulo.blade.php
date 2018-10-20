@extends('layouts.start')

@section('content')


    <div class="col-sm-10">
        <h2>
            Agregar Diseño   
                  
        </h2>
        
        <hr />
        
        <form method="POST" action="{{ route('Articulos.store2', $idp) }}" class="form-horizontal" enctype="multipart/form-data" id="formularioprod">
            {{ csrf_field() }}
                      
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
                <select name="material" id="material">
                    @foreach($caracteristicasm as $mat)
                        <option value="{{ $mat->id }}">{{ $mat->name }}</option>
                    @endforeach
                </select>   
                </div>
              
                <div class="col-md-3">
                <label for="color" class="control-label">Color</label>
                <select name="color" id="color">
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
        
            <a href="{{ route('Products.show', $idp) }}" class="btn btn-danger col-2 ml-3">Cancelar</a> 
            <button type="submit" class="btn btn-primary col-2 ml-3">Guardar</button> 
            
            
         
        </form>
        <div class="row">
        <br />
        </div>
        
       
   
        
        
        
        
                
    



@endsection