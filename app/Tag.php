<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	public function sources()
	{
		return $this->belongsToMany('App\Source');
	}

	public function posts()
	{
		return $this->belongsToMany('App\Post');
	}


}
