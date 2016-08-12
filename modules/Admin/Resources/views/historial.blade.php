@extends('admin::layouts.master')

@section('a-historial', 'class="active"')

@section('header')

	<h1>Administrador<small>Historial</small></h1>

@endsection


@section('content')

	<div class="jumbotron">
		<h1>Historial</h1>
		<p class="jumbotron-text">Desde este sistema de administración podrás modifica la pagina a tu gusto, tanto textos como imágenes. Recuerde que para ingresar nuevos textos a la pagina deberá contactar al administrador.</p>
		<p>
			<a class="btn btn-default btn-lg" href="{{ URL::route('admin.textos.index') }}" role="button"><i class="fa fa-file-text-o"></i> <span>Textos</span></a>
			<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-image"></i> <span>Imágenes</span></a>
		</p>
		<p class="jumbotron-text">Si necesitas ayuda puedes solicitarla desde la seccion de <a href="{{ URL::route('admin.ayuda') }}">soporte</a>.</p>
	</div>


@endsection