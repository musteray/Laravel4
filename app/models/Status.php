<?php 

class Status extends Eloquent
{
	protected $table = 'status';

	public function client()
	{
		 return $this->hasMany('Client', 'status');
	}
} 