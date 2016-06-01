@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

@include('_messages')

	<div class="row">

		<div class="col-md-3">

			<div class="panel panel-default">
				<div class="panel-body">
					<a href='{{URL::to("house")}}/{{$apartment->house->id}}' class="btn btn-success col-md-12">{{Lang::get('app.appartment_back_btn')}}</a>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.appartment_info')}}</div>
				<div class="panel-body">
					<strong>{{Lang::get('app.apartment_house_address')}}</strong> {{$apartment->house->address}} <br/>
					<strong>{{Lang::get('app.apartment_apartment_number')}}</strong> {{$apartment->apartment_number}} <br/>
					<strong>{{Lang::get('app.apartment_apartment_token')}}</strong> {{$apartment->token}} <br/><br/>

					<form action='/house/{{$apartment->house->id}}/apartment/{{$apartment->id}}' method="POST" class="form">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group">
							<label for="exampleInputPassword1">{{Lang::get('app.appartment_number')}}</label>
							<input type="text" name="apartment_number" class="form-control" value="{{$apartment->apartment_number}}" id="exampleInputEmail1" placeholder="{{Lang::get('app.appartment_info')}}">
						</div>
						<button type="submit" class="btn btn-success">{{Lang::get('app.appartment_info_btn')}}</button>
					</form>
				</div>
			</div>
		</div>












		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.apartment_readings_headline')}}</div>
				@if(date('j') >= $apartment->house->days_after AND date('j') <= (date('t') - $apartment->house->days_before))
					<div class="panel-body">
						<h4>{{Lang::get('app.apartment_readings_not_now', array('days_before' => $apartment->house->days_before,'days_after' => $apartment->house->days_after))}}</h4>
					</div>
				@elseif(isset($the_reading->id))
					<div class="panel-body">
						<h4>{{Lang::get('app.apartment_readings_done')}}</h4>
					</div>
				@else
					<div class="panel-body">
						<p><strong>{{Lang::get('app.apartment_readings_info',array('days_before' => $apartment->house->days_before,'days_after' => $apartment->house->days_after))}}</strong></p>
						<form action='/apartment/{{$apartment->token}}/reading' method="POST" class="">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="row">
								@if($apartment->house->has_cold_water)
									<div class="form-group col-md-3">
										<label for="coldWaterLable">{{Lang::get('app.apartment_readings_cold_water')}}</label>
										<input type="text" name="cold_water" class="form-control" id="coldWaterLable" placeholder="{{Lang::get('app.apartment_readings_cold_water')}}">
									</div>
								@endif
								@if($apartment->house->has_hot_water)
									<div class="form-group col-md-3">
										<label for="hotWaterLable">{{Lang::get('app.apartment_readings_hot_water')}}</label>
										<input type="text" name="hot_water" class="form-control" id="hotWaterLable" placeholder="{{Lang::get('app.apartment_readings_hot_water')}}">
									</div>
								@endif
								@if($apartment->house->has_gas)
									<div class="form-group col-md-3">
										<label for="gasLable">{{Lang::get('app.apartment_readings_gas')}}</label>
										<input type="text" name="gas" class="form-control" id="gasLable" placeholder="{{Lang::get('app.apartment_readings_gas')}}">
									</div>
								@endif
								@if($apartment->house->has_day_electricity)
									<div class="form-group col-md-3">
										<label for="dayElectricityLable">{{Lang::get('app.apartment_readings_day_electricity')}}</label>
										<input type="text" name="day_electricity" class="form-control" id="dayElectricityLable" placeholder="{{Lang::get('app.apartment_readings_day_electricity')}}">
									</div>
								@endif
								@if($apartment->house->has_night_electricity)
									<div class="form-group col-md-3">
										<label for="nightElectricityLable">{{Lang::get('app.apartment_readings_night_electricity')}}</label>
										<input type="text" name="night_electricity" class="form-control" id="nightElectricityLable" placeholder="{{Lang::get('app.apartment_readings_night_electricity')}}">
									</div>
								@endif
							</div>
							<div class="row">
								<div class="col-md-3">
									<button type="submit" class="btn btn-success">{{Lang::get('app.apartment_readings_btn')}}</button>
								</div>
							</div>
						</form>
					</div>
				@endif
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.apartment_history_headline')}}</div>

				<div class="panel-body">
					<table class="table">
		               <thead>
		             		<tr>
			                   <tr>
			                       <th>{{Lang::get('app.apartment_readings_month')}}</th>
								@if($apartment->house->has_cold_water)
			                       <th>{{Lang::get('app.apartment_readings_cold_water')}}</th>   
								@endif
								@if($apartment->house->has_hot_water)
			                       <th>{{Lang::get('app.apartment_readings_hot_water')}}</th>
								@endif
								@if($apartment->house->has_gas)
			                       <th>{{Lang::get('app.apartment_readings_gas')}}</th>
								@endif
								@if($apartment->house->has_day_electricity)
			                       <th>{{Lang::get('app.apartment_readings_day_electricity')}}</th>
								@endif
								@if($apartment->house->has_night_electricity)
			                       <th>{{Lang::get('app.apartment_readings_night_electricity')}}</th>
								@endif
			                       <th>{{Lang::get('app.appartment_reading_edit_btn')}}</th>

		                    </tr>
		               </thead>
		               <tbody>
		               		@foreach($apartment->readings as $reading)

								<form action='/house/{{$apartment->house_id}}/apartment/{{$apartment->id}}/reading/{{$reading->id}}' method="POST" class="form">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
									<input type="hidden" name="_method" value="PATCH">
				                	<tr>
					                       <td>{{$reading->period}}</td>
										@if($apartment->house->has_cold_water)
					                       <td><input type="text" name="cold_water" class="form-control" id="coldWaterLable" value="{{$reading->cold_water}}" placeholder="Külma vee näit"></td>
										@endif
										@if($apartment->house->has_hot_water)
					                       <td><input type="text" name="hot_water" class="form-control" id="hotWaterLable" value="{{$reading->hot_water}}" placeholder="Soe vee näit"></td>
										@endif
										@if($apartment->house->has_gas)
					                       <td><input type="text" name="gas" class="form-control" id="gasLable" value="{{$reading->gas}}" placeholder="Gaasi näit"></td>
										@endif
										@if($apartment->house->has_day_electricity)
					                       <td><input type="text" name="day_electricity" class="form-control" id="dayElectricityLable" value="{{$reading->day_electricity}}" placeholder="Päevase elektri näit"></td>
										@endif
										@if($apartment->house->has_night_electricity)
					                       <td><input type="text" name="night_electricity" class="form-control" id="nightElectricityLable" value="{{$reading->night_electricity}}" placeholder="Öise elektri näit"></td>
					                    @endif
					                       <td><button type="submit" class="btn btn-success">{{Lang::get('app.appartment_reading_edit_btn')}}</button></td>
				                   	</tr>
			                   </form>
			                @endforeach
		                </tbody>
					</table>
					@if(!isset($apartment->readings[0]))
						<div class="text-center">{{Lang::get('app.apartment_history_no')}}</div>
					@endif
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
