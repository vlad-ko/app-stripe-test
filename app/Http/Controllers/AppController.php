<?php

namespace App\Http\Controllers;

use App\Charge;
use App\Http\Controllers\Controller;
use Stripe;

class AppController extends Controller
{
	public function index()
	{
		$var_dump = Stripe::charges()->all();
		dd($var_dump);
	}
}