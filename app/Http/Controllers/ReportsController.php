<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charge;
use App\Http\Controllers\Controller;
use App\Services\QueryParser;


class ReportsController extends Controller
{
	public function index()
	{
		$chargeModel = new Charge;
		$charges = $chargeModel->getDataForReport();

		return view('report', compact('charges'));
	}

	public function report($queryParams)
	{
		$parser = new QueryParser;
		$conditions = $parser->parse($queryParams)->convertToEloquent();
		$result = Charge::where($conditions)->get()->toArray();

		return json_encode($result);
	}
}