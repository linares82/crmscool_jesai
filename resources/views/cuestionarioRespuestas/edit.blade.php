@extends('plantillas.admin_template')

@include('cuestionarioRespuestas._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('cuestionarioRespuestas.index') }}">@yield('cuestionarioRespuestasAppTitle')</a></li>
	    <li><a href="{{ route('cuestionarioRespuestas.show', $cuestionarioRespuesta->id) }}">{{ $cuestionarioRespuesta->id }}</a></li>
	    <li class="active">Editar</li>
	</ol>

    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> @yield('cuestionarioRespuestasAppTitle') / Editar {{$cuestionarioRespuesta->id}}</h3>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($cuestionarioRespuesta, array('route' => array('cuestionarioRespuestas.update', $cuestionarioRespuesta->id),'method' => 'post')) !!}

@include('cuestionarioRespuestas._form')

                <div class="row">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('cuestionarios.show', $cuestionario) }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection