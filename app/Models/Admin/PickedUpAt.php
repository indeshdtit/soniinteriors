<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickedUpAt extends Model
{
    use SoftDeletes;
    protected $table = "picked_up_at";
}
