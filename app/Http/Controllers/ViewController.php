<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
	
	public function getIndex()
	{
		return view('public.homepage');
	}
	
}
