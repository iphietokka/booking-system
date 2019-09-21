<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ServiceCategory;

class ServiceCategoryController extends Controller
{
     function __construct()
    {
        $this->title = 'service-category';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $service_category = ServiceCategory::orderBy('name','ASC')->get();
        return view('admin.'.$title.'.index',compact('title','service_category'));
    }

     public function store(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
        ]);
         $model = $request->all();
          if (ServiceCategory::create($model)){
         return redirect('admin/'.$this->title)->with('success', 'New Service Category Added');
    }else{
         return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
    }


      public function update(Request $request, $id)
    {
        $model = $request->all();
        $data = ServiceCategory::find($model['id']);
        if ($data->update($model)){
         return redirect('admin/'.$this->title)->with('success', 'Service Category Update');
        }else{
           return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
        }
    }

     public function destroy($id)
    {
        $data = ServiceCategory::find($id);
        if($data->delete()){
           return redirect('admin/'.$this->title)->with('success', 'Service Category Delete');
        }else{
           return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
        }
    }
}
