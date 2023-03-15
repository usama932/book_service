<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderExtra;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
   
    public function index()
    {
        $title = 'Orders';
	    return view('admin.orders.index',compact('title'));
    }

    public function getOrders(Request $request){
       
        $columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'phone_home_phone_numbernumber',
            3 => 'email',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Order::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$orders = Order::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Order::count();
		}else{
			$search = $request->input('search.value');
			$orders = Order::where([
				['name', 'like', "%{$search}%"],
			])
                ->orWhere('name','like',"%{$search}%")
                ->orWhere('home_phone_number','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Order::where([
				
				['name', 'like', "%{$search}%"],
			])
                ->orWhere('name','like',"%{$search}%")
                ->orWhere('home_phone_number','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($orders){
			foreach($orders as $r){
				$edit_url = route('orders.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="orders[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->name;
				$nestedData['home_phone_number'] = $r->home_phone_number;
				$nestedData['email'] = $r->email;
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
   
    public function orderDetail(Request $request){
        
        $order = Order::where('id',$request->id)->with('extraorder','serviceorder')->first();
	
		return view('admin.orders.detail', ['title' => 'Order Detail', 'order' => $order]);
    }

    public function create()
    {
		
    }
   
    public function store(Request $request)
    {
        
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
        $order = Order::find($id);
	    if($order){
		    $order->extraorder->each->delete();
			$order->serviceorder->each->delete();
			$order->delete();

		    Session::flash('success_message', 'Order successfully deleted!');
	    }
	    return redirect()->route('orders.index');
    }
    public function deleteSelectedorder(Request $request)
	{
        
		$input = $request->all();
		$this->validate($request, [
			'orders' => 'required',
		
		]);
		foreach ($input['orders'] as $index => $id) {
			
			$order = Order::find($id);
			if($order){
				$order->extraorder->each->delete();
				$order->serviceorder->each->delete();
				$order->delete();
			}
			
		}
		Session::flash('success_message', ' successfully deleted!');
		return redirect()->back();
		
	}

}
