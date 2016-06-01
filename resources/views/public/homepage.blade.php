@extends('layout')

@section('content')


	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>{{Lang::get('app.home_slogan')}}</h1>
					<p style="color:white;font-size:20px;">{{Lang::get('app.home_slogan_sub')}}</p>
					<form class="form-inline" role="form" action="{{URL::to('search')}}" method="POST">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					  <div class="form-group">
					    <input type="text" class="form-control" name="search" placeholder="{{Lang::get('app.home_slogan_input')}}" value="@if(Cookie::has('last_apartment')){{Cookie::get('last_apartment')}}@endif">
					  </div><br/><br/>
					  <button type="submit" class="btn btn-success btn-lg">{{Lang::get('app.home_slogan_btn')}}</button>
					</form>					
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="img/ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->   
@endsection
