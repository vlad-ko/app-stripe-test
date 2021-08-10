<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{

	/**
	 * define constants and strings for
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
    	$data = Charge::with('outcome')->get()->toArray();
        return $data;
    }

    public function uncoveredFunc() {
		return true;
	}

    public function complexUncoveredFunction($param = null) {
        if ($param > 0) {
            $param ++;
        } else {
            $param = 1000 + 1;
        }

        switch($param) {
            case(4):
                echo 'not working';
            break;

            case(1001): 
                $param = "flags";
            break;
            
            default:
                return 'happy';

        }
    }

    public function anotherFunction() {
        if ($abc > 1) {
            $person = 'str' + 'str';
        }
    }   
}
