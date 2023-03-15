<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$testimonial->name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$testimonial->email}}</td>
		</tr>
		<tr>
			<td>Designation</td>
			<td>{{$testimonial->designation}}</td>
		</tr>
        <tr>
			<td>Reviews</td>
			<td>{{$testimonial->reviews}}</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$testimonial->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>
