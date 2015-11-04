<?php 

class Type extends Eloquent
{
	protected $table = 'type';

	// ELOQUENT RELATIONSHIP
	public function client()
	{
		return $this->hasMany('Client', 'id');
	}
	// End of ELOQUENT RELATIONSHIP

}