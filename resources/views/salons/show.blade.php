@extends('plantillas.admin_template')

@include('salons._common')

@section('header')

<ol class="breadcrumb">
	<li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li><a href="{{ route('salons.index') }}">@yield('salonsAppTitle')</a></li>
    <li class="active">{{ $salon->name }}</li>
</ol>

<div class="page-header">
        <h1>@yield('salonsAppTitle') / Mostrar {{$salon->id}}

            {!! Form::model($salon, array('route' => array('salons.destroy', $salon->id),'method' => 'delete', 'style' => 'display: inline;', 'onsubmit'=> "if(confirm('¿Borrar? Estas seguro?')) { return true } else {return false };")) !!}
                <div class="btn-group pull-right" role="group" aria-label="...">
                    @permission('salon.edit')
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('salons.edit', $salon->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    @endpermission
                    @permission('salon.destroy')
                    <button type="submit" class="btn btn-danger">Borrar <i class="glyphicon glyphicon-trash"></i><
                    /button>
                    @endpermission
                </div>
            {!! Form::close() !!}

        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group col-sm-4">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$salon->id}}</p>
                </div>
                <div class="form-group  col-sm-4">
                     <label for="name">SALON</label>
                     <p class="form-control-static">{{$salon->name}}</p>
                </div>
                    <div class="form-group  col-sm-4">
                     <label for="ubicacion">UBICACION</label>
                     <p class="form-control-static">{{$salon->ubicacion}}</p>
                </div>
                    <div class="form-group  col-sm-4">
                     <label for="usu_alta_id">PLANTEL</label>
                     <p class="form-control-static">{{$salon->plantel->razon}}</p>
                </div>
                    <div class="form-group  col-sm-4">
                     <label for="usu_alta_id">ALTA</label>
                     <p class="form-control-static">{{$salon->usu_alta->name}}</p>
                </div>
                    <div class="form-group  col-sm-4">
                     <label for="usu_mod_id">ULTIMA MODIFICACION</label>
                     <p class="form-control-static">{{$salon->usu_mod->name}}</p>
                </div>
            </form>

            <div class="row">
                </div>

            <a class="btn btn-link" href="{{ route('salons.index') }}"><i class="glyphicon glyphicon-backward"></i>  Regresar</a>

        </div>
    </div>

@endsection