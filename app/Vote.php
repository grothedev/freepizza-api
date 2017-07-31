<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
    	'site_id', 'ip', 'true'
    ];

    public function site(){
    	return $this->belongsTo('App\Site');
    } 
}
