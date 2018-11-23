<div class="box box-default box-solid">
                    <div class="box-header">
                        <h3 class="box-title">PLAN PAGOS</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group col-md-4 @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Plan Pago</label>
                       {!! Form::text("name", null, array("class" => "form-control", "id" => "name-field")) !!}
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('activo')) has-error @endif">
                       <label for="activo-field">Activo</label>
                       {!! Form::checkbox("activo", 1, null, [ "id" => "activo-field"]) !!}
                       @if($errors->has("activo"))
                        <span class="help-block">{{ $errors->first("activo") }}</span>
                       @endif
                    </div>
                   </div>
</div>


@if(isset($planPago->id) and count($planPago->lineas)==0)
<div class="box box-default box-solid">
                    <div class="box-header">
                        <h3 class="box-title">GENERAR PAGOS</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group col-md-4 @if($errors->has('name')) has-error @endif">
                       <label for="incripcion-field">Monto Inscripcion $</label>
                       {!! Form::text("inscripcion", null, array("class" => "form-control", "id" => "inscripcion-field")) !!}
                       @if($errors->has("inscripcion"))
                        <span class="help-block">{{ $errors->first("inscripcion") }}</span>
                       @endif
                    </div>
                        
                    <div class="form-group col-md-4 @if($errors->has('uniforme')) has-error @endif">
                       <label for="uniforme-field">Monto Uniforme $</label>
                       {!! Form::text("uniforme", null, array("class" => "form-control", "id" => "uniforme-field")) !!}
                       @if($errors->has("uniforme"))
                        <span class="help-block">{{ $errors->first("uniforme") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group col-md-4 @if($errors->has('tramites')) has-error @endif">
                       <label for="tramites-field">Monto Tramites Administrativo $</label>
                       {!! Form::text("tramites", null, array("class" => "form-control", "id" => "tramites-field")) !!}
                       @if($errors->has("tramites"))
                        <span class="help-block">{{ $errors->first("tramites") }}</span>
                       @endif
                    </div>
                        
                    <div class="form-group col-md-4 @if($errors->has('mensualidad')) has-error @endif">
                       <label for="mensualidad-field">Monto Mensualidad $</label>
                       {!! Form::text("mensualidad", null, array("class" => "form-control", "id" => "mensualidad-field")) !!}
                       @if($errors->has("mensualidad"))
                        <span class="help-block">{{ $errors->first("mensualidad") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group col-md-4 @if($errors->has('cuantas_mensualidad')) has-error @endif">
                       <label for="cuantas_mensualidad-field">Cuantas Mensualidades </label>
                       {!! Form::number("cuantas_mensualidad", null, array("class" => "form-control", "id" => "cuantas_mensualidad-field", "min"=>"1", "max"=>"31")) !!}
                       @if($errors->has("cuantas_mensualidad"))
                        <span class="help-block">{{ $errors->first("cuantas_mensualidad") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group col-md-4 @if($errors->has('fecha_pago')) has-error @endif">
                            <label for="fecha_pago-field">Dia Pago Mensualidad</label>
                            {!! Form::text("fecha_pago", null, array("class" => "form-control", "id" => "fecha_pago-field")) !!}
                            @if($errors->has("fecha_pago"))
                            <span class="help-block">{{ $errors->first("fecha_pago") }}</span>
                            @endif
                    </div>
                    
                    <div class="form-group col-md-4 @if($errors->has('seguro')) has-error @endif">
                       <label for="seguro-field">Monto Seguro $</label>
                       {!! Form::text("seguro", null, array("class" => "form-control", "id" => "seguro-field")) !!}
                       @if($errors->has("seguro"))
                        <span class="help-block">{{ $errors->first("seguro") }}</span>
                       @endif
                    </div>
                    
                    
                        
                   </div>
</div>
@endif

@push('scripts')
<script type="text/javascript">
                        $(document).ready(function() {
                            $('#fecha_pago-field').Zebra_DatePicker({
                        days:['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                                months:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                readonly_element: false,
                                lang_clear_date: 'Limpiar',
                                show_select_today: 'Hoy',
                        });
                    });
</script>
@endpush