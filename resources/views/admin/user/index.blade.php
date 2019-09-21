@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Add User</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Last Login</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->username}}</td>
						<td>
							@if($user->roles->name == 'Admin')<span class="label label-primary">Admin</span>@endif
							@if($user->roles->name == 'Front')<span class="label label-success">Front</span>@endif
						</td>
						<td>{!!$user->active?"<i  style='color:green' class='fa fa-check'></i>":"<i style='color: red'
							class=' fa fa-close'></i>"!!}</td>
						<td>{{$user->last_login}}</td>
						<td>
 <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$user->id}}"> <i class="fa fa-edit"></i> Edit</a>
					 <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$user->id}}"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>
					<div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$user->id}}">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-body text-center">
                                  <div class="row">

                                 <h4 class="modal-heading">Are You Sure?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                          </div>
                                        </div>
                                <div class="modal-footer">
                                   <form class="form-horizontal" method="POST" action="{{url('admin/user/'.$user->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                           <div class="modal fade" id="edit_modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="POST" action="{{url('admin/user/update/'.$user->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Edit Data {{ $user->name}}</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Name</label>
                      <div class="row">
                        <div class="col-sm-6">
                        	 <input type="hidden" name="id" value="{{$user->id}}">
                         <input class="form-control" name="name" placeholder="Enter Name" value="{{ $user->name}}">

                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="username" placeholder="Enter Username"  value="{{ $user->username}}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <div class="row">
                        <div class="col-sm-6">
                         <select class="form-control select2" style="width: 100%;">
                            <option value="{{$user->role_id}}" >{{$user->roles->name}}</option>
							@foreach($roles as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                          </select>

                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="row">
                         <div class="col-sm-6">
                          <label>Active</label>
                           <input type="hidden" name="active" value=0>
                           <input type="checkbox" name="active" @if($user->active) checked @endif value="1" >
                        </div>
                      </div>
                    </div>
                  </div>
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
        <!-- /.col -->
         <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form method="POST" action="{{url('admin/user/store')}}" enctype="multipart/form-data">
				{{ csrf_field() }}

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Add Data</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Name</label>
                      <div class="row">
                        <div class="col-sm-6">
                         <input class="form-control" name="name" placeholder="Enter Name">

                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="username" placeholder="Enter Username">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <select class="form-control" name="role_id">
                            <option value="0" >Select Role</option>
					@foreach($roles as $key => $value)
                             <option value="{{$key}}">{{$value}}</option>
@endforeach
                          </select>

                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Password">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Active</label>
                          <input type="hidden" name="active" value=0>
                        	<input type="checkbox" name="active" value=1>

                        </div>
                      </div>
                    </div>
                  </div>
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
      <!-- /.row -->
    </section>
@endsection

@section('scripts')
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection