                <div class="form-group @if($errors->has('inscripcion_id')) has-error @endif">
                       <label for="inscripcion_id-field">Inscripcion_id</label>
                       {!! Form::text("inscripcion_id", null, array("class" => "form-control", "id" => "inscripcion_id-field")) !!}
                       @if($errors->has("inscripcion_id"))
                        <span class="help-block">{{ $errors->first("inscripcion_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cliente_id')) has-error @endif">
                       <label for="cliente_id-field">Cliente_id</label>
                       {!! Form::text("cliente_id", null, array("class" => "form-control", "id" => "cliente_id-field")) !!}
                       @if($errors->has("cliente_id"))
                        <span class="help-block">{{ $errors->first("cliente_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('plantel_id')) has-error @endif">
                       <label for="plantel_id-field">Plantel_id</label>
                       {!! Form::text("plantel_id", null, array("class" => "form-control", "id" => "plantel_id-field")) !!}
                       @if($errors->has("plantel_id"))
                        <span class="help-block">{{ $errors->first("plantel_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('especialidad_id')) has-error @endif">
                       <label for="especialidad_id-field">Especialidad_id</label>
                       {!! Form::text("especialidad_id", null, array("class" => "form-control", "id" => "especialidad_id-field")) !!}
                       @if($errors->has("especialidad_id"))
                        <span class="help-block">{{ $errors->first("especialidad_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nivel_id')) has-error @endif">
                       <label for="nivel_id-field">Nivel_id</label>
                       {!! Form::text("nivel_id", null, array("class" => "form-control", "id" => "nivel_id-field")) !!}
                       @if($errors->has("nivel_id"))
                        <span class="help-block">{{ $errors->first("nivel_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('turno_id')) has-error @endif">
                       <label for="turno_id-field">Turno_id</label>
                       {!! Form::text("turno_id", null, array("class" => "form-control", "id" => "turno_id-field")) !!}
                       @if($errors->has("turno_id"))
                        <span class="help-block">{{ $errors->first("turno_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lectivo_id')) has-error @endif">
                       <label for="lectivo_id-field">Lectivo_id</label>
                       {!! Form::text("lectivo_id", null, array("class" => "form-control", "id" => "lectivo_id-field")) !!}
                       @if($errors->has("lectivo_id"))
                        <span class="help-block">{{ $errors->first("lectivo_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('periodo_estudio_id')) has-error @endif">
                       <label for="periodo_estudio_id-field">Periodo_estudio_id</label>
                       {!! Form::text("periodo_estudio_id", null, array("class" => "form-control", "id" => "periodo_estudio_id-field")) !!}
                       @if($errors->has("periodo_estudio_id"))
                        <span class="help-block">{{ $errors->first("periodo_estudio_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('grado_id')) has-error @endif">
                       <label for="grado_id-field">Grado_id</label>
                       {!! Form::text("grado_id", null, array("class" => "form-control", "id" => "grado_id-field")) !!}
                       @if($errors->has("grado_id"))
                        <span class="help-block">{{ $errors->first("grado_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('grupo_id')) has-error @endif">
                       <label for="grupo_id-field">Grupo_id</label>
                       {!! Form::text("grupo_id", null, array("class" => "form-control", "id" => "grupo_id-field")) !!}
                       @if($errors->has("grupo_id"))
                        <span class="help-block">{{ $errors->first("grupo_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('token')) has-error @endif">
                       <label for="token-field">Token</label>
                       {!! Form::text("token", null, array("class" => "form-control", "id" => "token-field")) !!}
                       @if($errors->has("token"))
                        <span class="help-block">{{ $errors->first("token") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('usu_alta_id')) has-error @endif">
                       <label for="usu_alta_id-field">Usu_alta_id</label>
                       {!! Form::text("usu_alta_id", null, array("class" => "form-control", "id" => "usu_alta_id-field")) !!}
                       @if($errors->has("usu_alta_id"))
                        <span class="help-block">{{ $errors->first("usu_alta_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('usu_mod_id')) has-error @endif">
                       <label for="usu_mod_id-field">Usu_mod_id</label>
                       {!! Form::text("usu_mod_id", null, array("class" => "form-control", "id" => "usu_mod_id-field")) !!}
                       @if($errors->has("usu_mod_id"))
                        <span class="help-block">{{ $errors->first("usu_mod_id") }}</span>
                       @endif
                    </div>