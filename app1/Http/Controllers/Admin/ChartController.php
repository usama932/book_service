<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Chart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChartController extends Controller
{
    public function index()
    {
        $title = 'Charts Data';
        $customers = User::all();
        // dd($customers);
        return view('admin.charts.index',compact('title'));
    }
    public function addChart(Request $request)
    {
//       dd($request->all());
        $title = 'Chart Data';

        $customers = User::all();
        foreach ($request->addmore as $key => $value) {
//            dd($value);
            $value['account_id']= $request->account_id;
            $value['user_id']= $request->customer;

            Chart::create($value);
        }
        Session::flash('success_message', 'Great! Chart Data has been saved successfully!');

        return redirect()->back();
        // dd($customers);
//        return view('admin.charts.index',compact('title','customers'));
    }


    public function getCharts(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'user_id',
            2 => 'account_id',
            3 => 'date',
            4 => 'value',
            5 => 'action'
        );

        $totalData = Chart::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $users = Chart::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Chart::count();
        }else{
            $search = $request->input('search.value');
            $users = Chart::where([

                ['user_id', 'like', "%{$search}%"],
            ])
                ->orWhere('account_id','like',"%{$search}%")
                ->orWhere('date','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Chart::where([

                ['user_id', 'like', "%{$search}%"],
            ])
                ->orWhere('account_id', 'like', "%{$search}%")
                ->orWhere('date','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->count();
        }


        $data = array();

        if($users){
            foreach($users as $r){
                $edit_url = route('charts.edit',$r->id);
                $nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="clients[]" value="'.$r->id.'"><span></span></label></td>';
                $nestedData['user_id'] = $r->users['name'];
                $nestedData['account_id'] = $r->accounts['account_no'];
                $nestedData['date'] = $r->date;
                $nestedData['value'] = $r->value;




                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Chart" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                    <a title="Edit Client" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Chart" href="javascript:void(0)">
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
    public function create()
    {
        $title = 'Add New Chart';
        $customers = User::all();
        return view('admin.charts.create',compact('title','customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $input = $request->all();
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        // $res = array_key_exists('active', $input);
        // if ($res == false) {
        //     $user->active = 0;
        // } else {
        //     $user->active = 1;

        // }
        $user->password = bcrypt($input['password']);
        $user->save();

        Session::flash('success_message', 'Great! Client has been saved successfully!');
        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.clients.single', ['title' => 'Client detail', 'user' => $user]);
    }

    public function chartDetail(Request $request)
    {

        $user = Chart::findOrFail($request->id);


        return view('admin.charts.detail', ['title' => 'chart Detail', 'user' => $user]);
    }

    public function edit($id)
    {
        $user = Chart::find($id);
//        return $user;
        return view('admin.charts.edit', ['title' => 'Edit charts details'])->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Chart::find($id);
//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'email' => 'required|unique:users,email,'.$user->id,
//        ]);
        $input = $request->all();


        $user->date = $input['date'];
        $user->value = $input['value'];


        $user->save();
        Session::flash('success_message', 'Great! Chart successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Chart::find($id);

            $user->delete();
            Session::flash('success_message', 'Chart successfully deleted!');

        return redirect()->route('charts.index');

    }
    public function deleteSelectedCharts(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'charts' => 'required',

        ]);
        foreach ($input['charts'] as $index => $id) {

            $user = Chart::find($id);

                $user->delete();
            }


        Session::flash('success_message', 'Chart successfully deleted!');
        return redirect()->back();

    }

}
