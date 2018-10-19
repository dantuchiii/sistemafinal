@extends('layouts.start')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
        <h3>Informacion Cliente  <a href="" class="btn btn-primary">Buscar</a></h3>
            <p class="mb-2" id="1" ><strong>Nombre:</strong> </p>
            <p class="mb-2" id="2"><strong>Apellido:</strong></p>
            <p class="mb-2" id="3"><strong>Documento:</strong></p>
            <p class="mb-2" id="4"><strong>Username:</strong></p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
        <h3>Seleccionar Cliente</h3>
        
        <select id="selectBox" onchange="changeFunc();">
            @foreach($users as $us)
            <option value="{{ $us->name }}">{{ $us->name }}</option>
            @endforeach
        </select>
        </div>
    </div>

</div>

<div class="row py-4">
    <div class="col-md-12">
        <div class="card">
        <h3>Productos del pedido</h3>
        
        <input id="prueba" class="text" value="" />
        </div>
    </div>
</div>


<script type="text/javascript">

   function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById("prueba").value = selectedValue;
    
    
    
    
    
    alert(selectedValue);
    
   }

  </script>








@endsection