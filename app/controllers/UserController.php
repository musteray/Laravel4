<?php 

class UserController extends BaseController {

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
    * Show the profile for the given user.
    */
     public function showProfile(){
        // Query in the database.
        $user = User::all();

        return View::make('user.profile', array('user' => $user));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){

        if( Auth::check() ){
            $userId = Auth::id();
            $data = $this->user->where('id', '!=', $userId)->get();
            // echo "<pre>";
            // dd($data);
            return View::make('user.profile', array('user' => $data ));
        }else{
            return View::make('user.login');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        //
        if( Auth::check() ){
            return View::make('user.create');
        }else{
            return Redirect::back();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        //
        if( !Auth::check() ){
            // Custom for required fields.
            if( empty(Input::get('username')) || empty(Input::get('password')) ){
                Session::flash('message', 'Please input your credentials.');
                return Redirect::to('api');
            }else{
                // dd(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))));
                if( Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))) ) 
                {
                    $id = Auth::id();
                    
                    return Redirect::to('crud');
                }else{
                    Session::flash('message', 'Invalid credentials.');
                    return Redirect::back();
                }
            }
        }else{

            if( !$this->user->isValid($input = Input::all()) ){
                return Redirect::back()->withInput()->withErrors($this->user->error);
            }else{
                $this->user->create($input);
                Session::flash('message', 'Successfully added user.');
                return Redirect::to("api");
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        //
        if( Auth::check() ){
            $users = User::find($id);

            return View::make("user.edit")->with('user', $users);
        }else{
            return Redirect::back();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id){
        //
        if( Auth::check() )
        {
            if( !$this->user->isValid(Input::all()) ){
                return Redirect::back()->withInput()->withErrors($this->user->error);
            }else{
                $user = $this->user->find($id);
                $user->username = Input::get('username');
                $user->password = Hash::make('admin');
                $user->email = Input::get('email');
                $user->save();
                Session::flash('message', 'Successfully edited user.');
                return Redirect::to("api");
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){

        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user.');
        return Redirect::to('api');
    }

    // Search...
    public function searchField(){

        $id = Auth::id();

                                // Scope query
        $searchUser = $this->user->notEqual($id)
                                // Advanced query in laravel 4
                                 ->where(function($query){
                                    $search = Input::get('search');
                                    $query->where('username', 'LIKE', '%'.$search.'%')
                                          ->orWhere('email', 'LIKE', '%'.$search.'%');
                                 })
                                 ->get();

        return View::make('user.profile')->with('user', $searchUser);
    }

    public function logOut(){

        Auth::logout();

        return Redirect::to('api');

    }

}