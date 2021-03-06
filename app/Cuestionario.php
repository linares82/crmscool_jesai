<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuestionario extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->addRelationApp( new \App\StCuestionario, 'name' );  // generated by relation command - Especialidad,Empresa
    } 

	//Mass Assignment
	protected $fillable = ['st_cuestionario_id','name','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end

        public function preguntas()
        {
            return $this->hasMany('App\CuestionarioPregunta');
        }
        
    protected $dates = ['deleted_at'];

	// generated by relation command - StCuestionario,Cuestionario - start
	public function stCuestionario() {
		return $this->belongsTo('App\StCuestionario');
	}// end
}