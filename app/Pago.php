<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\Caja, 'id' );  // generated by relation command - Caja,Pago
		$this->addRelationApp( new \App\FormaPago, 'name' );  // generated by relation command - FormaPago,Pago
                $this->addRelationApp( new \App\CuentasEfectivo, 'name' );  // generated by relation command - FormaPago,Pago
    } 

	//Mass Assignment
	protected $fillable = ['caja_id','monto','fecha','forma_pago_id','referencia','usu_alta_id','usu_mod_id','consecutivo','cuenta_efectivo_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - Caja,Pago - start
	public function caja() {
		return $this->belongsTo('App\Caja');
	}// end

	// generated by relation command - FormaPago,Pago - start
	public function formaPago() {
		return $this->belongsTo('App\FormaPago');
	}// end
}