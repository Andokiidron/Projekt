<div class="messages">
	@if(Session::has('success_message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <div class="icon"><span class="fa fa-check-circle"></span></div>
        <button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times; &nbsp&nbsp&nbsp&nbsp</span>
			<span class="sr-only">{{Lang::get('app.messages_close')}}</span>
		</button>
		{{Session::get('success_message')}}
    </div>
	@endif
	@if(Session::has('fail_message'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <div class="icon"><span class="fa fa-ban"></span></div>
            <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times; &nbsp&nbsp&nbsp&nbsp</span>
				<span class="sr-only">{{Lang::get('app.messages_close')}}</span></button>
		{{Session::get('fail_message')}}
        </div>
	@endif
	<?php $error_messages = $errors->all(); ?>
	@if(!empty($error_messages))
		@foreach($error_messages as $message)
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <div class="icon"><span class="fa fa-ban"></span></div>
            <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times; &nbsp&nbsp&nbsp&nbsp</span>
				<span class="sr-only">{{Lang::get('app.messages_close')}}</span></button>
     		{{$message}}
        </div>
		@endforeach
	@endif
</div>