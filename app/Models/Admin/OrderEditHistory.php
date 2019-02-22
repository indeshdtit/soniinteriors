<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderEditHistory extends Model
{
    use SoftDeletes;

    protected $table = 'order_edit_history';

    public static function getOrderHistoryByOrderId($order_id)
    {
    	return self::where([
    		'order_id' => $order_id
    	])
    	->orderBy('id', 'DESC')
    	->get();
    }
}
