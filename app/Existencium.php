<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Existencium extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\Articulo, 'name' );  // generated by relation command - Articulo,Existencium
		$this->addRelationApp( new \App\Plantel, 'razon' );  // generated by relation command - Plantel,Existencium
    } 

	//Mass Assignment
	protected $fillable = ['articulo_id','plantel_id','existencia','usu_alta_id','usu_mod_id'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - Articulo,Existencium - start
	public function articulo() {
		return $this->belongsTo('App\Articulo');
	}// end

	// generated by relation command - Plantel,Existencium - start
	public function plantel() {
		return $this->belongsTo('App\Plantel');
	}// end
}