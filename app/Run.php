<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model {

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function source()
    {
        return $this->belongsTo('App\Source');
    }

}
