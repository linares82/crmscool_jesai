<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsistenciasC extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\Plantel, 'razon' );  // generated by relation command - Empleado,AsistenciasC
                $this->addRelationApp( new \App\Empleado, 'nombre' );  // generated by relation command - Empleado,AsistenciasC
		$this->addRelationApp( new \App\Grupo, 'name' );  // generated by relation command - Grupo,AsistenciasC
                $this->addRelationApp( new \App\Materium, 'name' );  // generated by relation command - Grupo,AsistenciasC
                $this->addRelationApp( new \App\Lectivo, 'name' );  // generated by relation command - Grupo,AsistenciasC
    } 

	//Mass Assignment
	protected $fillable = ['plantel_id','empleado_id','materia_id','grupo_id', 'lectivo_id','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	public function plantel() {
		return $this->belongsTo('App\Plantel');
	}// end
        // generated by relation command - Empleado,AsistenciasC - start
	public function empleado() {
		return $this->belongsTo('App\Empleado');
	}// end

	// generated by relation command - Grupo,AsistenciasC - start
	public function grupo() {
		return $this->belongsTo('App\Grupo');
	}// end
        
        public function materia() {
		return $this->belongsTo('App\Materium');
	}// end
        
        public function lectivo() {
		return $this->belongsTo('App\Lectivo');
	}// end
}