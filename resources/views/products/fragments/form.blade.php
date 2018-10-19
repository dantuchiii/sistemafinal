<div class="form-group">
    {!! Form::label('name', 'Nombre del producto') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Descripcion') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 40,'maxlength' => '125']) !!}
</div>

<div class="form-group">
    {!! Form::label('precio', 'Precio') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Imagen') !!}
    {!! Form::file('file') !!}    
</div>



<div class="form-group">
    {!! Form::label('customable', 'Personalizable') !!}
    @if(empty($product))
    {!! Form::checkbox('customable', null) !!}
    @else
    {!! Form::checkbox('customable', $product->customable) !!}
    @endif
</div>



<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
    
</div>