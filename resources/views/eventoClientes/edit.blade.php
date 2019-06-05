@extends('plantillas.admin_template')

@include('eventoClientes._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('eventoClientes.index') }}">@yield('eventoClientesAppTitle')</a></li>
	    <li><a href="{{ route('eventoClientes.show', $eventoCliente->id) }}">{{ $eventoCliente->id }}</a></li>
	    <li class="active">Editar</li>
	</ol>

    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> @yield('eventoClientesAppTitle') / Editar {{$eventoCliente->id}}</h3>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($eventoCliente, array('route' => array('eventoClientes.update', $eventoCliente->id),'method' => 'post')) !!}

@include('eventoClientes._form')

                <div class="row">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('eventoClientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection