<?php 

class Status extends Eloquent
{
	protected $table = 'status';

	// ELOQUENT RELATIONSHIP
	public function client()
	{
		 return $this->hasMany('Client', 'id');
	}
	// End of ELOQUENT RELATIONSHIP
	
} 