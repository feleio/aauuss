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

    public function scraper()
    {
        return $this->belongsTo('App\Scraper');
    }

    public function scrapes()
    {
        return $this->hasMany('App\Scrapes');
    }

}
