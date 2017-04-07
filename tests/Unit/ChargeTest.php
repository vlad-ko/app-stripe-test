<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Charge;

class ChargeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetDataForReport()
    {
        $chargeModel = new Charge;
        $chargeModel->getDataForReport();
    }
}
