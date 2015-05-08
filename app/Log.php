<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

	public function scrape()
    {
        return $this->belongsTo('App\Scrape');
    }

}
