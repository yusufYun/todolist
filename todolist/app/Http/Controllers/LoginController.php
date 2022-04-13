<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

	public function login(Request $request)
	{
		$params = $request->validate([
			'login' => ['required'],
			'password' => ['required']
		]);

		if (Auth::attempt($params))
		{
			if (Auth::user()->role->name == 'admin')
				return redirect('/admin');
			if (Auth::user()->is_blocked)
			{
				Auth::logout();
				return back()->withErrors(['error' => 'Sorry, your account is blocked!']);
			}

			return redirect('/');
		}

		return back()->withErrors(['error' => 'Bad login or password']);
	}

	public function registration(Request $request)
	{
		$params = $request->validate([
			'login' => ['required'],
			'password' => ['required'],
			'password2' => ['required'],
			'email' => ['required'],
			'username' => ['required']
		]);

		$user_values = [
			'name' => strip_tags($request->username),
			'login' => strip_tags($request->login),
			'password' => Hash::make($request->password),
			'email' => strip_tags($request->email),
			'role_id' => '2'];
		if ($request->password  == $request->password2)
		{
			$user = User::create($user_values);
			if (isset($user->id))
				return redirect('/');
			else
				return back()->withErrors(['error' => 'Registration failed! Try again']);
		}
		else
			return back()->withErrors(['error' => 'Password repeat not equal to password']);
	}

	public function logout(Request $request)
    {
		Auth::logout();
		return redirect('/');
	}
}