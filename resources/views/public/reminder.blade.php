@extends('layout')

@section('content')
	<div class="container" style="padding-top:80px;">
		@include('_messages')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>{{Lang::get('app.reminder_title')}}</h2>
						<form action="{{URL::to('reminder')}}" method="POST" class="form">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">{{Lang::get('app.reminder_email')}}</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{Lang::get('app.reminder_email')}}">
							</div>
							<button type="submit" class="btn btn-success">{{Lang::get('app.reminder_btn')}}</button>
						</form>
						<br/>
						<p>{!! Lang::get('app.reminder_login') !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection
