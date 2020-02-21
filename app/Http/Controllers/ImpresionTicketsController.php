<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ImpresionTicket;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\updateImpresionTicket;
use App\Http\Requests\createImpresionTicket;

class ImpresionTicketsController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$impresionTickets = ImpresionTicket::getAllData($request);

		return view('impresionTickets.index', compact('impresionTickets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('impresionTickets.create')
			->with('list', ImpresionTicket::getListFromAllRelationApps());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(createImpresionTicket $request)
	{

		$input = $request->all();
		$input['usu_alta_id'] = Auth::user()->id;
		$input['usu_mod_id'] = Auth::user()->id;

		//create data
		ImpresionTicket::create($input);

		return redirect()->route('impresionTickets.index')->with('message', 'Registro Creado.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, ImpresionTicket $impresionTicket)
	{
		$impresionTicket = $impresionTicket->find($id);
		return view('impresionTickets.show', compact('impresionTicket'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, ImpresionTicket $impresionTicket)
	{
		$impresionTicket = $impresionTicket->find($id);
		return view('impresionTickets.edit', compact('impresionTicket'))
			->with('list', ImpresionTicket::getListFromAllRelationApps());
	}

	/**
	 * Show the form for duplicatting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function duplicate($id, ImpresionTicket $impresionTicket)
	{
		$impresionTicket = $impresionTicket->find($id);
		return view('impresionTickets.duplicate', compact('impresionTicket'))
			->with('list', ImpresionTicket::getListFromAllRelationApps());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update($id, ImpresionTicket $impresionTicket, updateImpresionTicket $request)
	{
		$input = $request->all();
		$input['usu_mod_id'] = Auth::user()->id;
		//update data
		$impresionTicket = $impresionTicket->find($id);
		$impresionTicket->update($input);

		return redirect()->route('impresionTickets.index')->with('message', 'Registro Actualizado.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, ImpresionTicket $impresionTicket)
	{
		$impresionTicket = $impresionTicket->find($id);
		$impresionTicket->delete();

		return redirect()->route('impresionTickets.index')->with('message', 'Registro Borrado.');
	}

	public function validarTicket()
	{
		return view('impresionTickets.reportes.validarTicket');
	}

	public function validarTicketR(Request $request)
	{
		$datos = $request->all();
		$registro = ImpresionTicket::where('toke_unico', $datos['token'])->first();

		return view('impresionTickets.reportes.validarTicket', compact('registro'));
	}
}
