<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacturaCotizacion extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\CotizacionCurso, 'no_coti' );  // generated by relation command - CotizacionCurso,FacturaCotizacion
		$this->addRelationApp( new \App\FormaPago, 'name' );  // generated by relation command - FormaPago,FacturaCotizacion
    } 

	//Mass Assignment
	protected $fillable = ['no_factura','fecha','monto','forma_pago_id','cotizacion_curso_id','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - CotizacionCurso,FacturaCotizacion - start
	public function cotizacionCurso() {
		return $this->belongsTo('App\CotizacionCurso');
	}// end

	// generated by relation command - FormaPago,FacturaCotizacion - start
	public function formaPago() {
		return $this->belongsTo('App\FormaPago');
	}// end
}