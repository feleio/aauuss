<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model {

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

}
