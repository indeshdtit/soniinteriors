<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickedUpAt extends Model
{
    use SoftDeletes;
    protected $table = "picked_up_at";

    public static function getNameById($pickup_id)
    {
    	$pickup = self::select('picked_up_at')->find($pickup_id);
    	if ($pickup)
    	{
    		return $pickup->picked_up_at;
    	}

    	return '';
    }
}
