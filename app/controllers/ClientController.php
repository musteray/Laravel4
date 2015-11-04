<?php

class ClientController extends \BaseController {

	protected $client;

	public function __construct(Client $client){
		$this->client = $client;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		if( Auth::check() ) 
		{
			$data = $this->client->with('status', 'type')->get();
			
			// $data = DB::table('client')
			// 		->join('status', 'client.status', '=', 'status.id')
			// 		->join('type', 'client.type', '=', 'type.id')
			// 		->select('client.id', 'client.Name', 'status.status', 'type.type')
			// 		->get();

			return View::make('client.client')->with("data", $data);
		}
		else
		{
			return Redirect::to('api');
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return "Hello";
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		return $id;
	}


	public function searchData()
	{
		if( Auth::check() )
		{
			$search = Input::get("search");

			$data = DB::table('client')
					->join('status', 'client.status', '=', 'status.id')
					->join('type', 'client.type', '=', 'type.id')
					->select('client.id', 'client.Name', 'status.status', 'type.type')
					->where('client.Name', 'LIKE', '%'.$search.'%')
					->orWhere('status.status', 'LIKE', '%'.$search.'%')
					->orWhere('type.type', 'LIKE', '%'.$search.'%')
					->get();

			return View::make('client.client')->with("data", $data);
		}
		else
		{
			return Redirect::to('api');
		}
	}


}
