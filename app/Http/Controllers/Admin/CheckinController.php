<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Room;
use App\Guest;
use App\RoomType;
use App\RoomTransaction;
use App\ServiceTransaction;
use Helper;
use Auth;
use Alert;
use Carbon\Carbon;
use DateTime;

class CheckinController extends Controller
{
    function __construct()
    {
        $this->title = 'checkin';
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $title = $this->title;
    $data = Room::with('roomtype','floor')->where('status',0)->orderBy('room_no')->get();
    return view('admin.'.$title.'.index',compact('title','data'));
}

public function create($id)
{
    $title = $this->title;
    $room = Room::find($id);
    $ym = Carbon::now()->format('Y/m');
    $row = RoomTransaction::withTrashed()->get()->count() > 0 ? RoomTransaction::withTrashed()->get()->count() + 1 : 1;
    $no_invoice = $ym.'/INV-'.Helper::ref($row);
    $guest = Guest::pluck('name','id');
    return view('admin.'.$title.'.create',compact('title','room','no_invoice','guest'));
}

public function store(Request $request)
{
    $data = new RoomTransaction();
    $ym = Carbon::now()->format('Y/m');
    $row = RoomTransaction::withTrashed()->get()->count() > 0 ? RoomTransaction::withTrashed()->get()->count() + 1 : 1;
    $no_invoice = $ym.'/INV-'.Helper::ref($row);
    $data->invoice_id = $no_invoice;
    $data->guest_id = $request->guest_id;
    $data->adult = $request->adult;
    $data->child = $request->child;

    $data->checkin_date = $request->checkin_date.' '.$request->time_checkin;
    $data->checkout_date = $request->checkout_date.' '.$request->time_checkout;
    $data->room_id = $request->room_id;
    $data->deposite= $request->deposite;
    $data->user_id = Auth::user()->id;
    $data->method = $request->method;
    $data->status = 1;
    $room_id = $data->room_id;
    $room = Room::find($room_id);

    $diffday = $this->diffdays($data->checkin_date,$data->checkout_date);
    $data->price_total = $room->roomtype->price_night * $diffday;

    if ($data->save()) {

        $room = Room::find($room_id);
        $room->status = 1;
        $room->save();
    }
    return redirect('admin/'.$this->title)->with('success', 'Check-In Berhasil');

}

public function edit($id)
{
    $title = $this->title;
    $transaction = RoomTransaction::with('room','guest')->find($id);
    $guest = Guest::all();
    return view('admin.'.$title.'.edit',compact('guest','transaction'));
}

public function update(Request $request)
{
    $this->validate($request,[
        'guest_id' => 'integer|min:1',
        'adult' => 'integer|min:1',
        'child' => 'integer|min:0',
        'invoice_id' => 'required',
        'method' => 'required',
        'checkout_date' => 'required|date',
        'deposite' => 'required|numeric|min:0'
    ]);
    $input = $request->all();
    $transaksi = RoomTransaction::find($input['id']);
    $input['user_id'] = Auth::user()->id;
    $input['checkout_date'] = $request->get('checkout_date').' '.$request->get('time_checkout');
    $input['checkin_date'] = $request->get('checkin_date').' '.$request->get('time_checkin');
    $input['status'] = 1;
   	$diffday = $this->diffdays($data->checkin_date,$data->checkout_date);

    $data->price_total = $room->roomtype->price_night * $diffday;
    if ($transaksi->update($input))
    {
        $update_kamar = $transaksi->kamar->update(['status' => 1]);
    }
     return redirect('admin/'.$this->title)->with('success', 'Check-In Update');
}

 private function diffdays($checkin,$checkout)
    {
        $checkin = date_create($checkin);
        $checkout = date_create($checkout);
        $interval = date_diff($checkin, $checkout);

       return $interval->format('%a');

    }

    public function listcheckin()
{
    $title = $this->title;
    $data = RoomTransaction::with('room','guest')->where('status',1)->get();
    return view('admin.'.$title.'.list',compact('title','data'));
}

public function bookinglist()
{
    $title = $this->title;
    $data = RoomTransaction::with('room','guest')->get();
    return view('admin.'.$title.'.show',compact('title','data'));
}
}
