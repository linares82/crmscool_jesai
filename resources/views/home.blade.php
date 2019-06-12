@extends('plantillas.admin_template')

@section('header')
@endsection

@section('content')

    <link rel="stylesheet" src="{{ asset ('/bower_components/AdminLTE/plugins/morris/morris.css') }}" />
<!--    <style type="text/css">
        #target {
			width: 600px;
			height: 400px;
		}
    </style>-->
    
        @permission('Wanalitica')
	<div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Analisis Gráfico global
                    </h3>
                </div>
                <div class="box-body">
                    Analitica de Vendedores <a href="{{route('seguimientos.analitica_actividadesf')}}" target="_blank">Ver</a><br/>
                    Graficas de avance por vendedor, especialidad y plantel <a href="{{route('widgets.metaXespecialidad')}}" target="_blank">Ver</a>
                </div>
            </div>
        </div>
        @endpermission
        
    @permission('repDireccion')
        
	<div class="form-group col-md-4 col-sm-4 col-xs-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Estatus Totales
                    </h3>
                </div>
                <div class="box-body">
                    <div id="estatus_totales" style="width: auto; height: auto;">
                    </div>
                    
                </div>
            </div>
        </div>
    
        <div class="form-group col-md-4 col-sm-4 col-xs-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Concretados Por Periodo Lectivo
                    </h3>
                </div>
                <div class="box-body">
                    <div id="estatus_concretados" style="width: auto; height: auto;">
                    </div>
                    @foreach($lectivoss as $l)
                        <a href="{{route('direccion.grfr', array('lectivo'=>$l->id))}}" class="btn btn-xs btn-primary">Análisis Concretados {{$l->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        
        
        @endpermission   
        
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-12" style='display: none'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Grafica de Estatus del Mes
                    </h3>
                </div>
                <div class="box-body">
                    
                        <div id="myfirstchart"></div>
                    
                </div>
            </div>
        </div>
        @permission('porcentaje_avance')
        <div class="form-group col-md-2 col-sm-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        % Avance hacia la meta: 
                        @if($avance<=75)
                            <div class="bg-red">Sigue esforzandote.</div>
                        @elseif($avance>75 and $avance<=90)
                            <div class="bg-yellow">Estas cada dia más cerca.</div>
                        @elseif($avance>90)
                            <div class="bg-green">Felicidades, aun falta un poco.</div>
                        @endif
                    </h4>
                </div>
                <div class="box-body">
                        <div id="velocimetro" style="height: 180px;"></div>
                </div>
            </div>
        </div>
        @endpermission
        @permission('avances_mes1')
        @if(count($fil)>0)
        <?php $i=0; ?>
        @foreach($fil as $f)
            <div class="form-group col-md-5 col-sm-5 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title" id=''>
                            CONCRETADOS
                        </h4>
                    </div>
                    <div class="box-body">    
                            <div id="barras_chart_{{$i}}" style="height: 238px;">
                            </div>

                    </div>     
                </div>
            </div>
            <?php $i++;?>
        @endforeach
        @endif
        <!--</div>-->
        
        @foreach($a_2 as $a)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <h1> {{$a[0]}} </h1>
                </span>
                <div class="info-box-content">
                     CONCRETADOS EN  {{ $a[1] }} <br/>
                    <!--<a href="{{ route('seguimientos.reporteSeguimientosXEmpleado', array('estatus'=>2)) }}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>-->
                    <a href="{{ route('clientes.index').'?q[s]=&q[clientes.nombre_cont]=&q[st_seguimiento_id_cont]=2&q[clientes.plantel_id_cont]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('plantel_id').
                                                        '&q[clientes.empleado_id_cont]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('id').
                                                        '&commit=Buscar' }}" 
                    class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
            </div>
        </div><!-- ./col -->
        @endforeach
        
        @endpermission
    </div>    
    <div class='row'>
        @permission('avances_mes2')
    
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        Estatus Totales:
                    </h4>
                </div>
                <div class="box-body">
                    <div id="barras_chart2" style="height: 240px;">
                    </div>     
                </div>
            </div>
        </div>
        @endpermission
        
        @permission('cifras')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="info-box" >
                <span class="info-box-icon bg-aqua">
                    <h1> {{$a_1}} </h1>
                </span>
                <div class="info-box-content" >
                    <h3><span class="info-box-text"> Pendientes totales </span></h3>
                    <!--<a href="{{ route('seguimientos.reporteSeguimientosXEmpleado', array('estatus'=>1)) }}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>-->
                    <a href="{{ route('clientes.index').'?q[s]=&q[clientes.nombre_cont]=&q[st_seguimiento_id_cont]=1'.
                                                        '&q[clientes.empleado_id_cont]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('id').
                                                        '&commit=Buscar' }}" 
                    class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>    
            </div>
            
        </div><!-- ./col -->
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="info-box">
                <span class="info-box-icon bg-yellow">
                    <h1> {{$a_4}} </h1>
                </span>
                <div class="info-box-content">
                    <h3><span class="info-box-text"> En proceso totales </span></h3>
                    <!--<a href="{{ route('seguimientos.reporteSeguimientosXEmpleado', array('estatus'=>4)) }}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>-->
                    <a href="{{ route('clientes.index').'?q[s]=&q[clientes.nombre_cont]=&q[st_seguimiento_id_cont]=4&'.
                                                        '&q[clientes.empleado_id_cont]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('id').
                                                        '&commit=Buscar' }}" 
                    class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
            </div>
        </div><!-- ./col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <h1> {{$a_3}} </h1>
                </span>
                <div class="info-box-content">
                    <h3><span class="info-box-text"> Rechazados totales </span></h3>
                    <!--<a href="{{ route('seguimientos.reporteSeguimientosXEmpleado', array('estatus'=>3)) }}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>-->
                    <a href="{{ route('clientes.index').'?q[s]=&q[clientes.nombre_cont]=&q[st_seguimiento_id_lt]=3'.
                                                        //DB::table('empleados')->where('user_id', Auth::user()->id)->value('plantel_id').
                                                        '&q[clientes.empleado_id_lt]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('id').
                                                        '&commit=Buscar' }}" 
                    class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div><!-- ./col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="info-box">
                <span class="info-box-icon bg-yellow">
                    <h1> {{$a_5}} </h1>
                </span>
                <div class="info-box-content">
                    <h3><span class="info-box-text"> En proceso totales </span></h3>
                    <!--<a href="{{ route('seguimientos.reporteSeguimientosXEmpleado', array('estatus'=>4)) }}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>-->
                    <a href="{{ route('clientes.index').'?q[s]=&q[clientes.nombre_cont]=&q[st_seguimiento_id_cont]=5&'.
                                                        '&q[clientes.empleado_id_cont]='.
                                                        DB::table('empleados')->where('user_id', Auth::user()->id)->value('id').
                                                        '&commit=Buscar' }}" 
                    class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
            </div>
        </div><!-- ./col -->
        @endpermission
    </div><!-- /.row -->
    
    
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Avisos del dia - Clientes
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table">
                        <table class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Asunto</th>
                                    <th>Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($avisos as $a)
                                <tr>
                                    <td>
                                    @if($a->dias_restantes<=0)
                                        <small class="label label-danger">
                                    @elseif($a->dias_restantes==1)
                                        <small class="label label-warning"> 
                                    @elseif($a->dias_restantes>=2)
                                        <small class="label label-success"> 
                                    @endif
                                        {{$a->fecha}}
                                    </small>
                                    </td>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->detalle}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('seguimientos.show', $a->cliente_id) }}"><i class="glyphicon glyphicon-edit"></i> Ver Seguimiento</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Avisos del dia - Empresas
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table">
                        <table class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Asunto</th>
                                    <th>Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($avisosEmpresas as $a)
                                <tr>
                                    <td>
                                    @if($a->dias_restantes<=0)
                                        <small class="label label-danger">
                                    @elseif($a->dias_restantes==1)
                                        <small class="label label-warning"> 
                                    @elseif($a->dias_restantes>=2)
                                        <small class="label label-success"> 
                                    @endif
                                        {{$a->fecha}}
                                    </small>
                                    </td>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->detalle}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('empresas.seguimiento', $a->empresa_id) }}"><i class="glyphicon glyphicon-edit"></i> Ver Seguimiento</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Avisos Generales
                    </h3>
                    <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body" >
                    <div class="table">
                        <table class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>De</th>
                                    <th>Asunto</th>
                                    <th><a href="{{route('avisoGrals.index')}}" class="btn btn-xs btn-info">Ver todos</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($avisos_generales as $ag)
                                <tr>
                                    <td>
                                        {{ $ag->usu_alta->name }}
                                    </td>
                                    <td>
                                        {{$ag->avisoGral->desc_corta}}
                                    </td>
                                    <td>
                                    <input type="button" class="btn btn-xs btn-success" value="Ver" onclick="DetalleAviso('{{ $ag->aviso_gral_id }}')" />
                                    <a href="{{route('pivotAvisoGralEmpleados.leido', $ag->id)}}" class="btn btn-xs btn-warning">leido</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Comentarios de becas
                    </h3>
                    <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body" >
                    <div class="table">
                        <table class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Solicitud</th>
                                    <th>Comentario</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($becas as $beca)
                                <tr>
                                    <td>
                                        {{ $beca->nombre." ".$beca->nombre2." ".$beca->ape_paterno." ".$beca->ape_materno }}
                                    </td>
                                    <td>
                                        {{$beca->solicitud}}
                                    </td>
                                    <td>
                                        {{$beca->comentario}}
                                    </td>
                                    <td>
                                        {{$beca->created_at}}
                                    </td>
                                    <td>
                                    <a class="btn btn-xs bg-purple" href="{{ route('autorizacionBecas.findByClienteId', array('cliente_id'=>$beca->cliente)) }}">
                                        <i class="fa fa-eye"></i> S. Becas
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @permission('WgaugesXplantel')
        @foreach($gauge as $grf)
        <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        {{$grf['razon']}}: 
                    </h4>
                </div>
                <div class="box-body">
                        <div id="velocimetro_{{$grf['id']}}" ></div>
                        Meta del plantel: {{$grf['meta_total']}}
                        <br/>
                        Inscritos: {{$grf['avance']}}
                </div>
            </div>
        </div>
        @endforeach
        @endpermission
    </div>
    
    <div class="row">
        @permission('WStPlantelAsesor')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        
                    </h4>
                </div>
                <div class="box-body">
                    <div id="chart_div" style="width: auto; height: 300px;"></div>
                    <table class="table table-condensed table-striped">
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($tabla as $ln)
                                <?php $i++; ?>
                                @if($i==1)
                                <tr>
                                    <th>{{$ln[0]}}</th><th>{{$ln[1]}}</th><th>{{$ln[2]}}</th><th>{{$ln[3]}}</th><th>{{$ln[4]}}</th><th>{{$ln[5]}}</th><th>{{$ln[6]}}</th>
                                </tr> 
                                @else
                                <tr>
                                    <td>{{$ln[0]}}</td><td>{{$ln[1]}}</td><td>{{$ln[2]}}</td><td>{{$ln[3]}}</td><td>{{$ln[4]}}</td><td>{{$ln[5]}}</td><td>{{$ln[6]}}</td>
                                </tr>     
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        @endpermission
        @permission('WEstatusXplantel')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        Totales de Estatus del Plantel {{$plantel}}
                    </h4>
                </div>
                <div class="box-body">
                    @foreach($estatusPlantel as $ep)
                    @if($ep->estatus=='Pendiente') 
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua">
                          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">{{$ep->estatus}}</span>
                            <span class="info-box-number">{{$ep->total}}</span>
                            <div class="progress">
                              <div class="progress-bar" style="width: {{($ep->total*100)/$tsuma}}%"></div>
                            </div>
                            <span class="progress-description">
                              {{round(($ep->total*100)/$tsuma,2)}}% De un total de {{$tsuma}} 
                            </span>
                          </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    @elseif($ep->estatus=='Concretado') 
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">{{$ep->estatus}}</span>
                            <span class="info-box-number">{{$ep->total}}</span>
                            <div class="progress">
                              <div class="progress-bar" style="width: {{($ep->total*100)/$tsuma}}%"></div>
                            </div>
                            <span class="progress-description">
                              {{round(($ep->total*100)/$tsuma,2)}}% De un total de {{$tsuma}} 
                            </span>
                          </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    @elseif($ep->estatus=='Rechazado') 
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">{{$ep->estatus}}</span>
                            <span class="info-box-number">{{$ep->total}}</span>
                            <div class="progress">
                              <div class="progress-bar" style="width: {{($ep->total*100)/$tsuma}}%"></div>
                            </div>
                            <span class="progress-description">
                              {{round(($ep->total*100)/$tsuma,2)}}% De un total de {{$tsuma}} 
                            </span>
                          </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    @elseif($ep->estatus=='En proceso') 
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">{{$ep->estatus}}</span>
                            <span class="info-box-number">{{$ep->total}}</span>
                            <div class="progress">
                              <div class="progress-bar" style="width: {{($ep->total*100)/$tsuma}}%"></div>
                            </div>
                            <span class="progress-description">
                              {{round(($ep->total*100)/$tsuma,2)}}% De un total de {{$tsuma}} 
                            </span>
                          </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    @endif
                    @endforeach
            </div>
        </div>
        @endpermission
    </div>
    
    
