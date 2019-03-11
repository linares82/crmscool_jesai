@extends('plantillas.admin_template')

@include('autorizacionBecaComentarios._common')

@section('header')

    <ol class="breadcrumb">
    	<li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
        <!--
        @if ( $query_params = Request::input('q') )

            <li class="active"><a href="{{ route('autorizacionBecaComentarios.index') }}">@yield('autorizacionBecaComentariosAppTitle')</a></li>
            <li class="active">condition(  

            @foreach( $query_params as $key => $value )
                @if (!$loop->first) / @endif {{ $key }} : {{ $value }}
            @endforeach
            )</li>
        @else
            <li class="active">@yield('autorizacionBecaComentariosAppTitle')</li>
        @endif
        -->
        <li class="active">@yield('autorizacionBecaComentariosAppTitle')</li>
    </ol>

    <div class="">
        <h3>
            <i class="glyphicon glyphicon-align-justify"></i> @yield('autorizacionBecaComentariosAppTitle')
            @permission('autorizacionBecaComentarios.create')
            <a class="btn btn-success pull-right" href="{{ route('autorizacionBecaComentarios.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear</a>
            @endpermission
        </h3>

    </div>

    <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
        <div class="panel panel-default">
            <div id="headingOne" role="tab" class="panel-heading">
                <h4 class="panel-title">
                <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" role="button">
                    <span aria-hidden="true" class="glyphicon glyphicon-search"></span> Buscar
                </a>
                </h4>
            </div>
            <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <form class="AutorizacionBecaComentario_search" id="search" action="{{ route('autorizacionBecaComentarios.index') }}" accept-charset="UTF-8" method="get">
                        <input type="hidden" name="q[s]" value="{{ @(Request::input('q')['s']) ?: '' }}" />
                        <div class="form-horizontal">

                            <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_autorizacion_becas.solicitud_gt">AUTORIZACION_BECA_SOLICITUD</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['autorizacion_becas.solicitud_gt']) ?: '' }}" name="q[autorizacion_becas.solicitud_gt]" id="q_autorizacion_becas.solicitud_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['autorizacion_becas.solicitud_lt']) ?: '' }}" name="q[autorizacion_becas.solicitud_lt]" id="q_autorizacion_becas.solicitud_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_autorizacion_becas.solicitud_cont">AUTORIZACION_BECA_SOLICITUD</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['autorizacion_becas.solicitud_cont']) ?: '' }}" name="q[autorizacion_becas.solicitud_cont]" id="q_autorizacion_becas.solicitud_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_comentario_gt">COMENTARIO</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['comentario_gt']) ?: '' }}" name="q[comentario_gt]" id="q_comentario_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['comentario_lt']) ?: '' }}" name="q[comentario_lt]" id="q_comentario_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_comentario_cont">COMENTARIO</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['comentario_cont']) ?: '' }}" name="q[comentario_cont]" id="q_comentario_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_monto_inscripcion_gt">MONTO_INSCRIPCION</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_inscripcion_gt']) ?: '' }}" name="q[monto_inscripcion_gt]" id="q_monto_inscripcion_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_inscripcion_lt']) ?: '' }}" name="q[monto_inscripcion_lt]" id="q_monto_inscripcion_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_monto_inscripcion_cont">MONTO_INSCRIPCION</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_inscripcion_cont']) ?: '' }}" name="q[monto_inscripcion_cont]" id="q_monto_inscripcion_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_monto_mensualidad_gt">MONTO_MENSUALIDAD</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_mensualidad_gt']) ?: '' }}" name="q[monto_mensualidad_gt]" id="q_monto_mensualidad_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_mensualidad_lt']) ?: '' }}" name="q[monto_mensualidad_lt]" id="q_monto_mensualidad_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_monto_mensualidad_cont">MONTO_MENSUALIDAD</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['monto_mensualidad_cont']) ?: '' }}" name="q[monto_mensualidad_cont]" id="q_monto_mensualidad_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_st_becas.name_gt">ST_BECA_NAME</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['st_becas.name_gt']) ?: '' }}" name="q[st_becas.name_gt]" id="q_st_becas.name_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['st_becas.name_lt']) ?: '' }}" name="q[st_becas.name_lt]" id="q_st_becas.name_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_st_becas.name_cont">ST_BECA_NAME</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['st_becas.name_cont']) ?: '' }}" name="q[st_becas.name_cont]" id="q_st_becas.name_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_usu_alta_id_gt">USU_ALTA_ID</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_alta_id_gt']) ?: '' }}" name="q[usu_alta_id_gt]" id="q_usu_alta_id_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_alta_id_lt']) ?: '' }}" name="q[usu_alta_id_lt]" id="q_usu_alta_id_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_usu_alta_id_cont">USU_ALTA_ID</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_alta_id_cont']) ?: '' }}" name="q[usu_alta_id_cont]" id="q_usu_alta_id_cont" />
                                </div>
                            </div>
                                                    <!--
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_usu_mod_id_gt">USU_MOD_ID</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_mod_id_gt']) ?: '' }}" name="q[usu_mod_id_gt]" id="q_usu_mod_id_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_mod_id_lt']) ?: '' }}" name="q[usu_mod_id_lt]" id="q_usu_mod_id_lt" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_usu_mod_id_cont">USU_MOD_ID</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['usu_mod_id_cont']) ?: '' }}" name="q[usu_mod_id_cont]" id="q_usu_mod_id_cont" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="commit" value="Buscar" class="btn btn-default btn-xs" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($autorizacionBecaComentarios->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>@include('plantillas.getOrderLink', ['column' => 'id', 'title' => 'ID'])</th>
                            <th>@include('CrudDscaffold::getOrderlink', ['column' => 'autorizacion_becas.solicitud', 'title' => 'AUTORIZACION_BECA_SOLICITUD'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'comentario', 'title' => 'COMENTARIO'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'monto_inscripcion', 'title' => 'MONTO_INSCRIPCION'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'monto_mensualidad', 'title' => 'MONTO_MENSUALIDAD'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'st_becas.name', 'title' => 'ST_BECA_NAME'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'usu_alta_id', 'title' => 'USU_ALTA_ID'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'usu_mod_id', 'title' => 'USU_MOD_ID'])</th>
                            <th class="text-right">OPCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($autorizacionBecaComentarios as $autorizacionBecaComentario)
                            <tr>
                                <td><a href="{{ route('autorizacionBecaComentarios.show', $autorizacionBecaComentario->id) }}">{{$autorizacionBecaComentario->id}}</a></td>
                                <td>{{$autorizacionBecaComentario->autorizacionBeca->solicitud}}</td>
                    <td>{{$autorizacionBecaComentario->comentario}}</td>
                    <td>{{$autorizacionBecaComentario->monto_inscripcion}}</td>
                    <td>{{$autorizacionBecaComentario->monto_mensualidad}}</td>
                    <td>{{$autorizacionBecaComentario->stBeca->name}}</td>
                    <td>{{$autorizacionBecaComentario->usu_alta_id}}</td>
                    <td>{{$autorizacionBecaComentario->usu_mod_id}}</td>
                                <td class="text-right">
                                    @permission('autorizacionBecaComentarios.edit')
                                    <a class="btn btn-xs btn-primary" href="{{ route('autorizacionBecaComentarios.duplicate', $autorizacionBecaComentario->id) }}"><i class="glyphicon glyphicon-duplicate"></i> Duplicate</a>
                                    @endpermission
                                    @permission('autorizacionBecaComentarios.edit')
                                    <a class="btn btn-xs btn-warning" href="{{ route('autorizacionBecaComentarios.edit', $autorizacionBecaComentario->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    @endpermission
                                    @permission('autorizacionBecaComentarios.destroy')
                                    {!! Form::model($autorizacionBecaComentario, array('route' => array('autorizacionBecaComentarios.destroy', $autorizacionBecaComentario->id),'method' => 'delete', 'style' => 'display: inline;', 'onsubmit'=> "if(confirm('¿Borrar? ¿Esta seguro?')) { return true } else {return false };")) !!}
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Borrar</button>
                                    {!! Form::close() !!}
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $autorizacionBecaComentarios->appends(Request::except('page'))->render() !!}
            @else
                <h3 class="text-center alert alert-info">Vacio!</h3>
            @endif

        </div>
    </div>

@endsection