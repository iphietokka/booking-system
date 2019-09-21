<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guest;

class GuestController extends Controller
{
    function __construct()
    {
        $this->title = 'guest';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $guests = Guest::orderBy('name','ASC')->get();
        return view('admin.'.$title.'.index',compact('title','guests'));
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'identity_type' => 'required',
            'identity_no' =>'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
         $model = $request->all();
          if (Guest::create($model)){
           return redirect('admin/'.$this->title)->with('success','New Guest Added!!');
        }else{
             return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
        }

    }

      public function update(Request $request, $id)
    {
         $model = $request->all();
        $data = Guest::find($model['id']);
        if ($data->update($model)){
            return redirect('admin/'.$this->title)->with('success', 'Guest Update!!');
        }else{
            return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
        }
    }

     public function destroy($id)
    {
          $data = Guest::find($id);
        if($data->delete()){
           return redirect('admin/'.$this->title)->with('success', 'Guest Delete!!');
        }else{
           return redirect('admin/'.$this->title)->with('error', 'Something Wrong!!');
        }
    }
}
