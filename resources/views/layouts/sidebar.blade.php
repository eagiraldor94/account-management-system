<header>
	
	<!-- sidebar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <div class="sidebar">

    	<!-- sidebar-menu -->

		<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    	<!-- User panel -->

    		<li class="nav-item has-treeview" id="inicioTree">
            	<a href="/inicio" class="nav-link" id="inicio">
                  <img src="/Views/img/usuarios/anonymous.png" class="nav-icon" alt="User Image">
		            <p>
		              {{session('user')}}
		              <i class="right fa fa-angle-left"></i>
		            </p>
            	</a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link btnEditarMain" idUsuario="{{session('id')}}" data-toggle="modal" data-target="#modalEditarMain">
                  <i class="fa fa-key nav-icon"></i>
                  <p>Editar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/salir" class="nav-link">
                  <i class="fa fa-times-circle nav-icon"></i>
                  <p>Salir</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/usuarios" class="nav-link" id="usuarios">
              <i class="nav-icon fa fa-user-secret"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/servicios" class="nav-link" id="servicios">
              <i class="nav-icon fa fa-book"></i>
              <p>Servicios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/clientes" class="nav-link" id="clientes">
              <i class="nav-icon fa fa-user"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/suscripciones" class="nav-link" id="suscripciones">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>Suscripciones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/correos" class="nav-link" id="correos">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Correos</p>
            </a>
          </li>
        </ul>
      </nav>

    </div>

   
  </aside>
	
</header>