<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class DashboardController extends Controller
{
	
	public function getDashboard()
	{
		$houses = \App\User::where('id', Auth::id())->with(['houses'])->first();
		return view('locked.dashboard')->with('houses',$houses->houses);
	}
}
