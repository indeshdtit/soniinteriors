<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Origination extends Model
{
    use SoftDeletes;

	public static function getNameById($origination_id)
	{
		$origination = self::select('origination_name')->find($origination_id);
		if ($origination)
		{
			return $origination->origination_name;
		}

		return '';
	}
}
