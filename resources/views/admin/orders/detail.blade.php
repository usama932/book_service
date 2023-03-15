<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$order->name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$order->email}}</td>
		</tr>
		<tr>
			<td>Home phone#</td>
			<td>{{$order->home_phone_number}}</td>
		</tr>
        <tr>
			<td>Cell phone#</td>
			<td>{{$order->cell_phone}}</td>
		</tr>
        <tr>
			<td>Address</td>
			<td>{{$order->address}}</td>
		</tr>
        <tr>
			<td>How did hear</td>
			<td>{{$order->how_did_hear}}</td>
		</tr>
		<tr>
			<td>Services</td>
			<td>
				@foreach ($order->serviceorder as $service)
				<span class="badge bg-primary">{{$service->service->title}}</span>
				
				@endforeach
			</td>
		</tr>
		<tr>
			<td>Extra Services</td>
			<td>
				@foreach ($order->extraorder as $extra)
				<span class="badge bg-primary">{{$extra->extra->title}}</span>
				
				@endforeach
			</td>
		</tr>
        <tr>
			<td>Total Amount</td>
			<td>{{$order->total_amount}}</td>
		</tr>
         <tr>
			<td>Transaction Id</td>
			<td>{{$order->transaction_id}}</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$order->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>
