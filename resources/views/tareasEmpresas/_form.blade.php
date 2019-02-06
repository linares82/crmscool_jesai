                <div class="form-group @if($errors->has('empresa_id')) has-error @endif">
                       <label for="empresa_id-field">Empresa_razon_social</label>
                       {!! Form::select("empresa_id", $list["Empresa"], null, array("class" => "form-control", "id" => "empresa_id-field")) !!}
                       @if($errors->has("empresa_id"))
                        <span class="help-block">{{ $errors->first("empresa_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('empleado_id')) has-error @endif">
                       <label for="empleado_id-field">Empleado_nombre</label>
                       {!! Form::select("empleado_id", $list["Empleado"], null, array("class" => "form-control", "id" => "empleado_id-field")) !!}
                       @if($errors->has("empleado_id"))
                        <span class="help-block">{{ $errors->first("empleado_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('tarea_id')) has-error @endif">
                       <label for="tarea_id-field">Tarea_name</label>
                       {!! Form::select("tarea_id", $list["Tarea"], null, array("class" => "form-control", "id" => "tarea_id-field")) !!}
                       @if($errors->has("tarea_id"))
                        <span class="help-block">{{ $errors->first("tarea_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('asunto_id')) has-error @endif">
                       <label for="asunto_id-field">Asunto_name</label>
                       {!! Form::select("asunto_id", $list["Asunto"], null, array("class" => "form-control", "id" => "asunto_id-field")) !!}
                       @if($errors->has("asunto_id"))
                        <span class="help-block">{{ $errors->first("asunto_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('detalle')) has-error @endif">
                       <label for="detalle-field">Detalle</label>
                       {!! Form::text("detalle", null, array("class" => "form-control", "id" => "detalle-field")) !!}
                       @if($errors->has("detalle"))
                        <span class="help-block">{{ $errors->first("detalle") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('st_tarea_id')) has-error @endif">
                       <label for="st_tarea_id-field">St_tarea_name</label>
                       {!! Form::select("st_tarea_id", $list["StTarea"], null, array("class" => "form-control", "id" => "st_tarea_id-field")) !!}
                       @if($errors->has("st_tarea_id"))
                        <span class="help-block">{{ $errors->first("st_tarea_id") }}</span>
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