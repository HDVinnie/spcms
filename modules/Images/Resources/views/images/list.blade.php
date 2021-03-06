@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
		<h1>{!! button('images') !!} Imagenes <small>Lista</small>

			@if(Auth::user()->isAdmin)
				<div class="pull-right">
					<a class="btn btn-sm btn-success" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo album</a>
				</div>
			@endif
		</h1>
@endsection

@section('content')
	
	<div class="box box-solid">
		@if($images->count())
			<div class="box-header">
				<h3 class="box-title">Imagenes de la web</h3>
				@if($rol=="admin")
					<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.imagenes.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
				@endif
			</div>

			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						@foreach($images as $image)
							<tr>
								<td><strong>{{$image->title}}</strong></td>
								<td>{{$image->description}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-warning" href="{{ route('admin.imagenes.edit', $image->id) }}"><i class="fa fa-edit"></i> Editar</a>
									<a class="btn btn-xs btn-primary" href="{{ route('admin.imagenes.show', $image->id) }}"><i class="fa fa-eye"></i> Ver</a>
									<form action="{{ route('admin.imagenes.destroy', $image->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
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
			<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.imagenes.create') }}"><i class="fa fa-plus"></i> Nueva Imagen</a>
		@endif
	</div>

@endsection