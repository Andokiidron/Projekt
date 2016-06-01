<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class HouseController extends Controller
{
	public function postHouse(Requests\PostHouseRequest $request)
	{
		$house = new \App\House;
			$house->address = $request->input('address');
		$house->save();
		
		$houseAdmin = new \App\UserHouse;
			$houseAdmin->house_id = $house->id;
			$houseAdmin->user_id = Auth::id();
		$houseAdmin->save();
		
		return redirect("house/$house->id");
	}
	
	
	public function getHouseId($house_id)
	{
		$house = \App\House::with(['apartments'])->findOrFail($house_id);
		
		return view('locked.house')->with('house', $house);
	}
	
	
	public function postApartment($house_id, Request $request)
	{
		// Kontroll, et mul õigus seda maja muuta
		$userhouse = \App\UserHouse::where('house_id',$house_id)->where('user_id',Auth::id())->firstOrFail();
		
		$new_token = $token_check = NULL;
		while ($new_token == $token_check) {
			$new_token = str_random(8);
			$token_check = \App\Apartment::where(DB::raw('BINARY `token`'),$new_token)->select('token')->first();
		}

		$apartment = New \App\Apartment;
			$apartment->house_id = $house_id;
			$apartment->number = $request->input('apartment_number');
			$apartment->token = $new_token;
		$apartment->save();

		return back();
	}
}
