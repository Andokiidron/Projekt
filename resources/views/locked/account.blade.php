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
								<label for="exampleInputEmail1">Nimi</label>
								<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Nimi">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
							</div>
							<br/>
							<label for="exampleInputPassword1">Täida ainult, kui soovid parooli vahetada.</label>
							<br/>
							<div class="form-group">
								<label for="exampleInputPassword1">Salasõna</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Salasõna">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Salasõna kordus</label>
								<input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Salasõna kordus">
							</div>
							<button type="submit" class="btn btn-success">Salvesta</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection