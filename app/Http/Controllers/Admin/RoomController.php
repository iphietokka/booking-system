<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Room;
use App\Floor;
use App\RoomType;

class RoomController extends Controller
{
     function __construct()
    {
        $this->title = 'room';
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $title = $this->title;
    $rooms = Room::orderBy('room_no','desc')->get();
    $roomtypes = RoomType::pluck('name','id');
    $floors = Floor::pluck('name','id');
    return view('admin.'.$title.'.index',compact('title','rooms','roomtypes','floors'));
}

public function store(Request $request)
{
    $this->validate($request, [
        'room_no' => 'required',
        'room_type_id' => 'integer|min:1',
        'floor_id' => 'integer|min:1',
        'max_adult' =>'integer|min:1',
        'max_child' =>'integer|min:1'
    ]);
    $model = $request->all();
    if (Room::create($model)){
        return redirect('admin/'.$this->title)->with('success', 'New Room Added');
    }else{
         return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }

}

public function update(Request $request, $id)
{
    $model = $request->all();
    $data = Room::find($model['id']);
    if ($data->update($model)){
         return redirect('admin/'.$this->title)->with('success', 'Room Update');
    }else{
         return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
}

public function destroy($id)
{
    $data = Room::find($id);
    if($data->delete()){
       return redirect('admin/'.$this->title)->with('success', 'Room Deleted');
    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
    }
}


}
