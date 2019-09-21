@extends('layouts.app')
@section('content')
    <!-- Main content -->
  <section class="content">
  <div class="row" id="tamu">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
          <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Add Guest</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">Phone</th>
                <th>Email</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($guests as $guest)
              <tr>
                <td class="text-center">{{$guest->name}}</td>
                <td class="text-center">
                  {{ !empty($guest->address) ? $guest->address :'' }}
                </td>
                <td class="text-center">{{$guest->phone}}</td>
                 <td class="text-center">{{$guest->email}}</td>
                <td style="white-space: nowrap;">
                  <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit-data{{$guest->id}}"> <i class="fa fa-edit"></i> Edit</a>
                  <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$guest->id}}"><i class="fa fa-trash"></i> Hapus</a>
                </td>
                <div class="modal fade" id="edit-data{{$guest->id}}" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form method="POST" action="{{url('admin/guest/update/'.$guest->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-name" id="myModalLabel">Edit Data {{$guest->title}} . {{$guest->nama}}</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Guest Name</label>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <input type="hidden" name="id" value="{{$guest->id}}">
                                    <select name="title" class="form-control select2" id="" style="width: 100%;">
                                      <option value="{{$guest->title}}">{{$guest->title}}</option>
                                      <option value="Mr">Mr</option>
                                      <option value="Mrs">Mrs</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-4">
                                    <input class="form-control" name="name" placeholder="Nama"  value="{{$guest->name}}">

                                  </div>

                                </div>
                              </div>
                              <div class="form-group">
                                <label>Identitas</label>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <select class="form-control select2" name="identity_type" style="width: 100%;">
                                      <option value="{{$guest->identity_type}}">{{$guest->identity_type}}</option>
                                      <option value="KTP">KTP</option>
                                      <option value="SIM">SIM</option>
                                      <option value="PASSPORT">PASSPORT</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6">
                                    <input class="form-control" name="identity_no" placeholder="Nomor Identitas" value="{{$guest->identity_no}}">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" cols="25" rows="2">{{$guest->address}}</textarea>

                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" value="{{$guest->phone}}">

                                  </div>
                                  <div class="col-sm-6">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="{{$guest->email}}">

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

                <!-- Social Modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$guest->id}}">
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
                        <form class="form-horizontal" method="POST" action="{{url('admin/guest/'.$guest->id) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="DELETE">
                          <button type="reset" class="btn btn-grey">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </tr>

              @endforeach
            </tbody>
          </table>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah-data" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="{{url('admin/guest/store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-name" id="myModalLabel">Add Data</h4>
            </div>
            <div class="modal-body">
              <!-- row -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Name</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <select name="title" class="form-control select2" style="width: 100%;">
                          <option value="">Select</option>
                          <option value="Mr">Mr</option>
                          <option value="Mrs">Mrs</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <input class="form-control" name="name" placeholder="Enter Name" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Identity Type</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <select class="form-control select2" name="identity_type" style="width: 100%;">
                        	<option value="">Select</option>
                          <option value="KTP">KTP</option>
                          <option value="KTP">SIM</option>
                          <option value="KTP">PASSPORT</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="identity_no" placeholder=" Enter Identity Number">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" cols="2" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">
                      </div>
                      <div class="col-sm-6">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end row -->
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
     $('.select2').select2()
  })
</script>
@endsection