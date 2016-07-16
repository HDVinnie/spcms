<ul class="sidebar-menu">
	<li class="header">MENU</li>

	<li @yield('a-inicio')>  <a href="{{ URL::route('admin.inicio') }}">
		<i class="fa fa-cube"></i> <span>Inicio</span></a>
	</li>

	<li @yield('a-textos')>  <a href="{{ URL::route('admin.textos.index') }}">
		<i class="fa fa-file-text-o"></i> <span>Textos</span></a>
	</li>

	<li @yield('a-imagenes')><a href="{{ URL::route('admin.imagenes.index') }}">
		<i class="fa fa-image"></i> <span>Imágenes</span></a>
	</li>

	<li @yield('a-emails')>  <a href="{{ URL::route('admin.emails') }}">
		<i class="fa fa-envelope"></i> <span>Emails</span></a>
	</li>
	
	<li @yield('a-ayuda')>   <a href="{{ URL::route('admin.ayuda') }}">
		<i class="fa fa-info-circle"></i> <span>Soporte</span></a>
	</li>
</ul>
