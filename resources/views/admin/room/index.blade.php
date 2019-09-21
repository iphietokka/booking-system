@extends('layouts.app')
@section('content')
<section class="content">
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Add Room</button>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#Room</th>
              <th class="text-center">Room Type</th>
              <th class="text-center">Floor</th>
              <th class="text-center">Price / Night</th>
              <th class="text-center">Max Adult</th>
              <th class="text-center">Max Child</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rooms as $dt)
            <tr>
              <td class="text-center">{{$dt->room_no}}</td>
              <td class="text-center">{{$dt->roomtype->name}}</td>
              <td class="text-center">{{$dt->floor->name}}</td>
              <td class="text-center">{{$dt->roomtype->price_night_format}}</td>
              <td class="text-center">{{$dt->max_adult}}</td>
              <td class="text-center">{{$dt->max_child}}</td>
              <td>
               @if ($dt->status === '0')
               <span class="label label-success"><b>Available</b></span>
               @elseif ($dt->status === '2')
               <span class="label label-warning"><b>Dirty</b></span>
               @else
               <span class="label label-danger">Used</span>
               @endif


             </td>
             <td class="text-center">


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
                     <form class="form-horizontal" method="POST" action="{{url('admin/room/'.$dt->id) }}" enctype="multipart/form-data">
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
              <form method="POST" action="{{url('admin/room/update/'.$dt->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-name" id="myModalLabel">Update Data</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
       <div class="col-md-8">
          <!-- general form elements -->
              <div class="box-body">
                 <div class="form-group">
                  <label for="name">Room No:</label>
                  <input type="hidden" name="id" value="{{$dt->id}}">
                  <input type="text" name="room_no" class="form-control" value="{{$dt->room_no}}"/>

                </div>

                <div class="form-group">
                  <label for="name">Room Type:</label>
                  <select class="form-control select2" name="room_type_id" style="width: 100%;">
                    <option selected value="{{$dt->room_type_id}}">{{$dt->roomtype->name}}</option>
                    @foreach($roomtypes as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="name">Floor:</label>
                  <select class="form-control select2" name="floor_id" style="width: 100%;">
                    <option selected value="{{$dt->floor_id}}">{{$dt->floor->name}}</option>
                    @foreach($floors as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="name">Maximum Adult</label>
                  <select class="form-control select2" name="max_adult" style="width: 100%;">
                   <option selected value="{{$dt->max_adult}}">{{$dt->max_adult}}</option>
                   <option value="1">1 Orang</option>
                   <option value="2">2 Orang</option>
                   <option value="3">3 Orang</option>
                   <option value="4">4 Orang</option>
                   <option value="5">5 Orang</option>
                 </select>

               </div>
               <div class="form-group">
                <label for="name">Maximum Child:</label>
                <select class="form-control select2" name="max_child" style="width: 100%;">
                 <option selected value="{{$dt->max_child}}">{{$dt->max_child}}</option>
                 <option value="1">1 Orang</option>
                 <option value="2">2 Orang</option>
                 <option value="3">3 Orang</option>
                 <option value="4">4 Orang</option>
                 <option value="5">5 Orang</option>
               </select>

             </div>
             </div>
           </div>
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
     <form method="POST" action="{{url('admin/room/store')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>Add Data</h4>
      </div>
      <div class="modal-body">
     <div class="row">
       <div class="col-md-8">
          <!-- general form elements -->

              <div class="box-body">
               <div class="form-group">
          <label for="name">Room No:</label>
          <input type="text" name="room_no" class="form-control"/>

        </div>
                <div class="form-group">
          <label for="name">Room Type:</label>
          <select class="form-control select2" name="room_type_id" style="width: 100%;">
            <option selected value="0">Select Type</option>
            @foreach($roomtypes as $key=>$type)
            <option value="{{$key}}">{{$type}}</option>
            @endforeach
          </select>

        </div>
        <div class="form-group">
          <label for="name">Floor:</label>
          <select class="form-control select2" name="floor_id" style="width: 100%;">
            <option selected value="0">Select Floor</option>
            @foreach($floors as $key=>$type)
            <option value="{{$key}}">{{$type}}</option>
            @endforeach
          </select>

        </div>
               <div class="form-group">
          <label for="name">Maximum Adult:</label>
          <select class="form-control select2" name="max_adult" style="width: 100%;">
            <option selected value="0">Pilih</option>
            <option value="1">1 Orang</option>
            <option value="2">2 Orang</option>
            <option value="3">3 Orang</option>
            <option value="4">4 Orang</option>
            <option value="5">5 Orang</option>
          </select>

        </div>
        <div class="form-group">
          <label for="name">Maximum Child:</label>
          <select class="form-control select2" name="max_child" style="width: 100%;">
            <option selected value="0">Pilih</option>
            <option value="1">1 Orang</option>
            <option value="2">2 Orang</option>
            <option value="3">3 Orang</option>
            <option value="4">4 Orang</option>
            <option value="5">5 Orang</option>
          </select>

        </div>
              </div>
              <!-- /.box-body -->
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
</section>
@endsection

@section('scripts')
<script>
  $(function () {
    $('#example1').DataTable({
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