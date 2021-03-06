@extends('plantillas.admin_template')

@include('impresionTickets._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('impresionTickets.index') }}">@yield('impresionTicketsAppTitle')</a></li>
	    <li><a href="{{ route('impresionTickets.show', $impresionTicket->id) }}">{{ $impresionTicket->id }}</a></li>
	    <li class="active">Editar</li>
	</ol>

    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> @yield('impresionTicketsAppTitle') / Editar {{$impresionTicket->id}}</h3>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($impresionTicket, array('route' => array('impresionTickets.update', $impresionTicket->id),'method' => 'post')) !!}

@include('impresionTickets._form')

                <div class="row">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('impresionTickets.index') }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection