<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use \App\Models\Admin\Order;

use Config;

use DB;



class DashboardController extends Controller

{

    public function index()

    {

		$data['page_title'] = 'Dashboard';

		$data['orders'] = $this->dashboard_orders();



    	return view('admin.dashboard', $data);

    }



        function dashboard_orders()

        {

    		$data['list'] = Order::where(array('status' => Config::get('constants.status.active')))

    										->limit(5)

    										->orderBy('id', 'DESC')

    										->get();



			$data['count']['total'] = Order::count();



    		$data['count']['today'] = Order::where(array('created_at' => Carbon::today()))

    		->count();



    		$data['count']['this_week'] = Order::where(array('created_at' => [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]))

    		->count();



    		$data['count']['this_month'] = Order::where(DB::raw('MONTH(created_at)'), Carbon::now()->month)

    		->count();



    		return $data;

        }

}

