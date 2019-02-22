<?php 

namespace App\Helpers;

use Session;

class Dtit {
	public static function flash($message, $class = 'info')
	{
		Session::flash('message', $message);
		Session::flash('alert-class', $class);

		return true;
	}
}