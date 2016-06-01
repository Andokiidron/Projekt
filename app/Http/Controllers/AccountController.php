<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller {

	
	public function getAccount()
	{
		return view('locked.account');
	}
	



	public function postAccount(Requests\PatchAccountRequest $request)
	{
		$user = User::find(Auth::id());
			$user->name = $request->input('name');
			if($request->has('password') AND $request->input('password') !== '')
			{
				$user->password = Hash::make($request->input('password'));
			}
		$user->save();

		Session::flash('success_message', 'Õnnestus!');
		return back();
	}

}
