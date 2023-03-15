<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$service->title}}</td>
		</tr>
		<tr>
			<td>Price ($)</td>
			<td>{{$service->price}}</td>
		</tr>
		<tr>
			<td>Duration</td>
			<td>{{$service->duration}}</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$service->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

