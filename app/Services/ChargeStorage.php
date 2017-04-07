<?php

namespace App\Services;

use App\Charge;
use App\Outcome;
use App\Refund;
use DB;
use App\Services\ChargeParser;

/**
 * This service stores the response
 * from Stripe API in MySQL
 */
class ChargeStorage {

	/**
	 * Store response in corresponding tables
	 * charges, outcomes, refunds (other tables can be implemented
	 * to store more data)
	 * @param  array $response to store in DB
	 * @return bool
	 */
	public function store($response)
	{
		// let's use transaction here to make sure everything
		// is saved correctly
		DB::transaction(function () use ($response) {
    		//store charge
    		$newCharge = Charge::create($response);
    		$response[ChargeParser::OUTCOMES_KEY]['charge_id'] = $newCharge->id;
    		$response[ChargeParser::REFUNDS_KEY]['data']['charge_id'] = $newCharge->id;

    		//store outcome, refund with charge id
    		//there may be more "Eloquent" way to handle this, but I like
    		//to use transactions when saving a bunch of models.
    		$outcome = Outcome::create($response[ChargeParser::OUTCOMES_KEY]);
    		$refund = Refund::create($response[ChargeParser::REFUNDS_KEY]['data']);
		});
	}

}