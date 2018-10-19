<!-- Navbar -->

<nav class="navbar navbar-expand navbar-dark bg-primary static-top">
  <a class="navbar-brand mr-1" href="{{ url('/') }}"><i class="fas fa-city"></i>&nbsp;&nbsp;Sistema</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <div class="navbar-nav mr-auto">
  	           
  </div>

  <div>
	 	<div class="top-right links">
        @if (Auth::guest())
        <div class="nav-item">
	        <a data-toggle="modal" data-target="#logeo " href=""><button type="button" class="btn btn-outline-info" >Iniciar sesión</button></a>
	        <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-info">Registrarse</button></a>
        </div>
        @else
        <li class="nav-item dropdown" style="list-style: none;">
                     
            <a style="color: white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
            <ul class="dropdown-menu" role="menu">
                
                <li>
                    <a style="color: black;" href="{{ route('Pedido.carro') }}">
                        Ver Carrito
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a style="color: black;" href="{{ route('Pedido.index2') }}">
                        Mis Pedidos
                    </a>
                </li>
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
            </ul>

        </li>                                                       
        @endif
        
	  	</div>
  </div> 
@include('layouts.fragment.logeo')
</nav>