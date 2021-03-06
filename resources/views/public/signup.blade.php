@extends('layout')

@section('content')
	<div class="container" style="padding-top:80px;">
		@include('_messages')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Registreeru kasutajaks</h2>
						<form action="{{URL::to('signup')}}" method="POST" class="form">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Nimi</label>
								<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nimi">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Salasõna</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Salasõna">
							</div>
							<button type="submit" class="btn btn-success">Registreeru</button>
						</form>
						<br/>
						<p>Sul on juba kasutaja? <a href='/login'>Logi sisse!</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection