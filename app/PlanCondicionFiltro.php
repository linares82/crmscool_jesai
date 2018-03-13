<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanCondicionFiltro extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->addRelationApp( new \App\PlanCampoFiltro, 'campo');  // generated by relation command - Especialidad,Plantilla
        $this->addRelationApp( new \App\Plantilla, 'nombre');  // generated by relation command - Especialidad,Plantilla
    } 

	//Mass Assignment
	protected $fillable = ['plantilla_id','campo_id','signo_comparacion','valor_condicion','interpretacion','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end

        public function campo() {
		return $this->belongsTo('App\PlanCampoFiltro', 'plan_campo_filtro_id', 'id');
	}// end
        
        public function plantilla() {
		return $this->belongsTo('App\Plantilla');
	}// end

    protected $dates = ['deleted_at'];
}