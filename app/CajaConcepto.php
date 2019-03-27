<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CajaConcepto extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    } 

	//Mass Assignment
	protected $fillable = ['name','monto','activo','bnd_aplicar_beca','usu_alta_id','usu_mod_id','bnd_mensualidad'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - CajaConcepto,PlanPagoLn - start
	public function planPagoLns() {
		return $this->hasMany('App\PlanPagoLn');
	}// end

	// generated by relation command - CajaConcepto,Adeudo - start
	public function adeudos() {
		return $this->hasMany('App\Adeudo');
	}// end

	// generated by relation command - CajaConcepto,CajaLn - start
	public function cajaLns() {
		return $this->hasMany('App\CajaLn');
	}// end
}