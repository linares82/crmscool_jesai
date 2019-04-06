@extends('plantillas.admin_template')

@include('cotizacionLns._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('cotizacionLns.index') }}">@yield('cotizacionLnsAppTitle')</a></li>
	    <li><a href="{{ route('cotizacionLns.show', $cotizacionLn->id) }}">{{ $cotizacionLn->id }}</a></li>
	    <li class="active">Editar</li>
	</ol>

    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> @yield('cotizacionLnsAppTitle') / Editar {{$cotizacionLn->id}}</h3>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($cotizacionLn, array('route' => array('cotizacionLns.update', $cotizacionLn->id),'method' => 'post')) !!}

@include('cotizacionLns._form')

                <div class="row">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('cotizacionLns.index') }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection