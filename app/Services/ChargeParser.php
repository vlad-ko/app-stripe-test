<?php

namespace App\Services;

use App\Services\ChargeStorage;

/**
 * This service parses the Stripe API
 * response to store in MySQL
 */
class ChargeParser {

	const OUTCOMES_KEY = 'outcome';
	const REFUNDS_KEY = 'refunds';
	const SOURCE_KEY = 'source';
	const METADATA_KEY = 'metadata';
	const FRAUD_DETAILS_KEY = 'fraud_details';

	/**
	 * Initial function to start processing
	 * Stripe API response
	 *
	 * @param  array $charges Stripe API response
	 * @return bool
	 */
	public function process($charges)
	{
		foreach($charges['data'] as $response) {
			$this->processEachResponse($response);
		}
	}

	/**
	 * Process individual response array and prep
	 * for storage in MySQL
	 * @param  array $response individual charge response
	 * @return bool
	 */
	public function processEachResponse($response)
	{
		//substitue key "id" for "stripe_id"
		$response['stripe_id'] = $response['id'];
		unset($response['id']);

		$storage = new ChargeStorage;
		$storage->store($response);
	}

}