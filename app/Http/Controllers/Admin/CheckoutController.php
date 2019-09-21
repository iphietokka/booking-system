<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DateTime;
use App\Room;
use App\Company;;
use App\Guest;
use App\RoomTransaction;
use App\ServiceTransaction;
use Auth;
use DB;
use Alert;
use PDF;

class CheckoutController extends Controller
{
     function __construct()
    {
        $this->title = "checkout";
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $title = $this->title;
    $rooms = Room::where('status',1)->with('transaction','roomtype')->whereHas('transaction')->get();

    return view('admin.'.$title.'.index', compact('title','rooms'));
}

public function edit($id)
{
    $title = $this->title;
    $transaction = RoomTransaction::find($id);
    $fdate = $transaction->checkin_date;
    $tdate = $transaction->checkout_date;
    $diffday = $this->diffdays($fdate,$tdate);
    $checkout_date = date('Y-m-d H:i:s');
    $total = $transaction->room->roomtype->price_night * $diffday;
    $service = ServiceTransaction::where('room_transaction_id',$transaction->id)->get();
    $service_total = DB::table('service_transactions')->sum('total');
    return view('admin.'.$title.'.edit',compact('title','transaction','diffday','service','checkout_date','total','service_total'));
}

public function update(Request $request)
{
    $id = $request->get('id');
    $transaction = RoomTransaction::find($id);
    $checkout_date = $transaction->checkout_date;
    $checkin_date = $transaction->checkin_date;
    $selisih = $this->diffdays($checkin_date,$checkout_date);
    $transaction->status = 0;
    $transaction->checkout_date = date('Y-m-d H:i:s');
    $total = $transaction->room->roomtype->price_night * $selisih;
    $transaction->price_total  = $total - $transaction->deposite;
    if ($transaction->update())
    {
        $kamar = $transaction->room->update(['status' => 2]);
    }

    return redirect('admin/'.$this->title)->with('success', 'Check-Out Success');

}

public function invoice($id)
{

    $title = $this->title;
    // $this->data['transaksi'] = TransaksiKamar::with('kamar','tamu')->find($id);
    //     $this->data['tgl_checkout'] = date('Y-m-d H:i:s');
    //     $this->data['jumlah_hari'] = $this->jumlahhari($this->data['transaksi']->tgl_checkin,$this->data['tgl_checkout']);
    //     $this->data['layanan'] = TransaksiLayanan::where('transaksi_kamar_id',$this->data['transaksi']->kamar->id)->get();

    $transaction = RoomTransaction::with('room','guest')->find($id);
    $checkout_date = date('Y-m-d H:i:s');
    $diffday = $this->diffdays($transaction->checkin_date,$transaction->checkout_date);
    $service = ServiceTransaction::where('room_transaction_id',$transaction->room->id)->get();
    $company = Company::all();
    $pdf = PDF::loadView('admin.'.$title.'.invoice',compact('title','transaction','diffday','service','company'));
    return $pdf->stream();

}

private function diffdays($checkin,$checkout)
    {
        $checkin = date_create($checkin);
        $checkout = date_create($checkout);
        $interval = date_diff($checkin, $checkout);

       return $interval->format('%a');

    }

}
