@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

@include('_messages')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Sinu majad</div>
				<div class="panel-body">
					<table class="table">
			           <thead>
			         		<tr>
			                   <th>Maja ID</th>
			                   <th>Ühistu nimi</th>
			                   <th>Vaata</th>
			                </tr>
			           </thead>
			           <tbody>
			           		@foreach($houses as $house)
			             		<tr>
			                       	<td>{{$house->id}}</td>
			                       	<td>{{$house->address}}</td>
									<td><a href='{{URL::to("house/$house->id")}}' class="btn btn-success">Vaata</a></td>
			                    </tr>
			                @endforeach
			            </tbody>
					</table>
					@if(!isset($houses[0]))
						<div class="text-center">Sul pole veel ühtegi maja. Lisa maja paremal pool.</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Lisa uus maja</div>
				<div class="panel-body">
					<form action='{{URL::to("house")}}' method="POST" class="form">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label for="exampleInputEmail1">Maja aadress</label>
							<input type="text" name="address" class="form-control" value="" placeholder="Maja aadress">
						</div>
						<button type="submit" class="btn btn-success">Lisa uus maja</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection