@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.imagenes.index') }}"><i class="fa fa-chevron-left"></i></a> Galerias 
		<small>Lista</small>

		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.galerias.create') }}"><i class="fa fa-plus"></i> Nueva galeria</a>
		</div>

	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if($galleries->count())
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Album</th>
								<th></th>
							</tr>
						</thead>
						@foreach($galleries as $gallery)
							<tr>
								<td><strong>{{$gallery->title}}</strong></td>
								<td>{{$gallery->description}}</td>
								<td>{{$gallery->album->title}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-warning" href="{{ route('admin.galerias.edit', $gallery->id) }}"><i class="fa fa-edit"></i> Editar</a>
									<a class="btn btn-xs btn-success" href="{{ route('admin.imagenes.create', ['gallery' => $gallery->id]) }}"><i class="fa fa-plus"></i> Agregar Imagen</a>
									
									@if(Auth::user()->role=="admin")
										<a class="btn btn-xs btn-primary" href="{{ route('admin.galerias.show', $gallery->id) }}"><i class="fa fa-eye"></i> Ver</a>
									@endif

									<form action="{{ route('admin.galerias.destroy', $gallery->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
									</form>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		@else
			<p class="text-center">Sin Elementos</p>
		@endif
	</div>

@endsection