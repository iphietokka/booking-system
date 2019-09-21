<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\RoomTransaction;
use App\News;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
    $avail_room= Room::where('status',0)->count();
    $used_room = Room::where('status',1)->count();
    $dirty_room = Room::where('status',2)->count();
    $guests = RoomTransaction::where('status',1)->get();
    $guest_checkout = RoomTransaction::whereDate('checkout_date', Carbon::today())
    ->where('status',1)
    ->get();
    $news = News::orderBy('created_at','DESC')->paginate(3);
    return view('Admin.Dashboard',compact('avail_room','used_room','dirty_room','guests','guest_checkout','news'));
    }
}
