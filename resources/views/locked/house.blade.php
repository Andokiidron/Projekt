@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

@include('_messages')

	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Lisa uus korter</div>
				<div class="panel-body">
					<form action='{{URL::to("house/$house->id/apartment")}}' method="POST" class="form">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label for="exampleInputEmail1">Korteri number</label>
							<input type="text" name="apartment_number" class="form-control" placeholder="Korteri number">
						</div>
						<button type="submit" class="btn btn-success">Loo uus korter</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lisa uus korter
				</div>
				<div class="panel-body">
					<table class="table">
		               <thead>
		             		<tr>
		                       <th>Number</th>
		                       <th>Kood</th>
		                       <th>Külm vesi</th>
		                       <th>Soe vesi</th>
		                       <th>Gaas</th>
		                       <th>Uuendatud</th>
		                    </tr>
		               </thead>
		               <tbody>
		               		@foreach($house->apartments as $apartment)
			             		<tr>
			                       <td>{{$apartment->number}}</td>
			                       <td>{{$apartment->token}}</td>
			                       <td>{{$apartment->cold_water}}</td>
			                       <td>{{$apartment->hot_water}}</td>
			                       <td>{{$apartment->gas}}</td>
			                       <td>{{ date('d.m.Y | H:i:s', strtotime($apartment->updated_at)) }}</td>
			                    </tr>
			                @endforeach
		                </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
