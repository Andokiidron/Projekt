<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;

use App\Reminder;
use App\Apartment;
use App\ApartmentAdmin;
use App\Reading;
use App\Period;

class ApartmentController extends Controller {

	
	public function postSearch(Requests\PostSearchRequest $request)
	{
		$apartment = Apartment::where(DB::raw('BINARY `token`'), $request->input('search'))->first();
        
		return redirect("apartment/$apartment->token");
	}
	
	public function getApartment($apartment_token)
	{
		$apartment = Apartment::where(DB::raw('BINARY `token`'),$apartment_token)->with('house')->first();

		return view('public.apartment')->with('apartment',$apartment);
	}
	
	public function postReading($apartment_token, Requests\PostReadingRequest $request)
	{
		$apartment = Apartment::where(DB::raw('BINARY `token`'),$apartment_token)->firstOrFail();
		$apartment->cold_water = $request->input('cold_water');
		$apartment->hot_water = $request->input('hot_water');
		$apartment->gas = $request->input('gas');
		$apartment->save();

		return back();
	}

}