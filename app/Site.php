<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
    	'food', 'info', 'day', 'start', 'end', 'location', 'votes_total', 'votes_true'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function location(){
    	return $this->belongsTo('App\Location');
    }
}
