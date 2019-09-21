<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ServiceTransaction;
use App\RoomTransaction;
use App\Service;
use App\ServiceCategory;
use App\Room;
use DB;
use Auth;

class ServiceTransactionController extends Controller
{
	function __construct()
	{
		$this->title = "service-transaction";
	}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
	$title = $this->title;
	$guest = RoomTransaction::with('room','guest')->where('status',1)->get();
	return view('admin.'.$title.'.index',compact('title','guest'));
}

public function create()
{
	$title = $this->title;
	$room = Room::with('roomtype','floor')->where('status',2)->get();
	return view('admin.'.$title.'.create',compact('title','room'));
}

public function store(Request $request)
{
	$service = ServiceTransaction::make($request->all());
	$service->user_id = Auth::user()->id;
	$service->service_id = $service->service->id;
	$service->price = $service->service->price;
	$service->qty = $request->qty;
	$service->total =  $service->price * $service->qty;
	if ($service->save()){
		return redirect('admin/'.$this->title)->with('success','Service Order Success');
	}else{
		return redirect('admin/'.$this->title)->with('success','Something Wrong!!');
	}
}

public function show($id)
{
	$title = $this->title;

        $guest = RoomTransaction::with('room','guest')->find($id);
        $servicecategory = ServiceCategory::all();
        $services = Service::all();
        $transaksi = ServiceTransaction::with(['service'])->get();
        // $layanans = DB::select('SELECT * FROM layanans WHERE layanan_kategori_id');
      // dd($layanans);
        return view('admin.'.$title.'.edit',compact('title','guest','servicecategory','services','transaksi'));
}

public function getLayanan($id)
{
	$title = $this->title ;
	$service = Service::where('service_category_id',$id)->get();
	return response()->json($service);
}

public function edit($id)
{
	$title = $this->title ;

// $layanan = Layanan::where('layanan_kategori_id',$id)->get();
	dd($layanan);
	return view('admin.'.$title.'.test',compact('title','layanan'));
}


public function update(Request $request, $id)
{
	$clean = Room::find($id);
	$input['status'] = 0;
	if($clean->update($input)){
		return redirect('admin/'.$this->title.'/create')->with('success','Room Clean');
	}
	else{
		return redirect('admin/'.$this->title.'/create')->with('error','Something Wrong');
	}
	return Redirect::to('admin/service-transaction/create');

}

public function destroy($id)
{
//
}
}
