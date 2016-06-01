@extends('layout')

@section('content')
	<div class="container" style="padding-top:80px;">
		@include('_messages')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Saada parooli meeldetuletus</h2>
						<form action="{{URL::to('reminder')}}" method="POST" class="form">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>
							<button type="submit" class="btn btn-success">Saada meeldetuletus</button>
						</form>
						<br/>
						<p>Salasõna meenus? <a href='/login'>Logi sisse!</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
   
@endsection