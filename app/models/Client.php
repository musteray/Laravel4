<?php 

class Client extends Eloquent
{

	protected $table = 'client';
	public $timestamps = false;
	protected $fillable = ["clientName", "status", "type"];

	// ELOQUENT RELATIONSHIP
	public function status()
	{
		return $this->belongsTo('Status', 'status');
	}

	public function type()
	{
		return $this->belongsTo('Type', 'type');
	}
	// End of ELOQUENT RELATIONSHIP

}