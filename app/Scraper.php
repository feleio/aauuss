<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Scraper extends Model {

    public function sources()
    {
        return $this->hasMany('App\Source');
    }

}
