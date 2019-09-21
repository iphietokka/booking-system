<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\News;
class NewsController extends Controller
{
      function __construct()
    {
        $this->title = 'news';
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $title =  $this->title;
    $news = News::all();
    return view('admin.'.$title.'.index',compact('title','news'));
}
public function store(Request $request)
{
    $this->validate($request, [
        'title' => 'required',
        'content_news' => 'required',
        'status' =>'required',
    ]);


    $model = $request->all();
    $model['user_id'] = \Auth::user()->id;

    if (news::create($model)){
        return redirect('admin/'.$this->title)->with('success', 'New News Added!');
    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something went wrong!');
    }
}


public function update(Request $request, $id)
{
    $model = $request->all();
    $model['user_id'] = \Auth::user()->id;
    $data = News::find($model['id']);

    if ($data->update($model)){
          return redirect('admin/'.$this->title)->with('success', 'News Update!');
    }else{
        return redirect('admin/'.$this->title)->with('error', 'Something went wrong!');
    }
}

public function destroy($id)
{
    $data = News::find($id);
    if($data->delete()){
       return redirect('admin/'.$this->title)->with('error','Data Deleted');
    }else{
       return redirect('admin/'.$this->title)->with('error','Something went wrong!');
    }
}


}
