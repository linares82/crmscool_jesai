<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PromoPlanLn;
use App\PlanPagoLn;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\updatePromoPlanLn;
use App\Http\Requests\createPromoPlanLn;

class PromoPlanLnsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$promoPlanLns = PromoPlanLn::getAllData($request);

		return view('promoPlanLns.index', compact('promoPlanLns'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('promoPlanLns.create')
			->with( 'list', PromoPlanLn::getListFromAllRelationApps() );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(createPromoPlanLn $request)
	{

		$input = $request->all();
		$input['usu_alta_id']=Auth::user()->id;
		$input['usu_mod_id']=Auth::user()->id;

		//create data
		PromoPlanLn::create( $input );
                echo json_encode(array('msj'=>'success'));
		//return redirect()->route('promoPlanLns.index')->with('message', 'Registro Creado.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, PromoPlanLn $promoPlanLn)
	{
		$promoPlanLn=$promoPlanLn->find($id);
		return view('promoPlanLns.show', compact('promoPlanLn'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, PromoPlanLn $promoPlanLn)
	{
		$promoPlanLn=$promoPlanLn->find($id);
		return view('promoPlanLns.edit', compact('promoPlanLn'))
			->with( 'list', PromoPlanLn::getListFromAllRelationApps() );
	}

	/**
	 * Show the form for duplicatting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function duplicate($id, PromoPlanLn $promoPlanLn)
	{
		$promoPlanLn=$promoPlanLn->find($id);
		return view('promoPlanLns.duplicate', compact('promoPlanLn'))
			->with( 'list', PromoPlanLn::getListFromAllRelationApps() );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update($id, PromoPlanLn $promoPlanLn, updatePromoPlanLn $request)
	{
		$input = $request->all();
		$input['usu_mod_id']=Auth::user()->id;
		//update data
		$promoPlanLn=$promoPlanLn->find($id);
		$promoPlanLn->update( $input );
                echo json_encode(array('msj'=>'success'));
		//return redirect()->route('promoPlanLns.index')->with('message', 'Registro Actualizado.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,PromoPlanLn $promoPlanLn)
	{
		$promoPlanLn=$promoPlanLn->find($id);
                $plan_pago_ln=PlanPagoLn::find($promoPlanLn->plan_pago_ln_id);
                
		$promoPlanLn->delete();

		return redirect()->route('planPagos.show',$plan_pago_ln->plan_pago_id)->with('message', 'Registro Borrado.');
	}

}
