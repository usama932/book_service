<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    
    public function index()
    {
        $title = "Galleries";
        return view('admin.galleries.index',compact('title'));
    }

    public function getGalleries(Request $request){
       
        $columns = array(
			0 => 'id',
			1 => 'title',
			3 => 'created_at',
			4 => 'action'
		);
		
		$totalData = Gallery::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$gallaries = Gallery::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Gallery::count();
		}else{
			$search = $request->input('search.value');
			$gallaries = Gallery::where([
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Gallery::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('title', 'like', "%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($gallaries){
			foreach($gallaries as $r){
				$edit_url = route('galleries.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="gallaries[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
				
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
   
    public function galleryDetail(Request $request){
        
        $gallery = Gallery::findOrFail($request->id);
		return view('admin.galleries.detail', ['title' => 'Gallery Detail', 'gallery' => $gallery]);
    }
    public function create()
    {
		$title = 'Add Gallery';
        return view('admin.galleries.create',compact('title'));
    }

    public function store(Request $request)
    {
		$this->validate($request, [
		    'title' => 'required|max:255',
			'image' => 'max:500000',
	    ]);
		$thumbnail = "no image";
		if ($request->hasFile('image')) {
			if ($request->file('image')->isValid()) {
				$this->validate($request, [
					'image' => 'required|mimes:jpeg,png,jpg'
				]);
				$file = $request->file('image');
				$destinationPath = public_path('/uploads');
				//$extension = $file->getProductOriginalExtension('logo');
				$thumbnail = $file->getClientOriginalName('image');
				$thumbnail = rand() . $thumbnail;
				$request->file('image')->move($destinationPath, $thumbnail);
				
			}
		}
		$gallery = Gallery::create([
            'title' => $request->title,
            'image' => $thumbnail,
         
        ]);
		Session::flash('success_message', 'Great! Gallery has been saved successfully!');
      
        return redirect()->route('galleries.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
		$gallery = Gallery::find($id);
        $title = 'Gallery ';
        return view('admin.galleries.edit',compact('title','gallery'));
    }

 
    public function update(Request $request, $id)
    {
		$gallery = Gallery::find($id);
		$this->validate($request, [
		    'title' => 'required|max:255',
			'image' => 'max:500000',
	    ]);
		$thumbnail = $gallery->image;
		if ($request->hasFile('image')) {
			if ($request->file('image')->isValid()) {
				$this->validate($request, [
					'image' => 'required|mimes:jpeg,png,jpg'
				]);
				$file = $request->file('image');
				$destinationPath = public_path('/uploads');
				//$extension = $file->getProductOriginalExtension('logo');
				$thumbnail = $file->getClientOriginalName('image');
				$thumbnail = rand() . $thumbnail;
				$request->file('image')->move($destinationPath, $thumbnail);
				
			}

    	}
		$gallery = Gallery::where('id',$id)->update([
            'title' => $request->title,
            'image' => $thumbnail,
         
        ]);
		Session::flash('success_message', 'Great! Gallery has been updated successfully!');
      
        return redirect()->route('galleries.index');

}

	public function destroy($id)
    {
        $gallery = Gallery::find($id);
	    if($gallery){
		    $gallery->delete();
		    Session::flash('success_message', 'gallery successfully deleted!');
	    }
	    return redirect()->route('galleries.index');
    }
    public function deleteSelectedgalleries(Request $request)
	{
      
		$input = $request->all();
		$this->validate($request, [
			'gallaries' => 'required',
		
		]);
		foreach ($input['gallaries'] as $index => $id) {
			
			$gallery = Gallery::find($id);
			if($gallery){
				$gallery->delete();
			}
			
		}
		Session::flash('success_message', ' successfully deleted!');
		return redirect()->back();
		
	}
}
