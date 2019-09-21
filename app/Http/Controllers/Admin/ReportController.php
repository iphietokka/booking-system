<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use PDF;
use DateTime;
use App\RoomTransaction;
use App\ServiceTransaction;
use App\Company;

class ReportController extends Controller
{
    function __construct()
    {
        $this->title = "report";
    }


/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $title = $this->title;
    return view('admin.'.$title.'.index', compact('title'));
}


public function room(Request $request)
{
		 $from = date('Y-m-d',strtotime($request->get('from')));
        $to = date('Y-m-d',strtotime($request->get('to')));
         $transactions = RoomTransaction::where('status',0)
          ->whereBetween('created_at',[$from,$to]);

        $from = date('Y-m-d',strtotime($request->get('from')));
        $to = date('Y-m-d',strtotime($request->get('to')));
         $price_total = $transactions->sum('price_total');
    	$total_deposite = $transactions->sum('deposite');
    	$total = 'Rp'.number_format($price_total -  $total_deposite,2);

        return view('admin.report.room',compact('price_total','total_deposite','total'))
                    ->withTransactions($transactions->get())
                    ->withFrom($request->get('from'))
                    ->withTo($request->get('to'));



}


public function service(Request $request)
{

    $title = $this->title;
    $from = date('Y-m-d',strtotime($request->get('from')));
    $to = date('Y-m-d',strtotime($request->get('to')));
    $transactions = ServiceTransaction::with('roomtransaction')
    ->whereBetween('created_at',[$from,$to])
    ->with(['roomtransaction' => function($q) {
    $q->with('room');
    }])->with('service','user');
    $total = 'Rp'.number_format($transactions->sum('total'),2);
    return view('admin.report.service',compact('price_total','total_deposite','total'))
                    ->withTransactions($transactions->get())
                    ->withFrom($request->get('from'))
                    ->withTo($request->get('to'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
//
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
//
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
//
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
//
}
}
