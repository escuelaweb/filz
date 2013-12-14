<?php
namespace Filz;

class File extends \Eloquent
{
	protected $table = 'files';

	public function users()
	{
		return $this->belongsToMany('User');
	}
}