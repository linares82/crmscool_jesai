@extends('plantillas.admin_template')

@include('interesEstudios._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('interesEstudios.index') }}">@yield('interesEstudiosAppTitle')</a></li>
	    <li><a href="{{ route('interesEstudios.show', $interesEstudio->id) }}">{{ $interesEstudio->id }}</a></li>
	    <li class="active">Editar</li>
	</ol>

    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> @yield('interesEstudiosAppTitle') / Editar {{$interesEstudio->id}}</h3>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($interesEstudio, array('route' => array('interesEstudios.update', $interesEstudio->id),'method' => 'post')) !!}

@include('interesEstudios._form')

                <div class="row">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('interesEstudios.index') }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection