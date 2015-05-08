<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model {

    public function scrapes()
    {
        return $this->hasMany('App\Scrapes');
    }

}
