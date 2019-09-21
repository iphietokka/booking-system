<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;

class UserController extends Controller
{
     public function __construct()
    {
        $this->title = 'user';
    }

    public function index()
    {
    	$title = $this->title;
    	$users = User::orderBy('name','ASC')->get();
    	$roles = Role::pluck('name','id');
    	return view('admin.'.$title.'.index',compact('title','users','roles'));
    }

   public function store(Request $request)
    {
    	 $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'role_id' =>'required|numeric|min:1',
            'password' => 'required',
            'active' => 'string'
    ]);
    $model = $request->all();
    $model['password'] = bcrypt($model['password']);
     if (User::create($model)){
        return redirect('admin/'.$this->title)->with('success','New User Added!!');
     }else{
        return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
     }
    }

    public function update( Request $request, $id)
    {
    	$model = $request->all();
        $data = User::find($model['id']);
    	if ($request->password == '') {
          $input = $request->except('password');
        }
        else {
          $input = $request->all();
        }
         if (!$request->password == '') {
          $input['password'] = bcrypt($request->password);
        }

    if ($data->update($input)){
        return redirect('admin/'.$this->title)->with('success','User Update!!');
    }else{
      return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
    }
    }

    public function destroy($id)
    {
    	$users = User::find($id);
    	if ($users->delete()) {
    		return redirect('admin/'.$this->title)->with('success','User Delete!!');
    	}else{
    		return redirect('admin/'.$this->title)->with('error','Something Wrong!!');
    	}
    }
}
