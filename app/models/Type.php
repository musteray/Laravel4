<?php 

class Type extends Eloquent
{
	protected $table = 'type';

	public function client()
	{
		return $this->belongsTo('Client', 'type');
	}
	
}