@extends('layout')

@section('content')
<div class="container" style="padding-top:80px;">

	@include('_messages')

	<div class="row">

		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Korteri info</div>
				<div class="panel-body">
					<strong>Aadress:</strong> {{$apartment->house->address}} <br/>
					<strong>Korteri number:</strong> {{$apartment->number}} <br/>
					<strong>Korteri kood:</strong> {{$apartment->token}} <br/>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Näitude esitamine</div>
					<div class="panel-body">
						<form action='{{URL::to("apartment/$apartment->token/reading")}}' method="POST" class="">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="row">
									<div class="form-group col-md-4">
										<label for="coldWaterLable">Külm vesi</label>
										<input type="text" name="cold_water" class="form-control" id="coldWaterLable" placeholder="Külm vesi">
									</div>
									<div class="form-group col-md-4">
										<label for="hotWaterLable">Soe vesi</label>
										<input type="text" name="hot_water" class="form-control" id="hotWaterLable" placeholder="Soe vesi">
									</div>
									<div class="form-group col-md-4">
										<label for="gasLable">Gaas</label>
										<input type="text" name="gas" class="form-control" id="gasLable" placeholder="Gaas">
									</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<button type="submit" class="btn btn-success">Esita näidud</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection