<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Route;
use Config;
use App\Helpers\Dtit;
use App\Models\Admin\User;

class UsersController extends Controller
{
    public function index()
    {
        $data['user_role'] = Route::current()->parameter('role');
        $data['list'] = User::list_all(array('role' => $data['user_role']));

        if ($data['user_role'] == Config::get('constants.user_role.franchisee'))
        {
            $data['page_title'] = 'Admins';
            return view('admin.users.franchisees.index', $data);
        }
        elseif ($data['user_role'] == Config::get('constants.user_role.user'))
        {
            $data['page_title'] = 'Users';
            return view('admin.users.index', $data);
        }

        abort(404);
    }

    public function add_user(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'status' => 'required'
            ]);

            $post_data = $request->post();
            $user = User::create([
                'name' => $post_data['name'],
                'email' => $post_data['email'],
                'status' => $post_data['status'],
                'password' => Hash::make($post_data['password']),
                'role' => Config::get('constants.user_role.franchisee')
            ]);

            Dtit::flash('User registered successfully.');
            return redirect()->route('admin_edit_user', $user->id);
        }

        $data['page_title'] = 'Add Franchisee';
        return view('admin.users.franchisees.add', $data);
    }

    public function edit_user(Request $request)
    {
        $data['user_details'] = User::findOrFail(Route::current()->parameter('id'));

        if ($data['user_details']['role'] == Config::get('constants.user_role.franchisee'))
        {
            $data['page_title'] = 'Edit Franchisee';
            return view('admin.users.franchisees.edit', $data);
        }
        elseif ($data['user_details']['role'] == Config::get('constants.user_role.user'))
        {
            $data['page_title'] = 'Edit User';
            return view('admin.users.edit', $data);
        }

        abort(404);
    }

    public function update_user(Request $request)
    {
        $id = Route::current()->parameter('id');

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $id,
            'status' => 'required'
        ]);

    	if(User::modify_user($id, $request->post(), 'update'))
		{
            Dtit::flash('User updated successfully.');
        }
        else
        {
            Dtit::flash('Error while updating user. Please try again.', 'danger');
        }

    	return redirect()->back();
    }

    public function delete_user(Request $request)
    {
        if(User::modify_user(Route::current()->parameter('id'), array(), 'delete'))
        {
            Dtit::flash('User deleted successfully.');
        }
        else
        {
            Dtit::flash('Error while deleting user. Please try again.', 'danger');
        }

    	return redirect()->back();
    }
}