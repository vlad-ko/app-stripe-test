<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\ReportsController;

class ReportsControllerTest extends TestCase {

    public function testBasicReport() {

       $result =  $this->call('GET', '/report/from[gt]2014-03-05&to[lte]2014-06-0');
       $this->assertNotEmpty($result);


    }

}