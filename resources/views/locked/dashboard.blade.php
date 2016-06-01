@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

@include('_messages')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.dashboard_houses')}}</div>
				<div class="panel-body">
					<table class="table">
			           <thead>
			         		<tr>
			                   <th>{{Lang::get('app.dashboard_house_id')}}</th>
			                   <th>{{Lang::get('app.dashboard_house_address')}}</th>
			                   <th>{{Lang::get('app.dashboard_house_look_btn')}}</th>
			                </tr>
			           </thead>
			           <tbody>
			           		@foreach($houses as $house)
			             		<tr>
			                       	<td>{{$house->id}}</td>
			                       	<td>{{$house->address}}</td>
									<td><a href='{{URL::to("house/$house->id")}}' class="btn btn-success">{{Lang::get('app.dashboard_house_look_btn')}}</a></td>
			                    </tr>
			                @endforeach
			            </tbody>
					</table>
					@if(!isset($houses[0]))
						<div class="text-center">{{Lang::get('app.dashboard_house_no_house')}}</div>
					@endif
				</div>
			</div>
		</div>




		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('app.dashboard_new_house')}}</div>
				<div class="panel-body">
					<form action='{{URL::to("house")}}' method="POST" class="form">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label for="exampleInputEmail1">{{Lang::get('app.dashboard_new_house_address')}}</label>
							<input type="text" name="address" class="form-control" value="" placeholder="{{Lang::get('app.dashboard_new_house_address')}}">
						</div>
						<button type="submit" class="btn btn-success">{{Lang::get('app.dashboard_new_house_btn')}}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
