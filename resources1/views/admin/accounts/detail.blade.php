<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$user->name}}</td>
		</tr>
		<tr>
			<td>Account#</td>
			<td>{{$user->account_no}}</td>
		</tr>
	
		<tr>
			<td>Created at</td>
			<td>{{$user->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

