<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuestionarioRespuesta extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->addRelationApp( new \App\Cuestionario, 'name' );  // generated by relation command - Especialidad,Empresa
        $this->addRelationApp( new \App\CuestionarioPregunta, 'name' );  // generated by relation command - Especialidad,Empresa
    } 

	//Mass Assignment
	protected $fillable = ['cuestionario_id','cuestionario_pregunta_id','clave','name','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end

         // generated by relation command - Plantel,Empresa - start
	public function cuestionario() {
		return $this->belongsTo('App\Cuestionario');
	}// end
        
         // generated by relation command - Plantel,Empresa - start
	public function pregunta() {
		return $this->belongsTo('App\CuestionarioPregunta');
	}// end
        
    protected $dates = ['deleted_at'];
}