@extends('layout')

@section('content')
	<div class="container" style="padding-top:80px;">
		@include('_messages')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="{{URL::to('account')}}" method="POST" class="form">
							<input type="hidden" name="_method" value="PATCH">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">{{Lang::get('app.account_name')}}</label>
								<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="{{Lang::get('app.account_name')}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">{{Lang::get('app.account_email')}}</label>
								<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="{{Lang::get('app.account_email')}}">
							</div>
							<br/>
							<label for="exampleInputPassword1">{{Lang::get('app.account_password_info')}}</label>
							<br/>
							<div class="form-group">
								<label for="exampleInputPassword1">{{Lang::get('app.account_password')}}</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="{{Lang::get('app.account_password')}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">{{Lang::get('app.account_password_2')}}</label>
								<input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="{{Lang::get('app.account_password_2')}}">
							</div>
							<button type="submit" class="btn btn-success">{{Lang::get('app.account_btn')}}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection
