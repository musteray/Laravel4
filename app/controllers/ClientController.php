<?php

class ClientController extends \BaseController {

	// Load all models..
	protected $client, $status, $type, $userlog, $user;

	public function __construct(Client $client, Status $status, Type $type, UserLog $userlog, User $user){
		$this->client  = $client;
		$this->status  = $status;
		$this->type    = $type;
		$this->userlog = $userlog;
		$this->user    = $user;
	}
	// End


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		if( Auth::check() ) 
		{
			$data = $this->client->get();

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
		if( Auth::check() ){
			$type;
			$status;

			foreach ($this->type->all() as $key => $value) {
				$type[$value->id] = $value->type;
			}

			foreach ($this->status->all() as $key => $value) {
				$status[$value->id] = $value->status;
			}

			return View::make('client.create', array('type' => $type, 'status' => $status));
		}else{
			return Redirect::to('api');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if( Auth::check() ){
			if( empty(Input::get('Name')) ){
				return "Failed bro!";
			}else{

				$client = new $this->client;
				$client->Name = Input::get('Name');
				$client->status = Input::get('status');
				$client->type = Input::get('type');
				$client->save();

				$log_id = Session::get('log_id');
				$user_id = Auth::id();

				$ulog = $this->userlog->find($log_id);
				$uName = $this->user->find($user_id);

				if( empty($ulog->purpose) ){
					$ulog->purpose = $uName->username." added client ".Input::get('Name')." and ";
				}else{
					$ulog->purpose = $ulog->purpose."added client ".Input::get('Name')." and ";				
				}

				$ulog->save();

				return Redirect::to('crud');
			}
		}else{
			return Redirect::to('api');
		}	
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
		if( Auth::check() ){
			$type;
			$status;

			foreach ($this->type->all() as $key => $value) {
				$type[$value->id] = $value->type;
			}

			foreach ($this->status->all() as $key => $value) {
				$status[$value->id] = $value->status;
			}

			return View::make('client.edit', array("type" => $type, "status" => $status, "client" => $this->client->find($id) ));
		}
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
		if( Auth::check() ){
			if( empty(Input::get('Name')) ){
				return "Failed bro!";
			}else{

				$newclient = $this->client->find($id);

				$log_id = Session::get('log_id');
				$user_id = Auth::id();

				$ulog = $this->userlog->find($log_id);
				$uName = $this->user->find($user_id);

				if( empty($ulog->purpose) ){
					$ulog->purpose = $uName->Name." edited client ".$newclient->Name." to ".Input::get('Name')." and ";
				}else{
					$ulog->purpose = $ulog->purpose."edited client ".$newclient->Name." to ".Input::get('Name')." and ";
				}

				$ulog->save();

				$newclient->Name = Input::get('Name');
				$newclient->status = Input::get('status');
				$newclient->type = Input::get('type');
				$newclient->save();

				return Redirect::to('crud');
			}
		}else{
			return Redirect::to('api');
		}
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
		if( Auth::check() ){
			$this->client->find($id)->delete();
			return Redirect::back();
		}else{
			return Redirect::to('api');
		}
	}


	public function searchData()
	{
		if( Auth::check() )
		{
			$search = Input::get("search");

			$data = $this->client
			->whereHas('status', function($q)
			{	
				$search = Input::get("search");
				return $q->where('status', 'LIKE', '%'.$search.'%');
			})->orWhereHas('type', function($q)
			{
				$search = Input::get("search");
				return $q->where('type', 'LIKE', '%'.$search.'%');
			})->orWhere('Name', 'LIKE', '%'.$search.'%')->get();

			return View::make('client.client')->with("data", $data);
		}
		else
		{
			return Redirect::to('api');
		}
	}


}
