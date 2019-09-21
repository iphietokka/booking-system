@extends('layouts.app')
@section('content')
<section class="content">
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Add Category</button>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
          <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($service_category as $dt)
          <tr>
            <td class="text-center">{{$dt->name}}</td><td class="text-center">
              <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$dt->id}}"> <i class="fa fa-edit"></i> Edit</a>
              <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$dt->id}}"><i class="fa fa-trash"></i> Delete</a>
              <!-- Social Modal -->
              <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$dt->id}}">
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
                     <form class="form-horizontal" method="POST" action="{{url('admin/service-category/'.$dt->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="reset" class="btn btn-grey">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </td>
        </tr>
        <div class="modal fade" id="edit_modal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">


              <form method="POST" action="{{url('admin/service-category/update/'.$dt->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-name" id="myModalLabel">Update Data</h4>
                </div>
                <div class="modal-body">
                 <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="hidden" name="id" value="{{$dt->id}}">
                  <input type="text" name="name" class="form-control" value="{{$dt->name}}"/>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form method="POST" action="{{url('admin/service-category/store')}}" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-name" id="myModalLabel">Add Category</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" class="form-control"/>
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
</section>
@endsection