@extends('layouts.app')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Add News</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">Date</th>
                <th class="text-center">Created By</th>
                <th class="text-center">Title</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($news as $news)
              <tr>
                <td class="text-center">{{$news->created_at}}</td>
                <td class="text-center">{{$news->user->name}}</td>
                <td class="text-center">{{$news->title}}</td>
                <td class="text-center">
                 @if ($news->status == '0')
                 <span class="label label-success"><b>BIASA</b></span>
                 @elseif ($news->status == '1')
                 <span class="label label-danger"><b>PENTING</b></span>
                 @else
                 <span class="label label-danger">test</span>
                 @endif
               </td>
               <td class="text-center">
                   <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$news->id}}"> <i class="fa fa-edit"></i> Edit</a>
                <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$news->id}}"><i class="fa fa-trash"></i> Delete</a>

                <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$news->id}}">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body text-center">
                      <div class="row">

                       <h4 class="modal-heading">Are You Sure?</h4>
                       <p>Do you really want to delete these records? This process cannot be undone.</p>
                     </div>
                   </div>
                   <div class="modal-footer">
                     <form class="form-horizontal" method="POST" action="{{url('admin/news/'.$news->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="reset" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
              </td>
            </tr>
             <div class="modal fade" id="edit_modal{{$news->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{url('admin/news/update/'.$news->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-name" id="myModalLabel">Edit Data {{$news->title}}</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Title / Judul:</label>
              <input type="hidden" name="id" value="{{$news->id}}">
              <input type="text" name="title" class="form-control" value="{{$news->title}}" />

            </div>
            <div class="form-group">
              <label for="name">Keterangan:</label>
              <textarea class="form-control" name="content_news" rows="15">{{$news->content_news}}</textarea>

            </div>
            <div class="form-group">
              <label for="name">Status:</label>
              <select class="form-control" name="status">
                 @if ($news->status == '0')
                 <option value="0" selected> NORMAL </option>
                 @elseif ($news->status == '1')
                <option value="1" selected>URGENT</option>
                 @else
                 <option value="0" selected> Pilih </option>
                 @endif

                <option value="0">NORMAL</option>
                <option value="1">URGENT</option>
              </select>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
            @endforeach
          </tbody>
        </table>


      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <form method="POST" action="{{url('admin/news/store')}}" enctype="multipart/form-data">
      {{ csrf_field() }}

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-name" id="myModalLabel">Add News</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Title:</label>
              <input type="text" name="title" class="form-control"/>

            </div>
            <div class="form-group">
              <label for="name">Content:</label>
              <textarea class="form-control" name="content_news" rows="15"></textarea>

            </div>
            <div class="form-group">
              <label for="name">Status:</label>
              <select class="form-control" name="status">
                <option value="0">NORMAL</option>
                <option value="1">URGENT</option>
              </select>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Model Edit -->



</div>

</section>
@endsection
