<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Chart;
use App\Models\User;

use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        $title = 'Accounts';
        return view('admin.accounts.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAccounts(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'account_no',
            2 => 'user_id',
            3 => 'created_at',
            4 => 'action'
        );

        $totalData = Account::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $users = Account::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Account::count();
        }else{
            $search = $request->input('search.value');
            $users = Account::where([
                ['name', 'like', "%{$search}%"],
            ])
                ->orWhere('account_no','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Account::where([

                ['name', 'like', "%{$search}%"],
            ])
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('account_no','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->count();
        }

        $data = array();

        if($users){
            foreach($users as $r){
                $edit_url = route('accounts.edit',$r->id);
                $nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="accounts[]" value="'.$r->id.'"><span></span></label></td>';
                $nestedData['name'] = $r->name;
                $nestedData['account_no'] = $r->account_no;
                $nestedData['user_id'] = $r->user_id;
                $nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewChart('.$r->id.');" title="View Account" href="javascript:void(0)">
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
        $title = 'Add New Account';
        $accounts = User::all();
        return view('admin.accounts.create',compact('title','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'account_no' => 'required',

        ]);

        $input = $request->all();


        $user = new Account();
        $user->name = $input['name'];
        $user->account_no = $input['account_no'];
        $user->user_id = $input['customer'];


        $user->save();

       Session::flash('success_message', 'Great! Account has been added successfully!');
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
        $user = Account::find($id);
        return view('admin.accounts.single', ['title' => 'Account detail', 'user' => $user]);
    }

    public function accountDetail(Request $request)
    {

        $user = Account::findOrFail($request->id);


        return view('admin.accounts.detail', ['title' => 'Account Detail', 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Account::find($id);
        return view('admin.accounts.edit', ['title' => 'Edit client details'])->withUser($user);
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
        $user = Account::find($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'account_no' => 'required',
        ]);
        $input = $request->all();

        $user->name = $input['name'];
        $user->account_no = $input['account_no'];
//        $user->user_id = $input['customer'];


        $user->save();

        Session::flash('success_message', 'Great! Account successfully updated!');
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
        $user = Account::find($id);

            $user->delete();
            Session::flash('success_message', 'Account successfully deleted!');

        return redirect()->route('accounts.index');

    }
    public function deleteSelectedClients(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'clients' => 'required',

        ]);
        foreach ($input['clients'] as $index => $id) {

            $user = Account::find($id);

                $user->delete();


        }
        Session::flash('success_message', 'Account successfully deleted!');
        return redirect()->back();

    }
    public function getuserAccounts(Request $request){

        $customer_id = $request->id;
//        dd($customer_id);
        $accounts = Account::where('user_id', $customer_id)->get();

        return view('admin.charts.getAccounts', ['accounts' => $accounts]);
    }
}
