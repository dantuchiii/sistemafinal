<!-- Sidebar -->
  <ul class="sidebar navbar-nav">

    <li class="nav-item" >
      <a class="nav-link" href="{{ url('/') }}">
        <i class="fas fa-fw fa-home"></i>
        <span data-toggle="tooltip">Home</span>
      </a>
    </li>



    <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="producto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Productos</span>
      </a>
      
      <div class="dropdown-menu" aria-labelledby="producto">
        
        <a class="dropdown-item" href="{{ route('Products.index') }}">Gestion de productos</a>
        
        <div class="dropdown-divider"></div>
        
        <a class="dropdown-item" href="{{ route('Products.catalog') }}">Catalogo de productos</a>

      </div>
    </li>
    
    

   
    
    <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="pedidos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pedidos</span>
      </a>
      
      <div class="dropdown-menu" aria-labelledby="pedidos">
        
        <a class="dropdown-item"  href="{{ route('Pedido.index') }}">Lista de Pedidos</a>
        
        

      </div>
    </li>
    
    

    
    
    
    
    
  </ul>