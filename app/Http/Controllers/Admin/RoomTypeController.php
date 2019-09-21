<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\RoomType;

class RoomTypeController extends Controller
{
     function __construct()
    {
        $this->title = "room-type";
    }

    public function index()
{
    $title = $this->title;
    $roomtype = RoomType::orderBy('name','desc')->get();
    return view('admin.'.$title.'.index',compact('title','roomtype'));
}


public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|string',
        'price_night' => 'required|numeric|min:1',
        'price_guest' =>'required|numeric',
        'desc' => 'string',

    ]);
    $model = $request->all();
    if (RoomType::create($model)){
        return redirect('admin/'.$this->title)->with('success','Room Type Added!!');
    }else{
        return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
    }
}


public function update(Request $request, $id)
{
    $model = $request->all();
    $data = RoomType::find($model['id']);

    if ($data->update($model)){
        return redirect('admin/'.$this->title)->with('success','Room Type Update!!');
    }else{
        return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
    }
}

public function destroy($id)
{
    $data = RoomType::find($id);
    if($data->delete()){
        return redirect('admin/'.$this->title)->with('success','Floor Deleted!!');
    }else{
       return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
    }
    return Redirect::to('admin/'.$this->title);
}

}
