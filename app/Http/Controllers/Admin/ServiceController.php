<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Service;
use App\ServiceCategory;

class ServiceController extends Controller
{
     function __construct()
    {
        $this->title = 'service';
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $title = $this->title;
    $service = Service::orderBy('service_name','ASC')->get();
    $servicecategory = ServiceCategory::pluck('name','id');
    return view('Admin.'.$title.'.index',compact('title','service','servicecategory'));
}
public function store(Request $request)
{
    $this->validate($request, [
        'service_name' => 'required',
        'service_category_id' => 'numeric|min:1',
        'unit' => 'required',
        'price' => 'numeric|min:1'
    ]);
    $model = $request->all();
    if (Service::create($model)){
    return redirect('admin/'.$this->title)->with('success', 'New Service Added');
    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
}

public function update(Request $request, $id)
{
    $model = $request->all();
    $data = Service::find($model['id']);
    if ($data->update($model)){
     return redirect('admin/'.$this->title)->with('success', 'Service Update');
    }else{
       return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
    return Redirect::to('admin/'.$this->title);
}

public function destroy($id)
{
    $data = Service::find($id);
    if($data->delete()){
       return redirect('admin/'.$this->title)->with('success', 'Service Delete');
    }else{
       return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
}

}
