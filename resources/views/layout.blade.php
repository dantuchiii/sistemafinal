<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App | Trabajo Final</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    
</head>

<body>

             
                <nav class="navbar navbar-dark bg-dark navbar-static-top navbar-fixed-top">
                    <div class="container-fluid">
                                                            
                          <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-city"></i>
                             Home
                          </a>
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     @if (Auth::guest())     
                     <div class="nav-item">
                        <a class="btn btn-outline-info" style="color: white; " href="{{ route('login') }}"> Iniciar Sesion </a>
                        <a class="btn btn-outline-info" style="color: white; " href="{{ route('register') }}"> Registrarse </a>
                     </div>  
                     @else
                     
                     <li class="nav-item dropdown" style="list-style: none;">
                     
                                <a style="color: white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-ninja"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a style="color: black;" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a style="color: black;" href="{{ route('Pedido.carro') }}">
                                            Ver Carrito
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>


                     </li>
                                          
                     
                     
                     @endif
                      

                      
                      
                      
                      
                      
                      
                    </div>
                </nav>
           
            
            
            <div class="container" id="superid"><br /><br />
                @yield('content')
            </div>   
             






    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dropdownshow.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
   
</body>
</html>