<?php 

class Userlog extends Eloquent 
{
	public $timestamps = false;
	//protected $fillable = ['user_id', 'login', 'logout', 'purpose'];
    protected $table = 'user_log';
}