@endsection
@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart','bar']});
      google.charts.setOnLoadCallback(drawVisualization);
      google.charts.setOnLoadCallback(drawgrfDir1);
      google.charts.setOnLoadCallback(drawgrfDir2);
      google.charts.setOnLoadCallback(drawgrfDir3);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable(<?php echo $datos_grafica; ?>);

        var options = {
          title : 'Concretado por periodo y Totales de estatus por Empleado del plantel {{$plantel}}',
          vAxis: {title: 'Cantidad de Clientes por Estatus'},
          hAxis: {title: 'Empleado'},
          seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    
    function drawgrfDir1() {
        // Some raw data (not necessarily accurate)
        var dataA = google.visualization.arrayToDataTable(<?php echo $grfDir1; ?>);

        var optionsA = {
          title : '',
          vAxis: {title: 'Cantidad Clientes Por Estatus'},
          hAxis: {title: 'Estatus'},
          seriesType: 'bars',
          series: {
                0:{color: 'red'},
          }
        };
        
        var chartA = new google.visualization.ComboChart(document.getElementById('estatus_totales'));
        chartA.draw(dataA, optionsA);
    }
    
    function drawgrfDir2() {
        // Some raw data (not necessarily accurate)
        var dataA = google.visualization.arrayToDataTable(<?php echo $grfDir2; ?>);

        var optionsA = {
          title : '',
          vAxis: {title: 'Cantidad Clientes Por Estatus'},
          hAxis: {title: 'Estatus'},
          seriesType: 'bars',
          series: {
                0:{color: 'orange'},
          }
        };
        
        var chartA = new google.visualization.ComboChart(document.getElementById('estatus_concretados'));
        chartA.draw(dataA, optionsA);
    }
    
    /*function drawgrfDir3() {
        // Some raw data (not necessarily accurate)
        var dataA = google.visualization.arrayToDataTable();

        var optionsA = {
          title : '',
          vAxis: {title: 'Cantidad Clientes Por Estatus'},
          hAxis: {title: 'Estatus'},
          seriesType: 'bars',
          series: {
                0:{color: 'purple'},
          }
        };
        
        var chartA = new google.visualization.ComboChart(document.getElementById('grfDir3'));
        chartA.draw(dataA, optionsA);
    }
    */
    </script>
    <script type="text/javascript" src="{{ asset ('/bower_components/AdminLTE/plugins/morris/morris.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('/bower_components/AdminLTE/plugins/morris/raphael-min.js') }}"></script>
    
    <script type="text/javascript">    
        google.charts.load('current', {'packages':['gauge','corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawVisualization2);
        @foreach($gauge as $grf)
            google.charts.setOnLoadCallback(drawChart_velocimetro{{$grf['id']}});
        @endforeach

        <?php $i=0; ?>
        @if(count($fil)>0)
            @foreach($fil as $f)
                var datos_{{$i}}=<?php echo json_encode($fil[$i]); ?>; 
                
                google.charts.setOnLoadCallback(drawVisualization_{{$i}});
                
                function drawVisualization_{{$i}}() {
                // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable(datos_{{$i}});

                    var options = {
                    title : 'Comparativo Concretados - Meta ',
                    vAxis: {title: 'Cantidad'},
                    hAxis: {title: 'Estatus'},
                    seriesType: 'bars',
                    //series: {0: {type: 'line'}}
                    
                    //colors: ['#5a81f1', '#2dca1d']
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('barras_chart_{{$i}}'));
                    //var chart = new google.charts.Bar(document.getElementById('barras_chart'));

                    chart.draw(data, options);
                }
                <?php $i++; ?>
            @endforeach
        @endif
        
        

        var datos2=<?php echo $datos2; ?>; 

        function drawVisualization2() {
                // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable(datos2);
            
            var options = {
            title : 'Estatus de seguimientos en el mes',
            vAxis: {title: 'Cantidad'},
            hAxis: {title: 'Estatus'},
            seriesType: 'bars',
            //series: {0: {type: 'line'}}

            colors: ['#FF8000']
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('barras_chart2'));
            //var chart = new google.charts.Bar(document.getElementById('barras_chart'));

            chart.draw(data, options);
        }
        

        //Gaugace Chart
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Concretados', {{ $avance[0] }}],
            ]);

            var options = {
            //width: 400, height: 250,
            greenFrom:90, greenTo: 100,
            yellowFrom:75, yellowTo: 90,
            redFrom: 0, redTo: 75,
            minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('velocimetro'));

            chart.draw(data, options);

        }//End Guagace Chart

        //Gaugace Chart
        @foreach($gauge as $grf)
        function drawChart_velocimetro{{$grf['id']}}() {
            var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Concretados', {{ $grf['p_avance'] }}],
            ]);

            var options = {
            //width: 400, height: 250,
            greenFrom:90, greenTo: 100,
            yellowFrom:75, yellowTo: 90,
            redFrom: 0, redTo: 75,
            minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('velocimetro_{{$grf["id"]}}'));

            chart.draw(data, options);

        }//End Guagace Chart
        @endforeach

        var popup;
        function DetalleAviso(id) {
            popup = window.open("{{url('avisoGrals/showModal')}}"+"?id="+id, "Popup", "width=800,height=350");
            popup.focus();
            return false
        }
        
        function analisisEstatus(){
            
        }
    </script>
@endpush
