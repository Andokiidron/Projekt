<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;

use App\User;
use App\Reminder as PasswordReminder;

class AuthController extends Controller {
	
	
	public function signup()
	{
		return view('public.signup');
	}
	

	

	public function postSignup(Requests\PostSignupRequest $request)
	{
		$user = new User;
			$user->name = $request->input('name');
			$user->email = $request->input('email');
			$user->password = Hash::make($request->input('password'));
		$user->save();

		Auth::login($user);

		return redirect('dashboard');
	}
	
	


	public function login()
	{
		return view('public.login');
	}
	

	

	public function postLogin(Requests\PostLoginRequest $request)
	{
		if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
		{
			return redirect('dashboard');
		}
		
		Session::flash('fail_message', 'Kasutaja nimi või parool valed.');
		return back();
	}
	


	
	public function reminder()
	{
		return view('public.reminder');
	}
	

	

	public function postReminder(Requests\PostReminderRequest $request)
	{
		$new_token = $token_check = NULL;
		while ($new_token == $token_check) {
			$new_token = str_random(30);
			$token_check = PasswordReminder::where('token',$new_token)->select('token')->first();
		}

		$reminder = new PasswordReminder;
			$reminder->email = $request->input('email');
			$reminder->token = $new_token;
		$reminder->save();

		/*
		Mail::queue('emails.password_reminder', array('token' => $new_token), function($message) use($reminder){
		    $message->from('akiidron@itcollege.ee', 'Ando');
		    $message->to($reminder->email)->subject('Parooli meeldetuletus');
		});
		*/
		
		Session::flash('success_message', 'Meeldetuletus saadetud!');
		return back();
	}
	


	
	public function password($token)
	{
		$expired = date('Y-m-d H:i:s', strtotime('-60 minutes', strtotime(date('Y-m-d H:i:s'))));
		$reminder = PasswordReminder::where('token',$token)->where('used',0)
			->where('created_at','>',$expired)->first();

		if(!isset($reminder->id))
		{
			Session::flash('fail_message', 'Ei ole kehtivat tokenit.');
			return redirect('/');
		}

		return view('public.password')->with('token',$token);
	}
	

	

	public function postPassword(Requests\PostPasswordRequest $request)
	{
		$expired = date('Y-m-d H:i:s', strtotime('-60 minutes', strtotime(date('Y-m-d H:i:s'))));
		$reminder = PasswordReminder::where('token',$request->input('reminder_token'))->where('used',0)
			->where('created_at','>',$expired)->firstOrFail();

		$user = User::where('email',$reminder->email)->firstOrFail();
			$user->password = Hash::make($request->input('password'));
		$user->save();

			$reminder->used = 1;
		$reminder->save();
		
		Auth::login($user);

		return redirect('dashboard');
	}
	



	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}

}
