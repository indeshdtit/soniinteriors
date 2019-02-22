<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		if (Auth::check())
		{
			return redirect()->route('admin_dashboard');
		}

		if ($request->isMethod('post'))
		{
			$remember = is_null($request->post('remember')) ? false : true;
			$user = ['email' => $request->post('email'), 'password' => $request->post('password')];
			if (Auth::attempt($user, $remember))
			{
				return redirect()->route('admin_dashboard');
			}

			Auth::logout();

			Session::flash('message', 'Incorrect login credentials.'); 
			Session::flash('alert-class', 'danger');
			return redirect()->route('admin_login');
		}

		$data['page_title'] = 'Login';
		return view('admin.auth.login', $data);
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('admin_login');
	}
}