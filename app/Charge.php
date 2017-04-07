<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
	use \Stevebauman\EloquentTable\TableTrait;

	/**
	 * define constant string for
	 * various states
	 */
	const STATUS_SUCCESS = 'succeeded';
	const STATUS_PENDING = 'pending';
	const STATUS_FAILED = 'failed';

	/**
	 * skip these specific fields for DB storage
	 * filter out extra fields which will be in the related tables
	 * (inverse of $fillable)
	 */
	protected  $guarded = [
		'outcome',
		'refunds',
		'source',
		'metadata',
		'fraud_details'
	];

    /**
     * Get the outcome record associated with the charge.
     */
    public function outcome()
    {
        return $this->hasOne('App\Outcome');
    }

    /**
     * Get the refund record associated with the charge.
     */
    public function refund()
    {
        return $this->hasMany('App\Refund');
    }

    /**
     * Get data to populate the report table
     *
     * @return array data for the report
     */
    public function getDataForReport()
    {
    	$data = Charge::with('outcome')->get();
        return $data;
    }
}
