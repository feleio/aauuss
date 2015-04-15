<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	public function source()
	{
		return $this->belongsTo('App\Source');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

}
