<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
        
		<tr>
			<td>Order #</td>
			<td>{{$order->order_id}}</td>
		</tr>
		<tr>
			<td>Service #</td>
			<td>{{$order->service_id}}</td>
		</tr>
	
		<tr>
			<td>Created at</td>
			<td>{{$order->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>
