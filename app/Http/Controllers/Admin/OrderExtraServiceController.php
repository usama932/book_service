<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderExtra;
use Illuminate\Support\Facades\Session;


class OrderExtraServiceController extends Controller
{
    
    public function index()
    {
        $title = 'Extra Service Orders';
	    return view('admin.extraorders.index',compact('title'));
    }
    public function getExtraOrders(Request $request){
       
        $columns = array(
			0 => 'id',
			1 => 'order_id',
			2 => 'extra_id',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = OrderExtra::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$orders = OrderExtra::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Order::count();
		}else{
			$search = $request->input('search.value');
			$orders = OrderExtra::offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = OrderExtra::where('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($orders){
			foreach($orders as $r){
				$edit_url = route('extra_service_orders.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="orders[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['order_id'] = $r->order_id;
				$nestedData['extra_id'] = $r->extra_id;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View order" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                 
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete order" href="javascript:void(0)">
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
   
    public function extraorderDetail(Request $request){
        
        $order = OrderExtra::where('id',$request->id)->first();
	
		return view('admin.extraorders.detail', ['title' => 'Extra Service Order Detail', 'order' => $order]);
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
        $order = OrderExtra::find($id);
	    if($order){
		    $order->delete();
		    Session::flash('success_message', 'Order successfully deleted!');
	    }
	    return redirect()->route('extra_service_orders.index');
    }
    public function deleteSelectedorder(Request $request)
	{
        
		$input = $request->all();
		$this->validate($request, [
			'orders' => 'required',
		
		]);
		foreach ($input['orders'] as $index => $id) {
			
			$order = OrderExtra::find($id);
			if($order){
				$order->delete();
			}
			
		}
		Session::flash('success_message', ' successfully deleted!');
		return redirect()->back();
		
	}
}
