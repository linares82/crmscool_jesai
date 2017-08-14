<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAllDataTrait;
use App\Traits\RelationManagerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\ClienteCreated;
use App\Events\ClienteUpdating;

class Cliente extends Model
{
    use RelationManagerTrait,GetAllDataTrait;
    use SoftDeletes;

    protected $events = [
        'created' => ClienteCreated::class,
        'updating' => ClienteUpdating::class,
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
		$this->addRelationApp( new \App\StCliente, 'name' );  // generated by relation command - StCliente,Cliente
		$this->addRelationApp( new \App\Medio, 'name' );  // generated by relation command - Medio,Cliente
		$this->addRelationApp( new \App\Estado, 'name' );  // generated by relation command - Estado,Cliente
		$this->addRelationApp( new \App\Municipio, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Ofertum, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Empleado, 'nombre' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Nivel, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Grado, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Diplomado, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Subdiplomado, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Curso, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Subcurso, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Otro, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Subotro, 'name' );  // generated by relation command - Municipio,Cliente
		$this->addRelationApp( new \App\Especialidad, 'name' );  // generated by relation command - Especialidad,Cliente
		$this->addRelationApp( new \App\Plantel, 'razon' );  // generated by relation command - Especialidad,Cliente	
    } 

	//Mass Assignment
	protected $fillable = ['cve_cliente','nombre', 'nombre2', 'ape_paterno', 'ape_materno','fec_registro',
						  'tel_fijo','tel_cel','mail','calle','no_exterior','no_interior','colonia','cp',
						  'municipio_id','estado_id','st_cliente_id', 'especialidad_id','ofertum_id','medio_id',
						  'expo','otro_medio','empleado_id','promociones','promo_cel','promo_correo', 
						  'plantel_id', 'nivel_id','grado_id', 'curso_id', 'subcurso_id', 'diplomado_id', 
						  'subdiplomado_id', 'otro_id', 'subotro_id','usu_alta_id','usu_mod_id', 'matricula', 
						  'celular_confirmado', 'correo_confirmado'];

	public function usu_alta() {
		return $this->hasOne('App\User', 'id', 'usu_alta_id');
	}// end

	public function usu_mod() {
		return $this->hasOne('App\User', 'id', 'usu_mod_id');
	}// end


    protected $dates = ['deleted_at'];

	// generated by relation command - StCliente,Cliente - start
	public function stCliente() {
		return $this->belongsTo('App\StCliente');
	}// end

	// generated by relation command - Medio,Cliente - start
	public function medio() {
		return $this->belongsTo('App\Medio');
	}// end

	// generated by relation command - Estado,Cliente - start
	public function estado() {
		return $this->belongsTo('App\Estado');
	}// end

	// generated by relation command - Municipio,Cliente - start
	public function municipio() {
		return $this->belongsTo('App\Municipio');
	}// end

	public function oferta() {
		return $this->belongsTo('App\Ofertum', 'ofertum_id','id');
	}// end

	public function nivel() {
		return $this->belongsTo('App\Nivel');
	}// end
	public function grado() {
		return $this->belongsTo('App\Grado');
	}// end
	public function diplomado() {
		return $this->belongsTo('App\Diplomado');
	}// end
	public function subdiplomado() {
		return $this->belongsTo('App\subdiplomado');
	}// end
	public function curso() {
		return $this->belongsTo('App\Curso');
	}// end
	public function subcurso() {
		return $this->belongsTo('App\Subcurso');
	}// end
	public function otro() {
		return $this->belongsTo('App\Otro');
	}// end
	public function subotro() {
		return $this->belongsTo('App\Subotro');
	}// end
	public function empleado() {
		return $this->belongsTo('App\Empleado');
	}// end
	public function plantel() {
		return $this->belongsTo('App\Plantel');
	}// end
	public function seguimiento()
    {
        return $this->hasOne('App\Seguimiento', 'cliente_id', 'id');
    }
	/*
	public function preguntas()
    {
        return $this->hasMany('App\PreguntaCliente', 'cliente_id', 'id');
    }*/

	// generated by relation command - Especialidad,Cliente - start
	public function especialidad() {
		return $this->belongsTo('App\Especialidad');
	}// end

	//Scopes
	public function scopePlantel($query)
    {
        return $query->where('plantel_id', '=', Empleado::find(Auth::user()->id)->plantel_id);
    }	
}