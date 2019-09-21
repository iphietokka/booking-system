<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Floor;

class FloorController extends Controller
{
    function __construct()
    {
    	$this->title = "floor";
    }

    public function index()
    {
    	$title = $this->title;
    	$floors = Floor::orderBy('name','desc')->get();
    	return view('admin.'.$title.'.index', compact('title','floors'));
    }


    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
    ]);
    $model = $request->all();
    if (Floor::create($model)){
      return redirect('admin/'.$this->title)->with('success','New Floor Added!!');
    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something Wrong...');
    }
}

public function update(Request $request, $id)
{
    $model = $request->all();
    $data = Floor::find($model['id']);
    if ($data->update($model)){
      return redirect('admin/'.$this->title)->with('success','Floor Update!!');

    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something Wrong...');
    }
}

public function destroy($id)
{
    $data = Floor::find($id);
    if($data->delete()){
       return redirect('admin/'.$this->title)->with('success', 'Floor Delete');
    }else{
         return redirect('admin/'.$this->title)->with('error', 'Something Wrong...');
    }
}

}
