<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrape extends Model {

    public function run() 
    {
        return $this->belongsTo('App\Run');
    }

    public function source() 
    {
        return $this->belongsTo('App\Source');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

}
