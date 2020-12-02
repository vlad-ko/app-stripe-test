<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\ReportsController;

class ReportsControllerTest extends TestCase {

    public function testBasicReport() {
        $this->action('GET', 'ReportsController@report');
    }

}