<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
    	'food', 'info', 'day', 'start', 'end', 'location'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function location(){
    	return $this->belongsTo('App\Location');
    }
}
