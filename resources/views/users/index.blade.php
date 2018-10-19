@extends('layouts.start')

@section('content')

    <div class="col-sm-10"> 
        <h2>
            Listado de usuarios
            <!--<a href="" class="btn btn-primary float-right">Nuevo</a>-->
        </h2>
        @include('products.fragments.info')
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($users as $us)
                
                <tr>
                    <td>{{ $us->id }}</td>
                    <td>{{ $us->name }}</td>
                    <td>{{ $us->email }}</td>
                    <td>
                        <a class="btn btn-info " href="">Ver</a>
                    </td>
                    <td>       
                        <a class="btn btn-warning" href="">Editar</a>
                    </td>
                    <td>       

                    </td>
                    
                </tr>
                
                @endforeach
            </tbody>
                  
        </table>
        {!! $users->render() !!}
        <a class="btn btn-info" href="{{ route('welc') }}">Volver</a>
    </div>

    

@endsection