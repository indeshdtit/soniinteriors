<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;

class Order extends Model
{
	use SoftDeletes;

    public static function list_all()
    {
        return self::orderBy('id', 'DESC')->get();
    }

    public static function findByOrderNumber($order_number)
    {
    	return self::where([
            'order_number' => $order_number
        ])->first();
    }

    static function modify_order($id, $data, $action)
    {
        $order_detail = self::find($id);
        if($order_detail)
        {
            switch ($action)
            {
                case 'update':
                    $order_detail->date_written = $data['date_written'] ? date('Y-m-d H:i:s', strtotime($data['date_written'])) : null;
                    $order_detail->customer_name = $data['customer_name'];
                    $order_detail->pulled_by = $data['pulled_by'];
                    $order_detail->origination_id = $data['origination_id'];
                    $order_detail->date_picked_up = $data['date_picked_up'] ? date('Y-m-d H:i:s', strtotime($data['date_picked_up'])) : null;
                    $order_detail->status = $data['status'];
                    $order_detail->order_picked_up_at = $data['order_picked_up_at'];
                    $order_detail->is_partial_order = $data['is_partial_order'];
                    $order_detail->shipped_by = $data['shipped_by'];
                    $order_detail->checked_by = $data['checked_by'];
                    $order_detail->notes = $data['notes'];
                    break;

                case 'delete':
                    $order_detail->is_void = true;
                    break;

                case 'undelete':
                    $order_detail->is_void = false;
                    break;

                case 'permanent_delete':
                    $order_detail->deleted_at = date('Y-m-d H:i:s');
                    break;
                
                default:
                    # code...
                    break;
            }

            try
            {
                $to_be_changed = $order_detail->getDirty();
                if (sizeof($to_be_changed) > 0)
                {
                    //     $old_records = self::find($id);
                    //     $edit_history = new OrderEditHistory();
                    //     foreach ($to_be_changed as $key => $value)
                    //     {
                    //         $edit_history->$key = $old_records[$key];
                    //     }

                    //     $edit_history->order_id = $order_detail->id;
                    //     $edit_history->save();
                    
                    $edit_history = new OrderEditHistory();
                    $edit_history->order_id = $order_detail->id;
                    $edit_history->date_written = $order_detail->date_written;
                    $edit_history->customer_name = $order_detail->customer_name;
                    $edit_history->pulled_by = $order_detail->pulled_by;
                    $edit_history->origination_id = $order_detail->origination_id;
                    $edit_history->date_picked_up = $order_detail->date_picked_up;
                    $edit_history->status = $order_detail->status;
                    $edit_history->order_picked_up_at = $order_detail->order_picked_up_at;
                    $edit_history->is_partial_order = $order_detail->is_partial_order;
                    $edit_history->shipped_by = $order_detail->shipped_by;
                    $edit_history->checked_by = $order_detail->checked_by;
                    $edit_history->notes = $order_detail->notes;
                    $edit_history->created_at = date('Y-m-d H:i:s');
                    $edit_history->updated_at = date('Y-m-d H:i:s');
                    $edit_history->save();
                }

                $order_detail->updated_at = date('Y-m-d H:i:s');
                $order_detail->save();


                return true;
            }
            catch (\Exception $e)
            {
                #code...
            }
        }

        return false;
    }
}
