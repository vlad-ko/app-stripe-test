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

    public function testUndeoverdFunc() 
    {
        $chargeModel = new Charge;
        $r = $chargeModel->uncoveredFunc();

        $this->assertEquals(true, $r);
    }

    public function testUndeoverdFunc() 
    {
        $chargeModel = new Charge;
        $r = $chargeModel->uncoveredFunc();

        $this->assertEquals(true, $r);
    }

    public function testComplexUncoveredFunction() 
    {
            $chargeModel = new Charge;
            $r = $chargeModel->complexUncoveredFunction(1);

            $this->assertEquals('happy', $r);
    }
}
