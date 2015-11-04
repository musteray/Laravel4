<?php 

class Client extends Eloquent
{

	protected $table = 'client';
	protected $fillable = ["clientName", "status", "type"];

	public function status()
	{
		return $this->belongsTo('Status', 'id');
	}

	public function type()
	{
		return $this->belongsTo('Type', 'id');
	}
		
}