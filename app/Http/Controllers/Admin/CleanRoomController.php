<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class CleanRoomController extends Controller
{
	function __construct()
	{
		$this->title = "cleaning-room";
	}

	public function index()
	{
		$title = $this->title;
		$room = Room::with('roomtype','floor')->where('status',2)->get();
		return view('admin.'.$title.'.index',compact('title','room'));
	}

	public function update(Request $request, $id)
	{
		$clean = Room::find($id);
		$input['status'] = 0;
		if($clean->update($input)){
			return redirect('admin/'.$this->title)->with('success','Room Clean');
		}
		else{
			return redirect('admin/'.$this->title)->with('error','Something Wrong');
		}

	}

}
