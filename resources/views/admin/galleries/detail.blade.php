<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$gallery->title}}</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><img src="{{asset("uploads/$gallery->image")}}" width="150px" height="100px" alt=""></td>
		</tr>
		
		<tr>
			<td>Created at</td>
			<td>{{$gallery->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>
