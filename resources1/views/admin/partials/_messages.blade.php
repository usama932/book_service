@if(Session::has('success_message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{ Session::get('success_message') }}
	</div>
@endif
@if(Session::has('error_message'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{ Session::get('error_message') }}
	</div>
@endif
