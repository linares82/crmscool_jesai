<?php namespace App\Http\Controllers;

use App\Adeudo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File as Archi;

use App\HistoriaCliente;
use App\Cliente;
use App\Seguimiento;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\updateHistoriaCliente;
use App\Http\Requests\createHistoriaCliente;
use App\Inscripcion;
use Illuminate\Support\Facades\DB;

class HistoriaClientesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$historiaClientes = HistoriaCliente::getAllData($request);

		return view('historiaClientes.index', compact('historiaClientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request )
	{
                $data=$request->all();
				$cliente=$data['cliente'];
				$inscripcions=Inscripcion::select(DB::raw('inscripcions.id, concat(p.cve_plantel," / ",e.name," / ",n.name," / ",g.name," / ",gru.name," / ",l.name," / ",pe.name) as inscripcion'))
				->join('plantels as p','p.id','=','inscripcions.plantel_id')
				->join('especialidads as e','e.id','=','inscripcions.especialidad_id')
				->join('nivels as n','n.id','=','inscripcions.nivel_id')
				->join('grados as g','g.id','=','inscripcions.grado_id')
				->join('grupos as gru','gru.id','=','inscripcions.grupo_id')
				->join('lectivos as l', 'l.id', '=', 'inscripcions.lectivo_id')
				->join('periodo_estudios as pe', 'pe.id', '=', 'inscripcions.periodo_estudio_id')
				->where('cliente_id', $data['cliente'])
				->where('st_inscripcion_id', '<>',3)
				->whereNull('inscripcions.deleted_at')
				->pluck('inscripcion', 'id');
				//dd($inscripcions);
		return view('historiaClientes.create', compact('cliente','inscripcions'))
			->with( 'list', HistoriaCliente::getListFromAllRelationApps() );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(createHistoriaCliente $request)
	{

		$input = $request->all();
		$input['usu_alta_id']=Auth::user()->id;
		$input['usu_mod_id']=Auth::user()->id;

                $r=$request->hasFile('archivo_file');
                //dd($r);
		if($r){
			$archivo_file = $request->file('archivo_file');
			$input['archivo'] = $archivo_file->getClientOriginalName();
		}
                
		//create data
		$e=HistoriaCliente::create( $input );
                //dd($e->toArray());
                if($e->evento_cliente_id==4){
                    $cliente=Cliente::find($e->cliente_id);
                    $cliente->st_cliente_id=24;
                    $cliente->save();
                }elseif($e->evento_cliente_id==2){
					$inscripcion=Inscripcion::find($e->inscripcion_id);
					$inscripcion->st_inscripcion_id=3;
					$inscripcion->save();

					$adeudos=Adeudo::where('combinacion_cliente_id', $inscripcion->combinacion_cliente_id)
											  ->where('caja_id',0)
											  ->where('pagado_bnd',0)
											  ->get();
					foreach($adeudos as $adeudo){
						$adeudo->delete();
					}

					$inscripcions=Inscripcion::where('cliente_id',$e->cliente_id)->where('st_inscripcion_id','<>',3)->whereNull('deleted_at')->count();
					//dd($inscripcions);
					if($inscripcions==0){
						$cliente = Cliente::find($e->cliente_id);
						$cliente->st_cliente_id = 3;
						$cliente->save();

						$seguimiento = Seguimiento::where('cliente_id', $cliente->id)->first();
						$seguimiento->st_seguimiento_id = 6;
						$seguimiento->save();
					}

                    
                     //dd("echo");     
                }elseif($e->evento_cliente_id==6){
                    $cliente=Cliente::find($e->cliente_id);
                    $cliente->st_cliente_id=4;
                    $cliente->save();
                    
                    $seguimiento=Seguimiento::where('cliente_id',$cliente->id)->first();
                    $seguimiento->st_seguimiento_id=2;
                    $seguimiento->save();
                }

                if ( $e ){
                    $ruta=public_path()."/imagenes/historia_clientes/".$e->id."/";
                    if(!file_exists($ruta)){
                            Archi::makedirectory($ruta, 0777, true, true);
                    }
                    
                    if($request->file('archivo_file')){
				//Storage::disk('img_plantels')->put($input['logo'],  File::get($logo_file));
				$request->file('archivo_file')->move($ruta, $input['archivo']);
			}
                }
                
		return redirect()->route('clientes.indexEventos')->with('message', 'Registro Creado.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, HistoriaCliente $historiaCliente)
	{
		$historiaCliente=$historiaCliente->find($id);
		return view('historiaClientes.show', compact('historiaCliente'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, HistoriaCliente $historiaCliente)
	{
		$historiaCliente=$historiaCliente->find($id);
				$cliente=$historiaCliente->cliente_id;
		$inscripcions = Inscripcion::select(DB::raw('inscripcions.id, concat(p.cve_plantel," / ",e.name," / ",n.name," / ",g.name," / ",gru.name," / ",l.name," / ",pe.name) as inscripcion'))
			->join('plantels as p', 'p.id', '=', 'inscripcions.plantel_id')
			->join('especialidads as e', 'e.id', '=', 'inscripcions.especialidad_id')
			->join('nivels as n', 'n.id', '=', 'inscripcions.nivel_id')
			->join('grados as g', 'g.id', '=', 'inscripcions.grado_id')
			->join('grupos as gru', 'gru.id', '=', 'inscripcions.grupo_id')
			->join('lectivos as l', 'l.id', '=', 'inscripcions.lectivo_id')
			->join('periodo_estudios as pe', 'pe.id', '=', 'inscripcions.periodo_estudio_id')
			->where('cliente_id', $historiaCliente->cliente_id)
			->whereNull('inscripcions.deleted_at')
			->pluck('inscripcion', 'id');
		return view('historiaClientes.edit', compact('historiaCliente','cliente','inscripcions'))
			->with( 'list', HistoriaCliente::getListFromAllRelationApps() );
	}

	/**
	 * Show the form for duplicatting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function duplicate($id, HistoriaCliente $historiaCliente)
	{
		$historiaCliente=$historiaCliente->find($id);
		return view('historiaClientes.duplicate', compact('historiaCliente'))
			->with( 'list', HistoriaCliente::getListFromAllRelationApps() );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update($id, HistoriaCliente $historiaCliente, updateHistoriaCliente $request)
	{
		$input = $request->all();
		$input['usu_mod_id']=Auth::user()->id;
                
                $r=$request->hasFile('archivo_file');
                //dd($input);
		if($r){
			$archivo_file = $request->file('archivo_file');
			$input['archivo'] = $archivo_file->getClientOriginalName();
		}
                
		//update data
		$historiaCliente=$historiaCliente->find($id);
		$historiaCliente->update( $input );
                
                $e=$historiaCliente;
                
                if($e->evento_cliente_id==4){
                    $cliente=Cliente::find($e->cliente_id);
                    $cliente->st_cliente_id=24;
                    $cliente->save();
                }elseif($e->evento_cliente_id==2){
                    $cliente=Cliente::find($e->cliente_id);
                    $cliente->st_cliente_id=3;
                    $cliente->save();
                }
                
                if ( $e ){
                    $ruta=public_path()."/imagenes/historia_clientes/".$e->id."/";
                    
                    if(!file_exists($ruta)){
                            Archi::makedirectory($ruta, 0777, true, true);
                    }
                    
                    if($request->file('archivo_file')){
				//Storage::disk('img_plantels')->put($input['logo'],  File::get($logo_file));
				$request->file('archivo_file')->move($ruta, $input['archivo']);
			}
                }
                
		return redirect()->route('historiaClientes.index',array('q[cliente_id_lt]'=>$historiaCliente->cliente_id))->with('message', 'Registro Actualizado.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,HistoriaCliente $historiaCliente)
	{
		$historiaCliente=$historiaCliente->find($id);
                $cliente=$historiaCliente->cliente_id;
		$historiaCliente->delete();

		return redirect()->route('historiaClientes.index',array('q[cliente_id_lt]'=>$cliente))->with('message', 'Registro Borrado.');
	}

}
