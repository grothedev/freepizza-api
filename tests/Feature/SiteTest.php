<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Carbon\Carbon;

class SiteTest extends TestCase
{
    public function testStore()
    {
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

		var_dump($response);

        $this->assertEquals(200, $response->getStatusCode());
        
    }
}
