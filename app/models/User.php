<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = ['username', 'password', 'email'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// For token
	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	// End of token.. 

	protected $rules = array
                    (
                        'username' => 'required',
                        'email' => 'required|email'
                    );

    public $error;

    public function isValid($data) {
    	$validator = Validator::make($data, $this->rules);

    	if( $validator->fails() ){
    		$this->error = $validator->messages();
    		return false;
    	}else{
    		return true;
    	}
    }


    // Example of Query scope 
    public function scopenotEqual($query, $id)
    {
    	return $query->where('id', '!=', $id);
    }

}
