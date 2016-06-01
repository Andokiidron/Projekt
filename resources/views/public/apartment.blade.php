@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

	@include('_messages')

	<div class="row">

		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.apartment_info')}}</div>
				<div class="panel-body">
					<strong>{{Lang::get('app.apartment_house_address')}}</strong> {{$apartment->house->address}} <br/>
					<strong>{{Lang::get('app.apartment_apartment_number')}}</strong> {{$apartment->number}} <br/>
					<strong>{{Lang::get('app.apartment_apartment_token')}}</strong> {{$apartment->token}} <br/>
				</div>
			</div>

		</div>












		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.apartment_readings_headline')}}</div>
				
					<div class="panel-body">
						<form action='{{URL::to("apartment/$apartment->token/reading")}}' method="POST" class="">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="row">

									<div class="form-group col-md-4">
										<label for="coldWaterLable">{{Lang::get('app.apartment_readings_cold_water')}}</label>
										<input type="text" name="cold_water" class="form-control" id="coldWaterLable" placeholder="{{Lang::get('app.apartment_readings_cold_water')}}">
									</div>
									<div class="form-group col-md-4">
										<label for="hotWaterLable">{{Lang::get('app.apartment_readings_hot_water')}}</label>
										<input type="text" name="hot_water" class="form-control" id="hotWaterLable" placeholder="{{Lang::get('app.apartment_readings_hot_water')}}">
									</div>
									<div class="form-group col-md-4">
										<label for="gasLable">{{Lang::get('app.apartment_readings_gas')}}</label>
										<input type="text" name="gas" class="form-control" id="gasLable" placeholder="{{Lang::get('app.apartment_readings_gas')}}">
									</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<button type="submit" class="btn btn-success">{{Lang::get('app.apartment_readings_btn')}}</button>
								</div>
							</div>
						</form>
					</div>

			</div>


		</div>

	</div>
</div>
@endsection
