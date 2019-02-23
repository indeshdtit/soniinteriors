<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Hash;
use Route;
use Config;
use App\Helpers\Dtit;
use App\Models\Admin\Order;

class OrdersController extends Controller
{
    public function index()
    {        
        $data['page_title'] = 'Order List';
        $data['list'] = Order::list_all();

        return view('admin.orders.index', $data);
    }

    public function add_order(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $post_data = $request->post();
            $validator = $request->validate([
                'order_number' => 'required|unique:orders',
                'customer_name' => 'required',
                'is_partial_order' => 'required',
                'status' => 'required'
            ]);

            // $order_number = Config::get('constants.invoice_number');
            // $highest_order_number = Order::select('order_number')->orderBy('id', 'DESC')->first();
            // if ($highest_order_number)
            // {
            //     $order_number = $highest_order_number->order_number+1;
            // }

            $order = new Order();
            $order->order_number = $post_data['order_number'];
            $order->date_written = $post_data['date_written'] ? date('Y-m-d H:i:s', strtotime($post_data['date_written'])) : null;
            $order->customer_name = $post_data['customer_name'];
            $order->pulled_by = $post_data['pulled_by'];
            $order->origination_id = $post_data['origination_id'];
            $order->date_picked_up = $post_data['date_picked_up'] ? date('Y-m-d H:i:s', strtotime($post_data['date_picked_up'])) : null;
            $order->status = $post_data['status'];
            $order->order_picked_up_at = $post_data['order_picked_up_at'];
            $order->is_partial_order = $post_data['is_partial_order'];
            $order->shipped_by = $post_data['shipped_by'];
            $order->checked_by = $post_data['checked_by'];
            $order->notes = $post_data['notes'];
            if ($order->save())
            {
                if ($request->file('attachments'))
                {
                    \App\Models\Admin\OrderAttachment::upload_attachments($request->file('attachments'), $order->id);
                }

                Dtit::flash('Order added successfully.');
                return redirect()->route('admin_edit_order', $order->id);
            }
            else
            {
                Dtit::flash('Error while adding order. Please try again.', 'danger');
            }
        }

        $data['page_title'] = 'Add Order';
        $data['picked_up_at'] = \App\Models\Admin\PickedUpAt::get();
        $data['originations'] = \App\Models\Admin\Origination::get();

        return view('admin.orders.add', $data);
    }

    public function edit_order(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = $request->validate([
                'customer_name' => 'required',
                'is_partial_order' => 'required',
                'status' => 'required'
            ]);

        	if(Order::modify_order(Route::current()->parameter('order_id'), $request->post(), 'update'))
    		{
                if ($request->file('attachments'))
                {
                    \App\Models\Admin\OrderAttachment::upload_attachments($request->file('attachments'), Route::current()->parameter('order_id'));
                }

                Dtit::flash('Order updated successfully.');
            }
            else
            {
                Dtit::flash('Error while updating order. Please try again.', 'danger');
            }

        	return redirect()->back();
        }
        else
        {
            if (Route::current()->parameter('order_id'))
            {
                $data['order_details'] = Order::findOrFail(Route::current()->parameter('order_id'));
            }
            else
            {
                $data['order_details'] = Order::findByOrderNumber($request->input('receipt_number'));
            }

            $data['page_title'] = 'Edit Order';
            $data['picked_up_at'] = \App\Models\Admin\PickedUpAt::get();
            $data['originations'] = \App\Models\Admin\Origination::get();
            
            if ($data['order_details'])
            {
                $data['order_attachments'] = \App\Models\Admin\OrderAttachment::order_attachments($data['order_details']->id);
            }

            return view('admin.orders.edit', $data);
        }
    }

    public function delete_order(Request $request)
    {
        if(Order::modify_order(Route::current()->parameter('order_id'), array(), 'delete'))
        {
            Dtit::flash('Order deleted successfully.');
        }
        else
        {
            Dtit::flash('Error while deleting order. Please try again.', 'danger');
        }

    	return redirect()->back();
    }

    public function delete_attachment(Request $request)
    {
        return redirect()->back();
        // \App\Models\Admin\OrderAttachment::delete_attachment($request->post('attachment_id'));

        // echo json_encode([
        //     'status' => true,
        //     'msg' => 'Attachment deleted successfully'
        // ]);die();
    }

    public function order_edit_history(Request $request, $order_id)
    {
        $data['page_title'] = 'Order Edit History';
        $data['order_id'] = $order_id;
        $data['picked_up_at'] = \App\Models\Admin\PickedUpAt::get();
        $data['originations'] = \App\Models\Admin\Origination::get();
        $data['edit_history'] = \App\Models\Admin\OrderEditHistory::getOrderHistoryByOrderId($data['order_id']);
        
        return view('admin.orders.order_edit_history', $data);
    }

    public function download_receipt($order_id)
    {
        $order = Order::find($order_id);
        if ($order)
        {
            $order->order_picked_up_at = \App\Models\Admin\PickedUpAt::getNameById($order->order_picked_up_at);
            $order->origination_id = \App\Models\Admin\Origination::getNameById($order->origination_id);
            
            $pdf = PDF::loadView('admin.orders.receipt', compact('order'));

            return $pdf->download('receipt.pdf');
        }
    }
}