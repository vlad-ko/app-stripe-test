<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charge;
use App\Http\Controllers\Controller;
use App\Services\QueryParser;


class ReportsController extends Controller
{
	/**
	 * will be used to view the chages table
	 */
	public function index()
	{
		$chargeModel = new Charge;
		$charges = $chargeModel->getDataForReport();

		return view('report', compact('charges'));
	}

	/**
	 * Will be used to output data as JSON
	 * based on query string params
	 * @param  string $queryParams query to search charges table
	 * @return JSON             query results
	 */
	public function report($queryParams)
	{
		$parser = new QueryParser;
		$conditions = $parser->parse($queryParams)->convertToEloquent();
		$result = Charge::where($conditions)->get()->toArray();

		return json_encode($result);
	}
}