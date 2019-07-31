<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class VinculacionHora extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\Vinculacion, 'lugar_practica' );  // generated by relation command - Vinculacion,VinculacionHora
    } 

	//Mass Assignment
	protected $fillable = ['vinculacion_id','fec_inicio','fec_fin','horas','fv6','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - Vinculacion,VinculacionHora - start
	public function vinculacion() {
		return $this->belongsTo('App\Vinculacion');
	}// end
}