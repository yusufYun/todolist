<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function adminPanel()
	{
		$role = Role::where('name','=', 'admin')->get();
		$users = User::where('role_id','!=', $role[0]->id)->get();
		$content = view('users_list', ['users' => $users]);
		return view('admin_panel', ['content' => $content]);
	}

	public function deleteUser($id)
	{
		User::where('id', '=', $id)->delete();
		return redirect('/admin');
	}

	public function block($id)
	{
		$user = User::find($id);
		if (!$user->is_blocked)
		{
			$user->is_blocked = 1;
			$user->save();
		}
		return redirect('/admin');
	}

	public function unblock($id)
	{
		$user = User::find($id);
		if ($user->is_blocked)
		{
			$user->is_blocked = 0;
			$user->save();
		}
		return redirect('/admin');
	}

	public function userInfo($id)
	{
		$user = User::find($id);
		$content = view('user_info',['user' => $user]);
		return view('admin_panel', ['content' => $content]);
	}
}