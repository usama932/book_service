<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    
    public function index()
    {
        $title = 'Testimonials';
	    return view('admin.testimonials.index',compact('title'));
    }

    public function getTestimonials(Request $request){
       
        $columns = array(
			0 => 'id',
			1 => 'name',
            2 => 'email',
            3 => 'designation',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Testimonial::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$testimonials = Testimonial::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Testimonial::count();
		}else{
			$search = $request->input('search.value');
			$testimonials = Testimonial::where([
				['name', 'like', "%{$search}%"],
			])
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('designation','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Testimonial::where([
				
				['name', 'like', "%{$search}%"],
			])
				->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('designation','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($testimonials){
			foreach($testimonials as $r){
				$edit_url = route('testimonials.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="testimonials[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->name;
				$nestedData['email'] = $r->email;
                $nestedData['designation'] = $r->designation;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View gallery" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                    <a title="Edit gallery" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete gallery" href="javascript:void(0)">
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
   
    public function testimonialDetail(Request $request){
        
        $testimonial = Testimonial::findOrFail($request->id);
		return view('admin.testimonials.detail', ['title' => 'testimonial Detail', 'testimonial' => $testimonial]);
    }
    public function create()
    {
        $title = 'Add Testimonials';
        return view('admin.testimonials.create',compact('title'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'reviews' => 'required',   
           
        ]);
        $testimonial = Testimonial::create([
            'name' => $request->name,
            'email' => $request->email,
            'designation'  => $request->designation,
            'reviews'  => $request->reviews,
        ]);
        Session::flash('success_message', 'Great! Testimonials has been saved successfully!');
      
        return redirect()->route('testimonials.index');
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $title = 'Edit Testimonials';
        return view('admin.testimonials.edit',compact('title','testimonial'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'reviews' => 'required',   
           
        ]);
        $testimonial = Testimonial::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'designation'  => $request->designation,
            'reviews'  => $request->reviews,
        ]);
        Session::flash('success_message', 'Great! Testimonials has been update successfully!');
      
        return redirect()->route('testimonials.index');
    }

   
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
	    if($testimonial){
		    $testimonial->delete();
		    Session::flash('success_message', 'testimonial successfully deleted!');
	    }
	    return redirect()->route('testimonials.index');
    }
    public function deleteSelectedtestimonial(Request $request)
	{
      
		$input = $request->all();
		$this->validate($request, [
			'testimonials' => 'required',
		
		]);
		foreach ($input['testimonials'] as $index => $id) {
			
			$testimonial = Testimonial::find($id);
			if($testimonial){
				$testimonial->delete();
			}
			
		}
		Session::flash('success_message', ' successfully deleted!');
		return redirect()->back();
		
	}
}
