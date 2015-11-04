<?php 

class Client extends Eloquent
{

	protected $table = 'client';
	protected $fillable = ["clientName", "status", "type"];

	public function status()
	{
		return $this->hasOne('Status', 'id');
	}
		
}