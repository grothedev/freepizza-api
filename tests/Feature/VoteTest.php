<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Request;

class VoteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->call('POST', 'api/votes', [
        	'true' => True,
        	'site_id' => 3
        	
        ]);

		var_dump( json_encode($response));

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDupe(){
    	$response = $this->call('POST', 'api/votes', [
        	'true' => True,
        	'site_id' => 3
        	
        ]);

        $response2 = $this->call('POST', 'api/votes', [
        	'true' => True,
        	'site_id' => 3
        	
        ]);

        $response3 = $this->call('POST', 'api/votes', [
        	'true' => True,
        	'site_id' => 33
        	
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        var_dump(json_encode($response));
        $this->assertEquals(200, $response2->getStatusCode());
        var_dump(json_encode($response2));
        $this->assertEquals(200, $response3->getStatusCode());
    	var_dump(json_encode($response3));
    }
}
