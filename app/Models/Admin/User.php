<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;

class User extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function is_exist($id)
    {
        return User::find($id);
    }

    public static function list_all($filters=false)
    {
        $where_arr = array('role' => Config::get('constants.user_role.user'));
        if (sizeof($filters) > 0)
        {
            if (array_key_exists('role', $filters))
            {
                $where_arr['role'] = $filters['role'];
            }
        }

        return User::where($where_arr)->get();
    }

    static function modify_user($id, $data, $action)
    {
        $user_detail = User::find($id);
        if($user_detail)
        {
            switch ($action)
            {
                case 'update':
                    $user_detail->name = $data['name'];
                    $user_detail->email = $data['email'];
                    $user_detail->status = $data['status'];
                    break;

                case 'delete':
                    $user_detail->status = Config::get('constants.status.inactive');
                    $user_detail->deleted_at = date('Y-m-d H:i:s');
                    break;
                
                default:
                    # code...
                    break;
            }

            try
            {
                $user_detail->updated_at = date('Y-m-d H:i:s');
                $user_detail->save();

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
