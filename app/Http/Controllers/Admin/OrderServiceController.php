<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderExtra;
use Illuminate\Support\Facades\Session;

class OrderServiceController extends Controller
{
    
    public function index()
    {
        $title = 'Service Orders';
	    return view('admin.service_orders.index',compact('title'));
    }

    public function getServiceOrders(Request $request){
       
        $columns = array(
			0 => 'id',
			1 => 'order_id',
			2 => 'service_id',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = OrderService::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$orders = OrderService::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = OrderService::count();
		}else{
			$search = $request->input('search.value');
			$orders = OrderService::where([
				['order_id', 'like', "%{$search}%"],
			])
                
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Order::where([
				
				['order_id', 'like', "%{$search}%"],
			])
				->count();
		}
		
		
		$data = array();
		
		if($orders){
			foreach($orders as $r){
				$edit_url = route('service_orders.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="orders[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['order_id'] = $r->order_id;
				$nestedData['service_id'] = $r->service_id;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View service order" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                 
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete service order" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-delete"></i>
                                    </a>
                                </td>
                                </div>
                            ';
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);
		
		echo json_encode($json_data);
      
    }
   
    public function serviceorderDetail(Request $request){
        
        $order = OrderService::where('id',$request->id)->first();
	
		return view('admin.service_orders.detail', ['title' => 'Service Order Detail', 'order' => $order]);
    }
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        $order = OrderService::find($id);
	    if($order){
		    $order->delete();
		    Session::flash('success_message', 'Service Order successfully deleted!');
	    }
	    return redirect()->route('service_orders.index');
    }
    public function deleteSelectedorder(Request $request)
	{
        
		$input = $request->all();
		$this->validate($request, [
			'orders' => 'required',
		
		]);
		foreach ($input['orders'] as $index => $id) {
			
			$order = OrderService::find($id);
			if($order){
				$order->delete();
			}
			
		}
		Session::flash('success_message', ' successfully deleted!');
		return redirect()->back();
		
	}
    public function order_detail($id){
        $order = Order::where('id',$id)->with('room','bathroom','discount','time_slot','extraorder','cleaningtype')->first();
	
		return view('admin.order.order_detail', ['title' => 'Order Detail', 'order' => $order]);
    }
}
