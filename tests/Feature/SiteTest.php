<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Carbon\Carbon;

class SiteTest extends TestCase
{

    public function testStore(){
        $response = $this->call('POST', 'api/sites', [
        	'food' => 'taco',
        	'info' => 'info',
        	'day' => Carbon::today(),
        	'start' => Carbon::now(),
        	'end' => Carbon::now(),
        	'location' => 'place',
        	//'user_id' => 1,
        	'votes_total' => 0,
        	'votes_true' => 0
        ]);

		var_dump( json_encode($response));

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testIndex(){
        $response = $this->call('GET', 'api/sites');
        var_dump( json_encode($response));
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShow(){
        $response = $this->call('GET', 'api/sites/2');
        var_dump( json_encode($response));
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDelete(){
        $response = $this->call('DELETE', 'api/sites/4');
        var_dump( json_encode($response));
        $this->assertEquals(200, $response->getStatusCode());
    }
}
