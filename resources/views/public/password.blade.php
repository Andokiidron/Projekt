@extends('layout')

@section('content')
	<div class="container" style="padding-top:80px;">
		@include('_messages')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Salvesta uus salasõna</h2>
						<form action="{{URL::to('password')}}" method="POST" class="form">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="reminder_token" value="{{$token}}">
							<div class="form-group">
								<label for="exampleInputPassword1">Salasõna</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Salasõna">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Korda salasõna</label>
								<input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Korda salasõna">
							</div>
							<button type="submit" class="btn btn-success">Salvesta uus salasõna</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection