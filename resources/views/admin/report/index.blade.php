@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">


              <h3 class="box-title">Report's</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button class="btn btn-default" data-toggle="modal" data-target="#sellsModal">Room Report</button>
            <button class="btn btn-default" data-toggle="modal" data-target="#purchaseModal">Service Report</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>

</section>
                <!-- end row -->

                <!-- Modal for sells-->
  <div class="modal fade bs-example-modal-center" id="sellsModal" tabindex="-1" role="dialog" >

    <form method="POST" action="{{url('admin/report/room')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Room Report</h4>
        </div>
        <div class="modal-body">
 <div class="row">
                            <div class="col-sm-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">From</label>
                                        <input type="text" class="form-control" id="datepicker1" placeholder="Select Date"
                                            name="from">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">To</label>
                                        <input type="text" class="form-control" id="datepicker2" placeholder="Select Date"
                                            name="to">
                                    </div>
                                </div>
                            </div>
                        </div>

		</div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">View</button>
          </div>
        </div>
      </div>
   </form>
    </div>
  </div>
  <!-- sells modal Ends Here -->

     <!-- Modal for sells-->
  <div class="modal fade bs-example-modal-center" id="purchaseModal" tabindex="-1" role="dialog" >

    <form method="POST" action="{{url('admin/report/service')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Sells Report</h4>
        </div>
        <div class="modal-body">
 <div class="row">
                            <div class="col-sm-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">From</label>
                                        <input type="text" class="form-control" id="datepicker3" placeholder="Select Date"
                                            name="from">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">To</label>
                                        <input type="text" class="form-control" id="datepicker4" placeholder="Select Date"
                                            name="to">
                                    </div>
                                </div>
                            </div>
                        </div>

        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">View</button>
          </div>
        </div>
      </div>
   </form>
    </div>
  </div>
  <!-- sells modal Ends Here -->
@endsection

@section('scripts')
<script>
 $('#datepicker1').datepicker({
     autoclose: true
   });
  $('#datepicker2').datepicker({
     autoclose: true
   });
   $('#datepicker3').datepicker({
     autoclose: true
   });
    $('#datepicker4').datepicker({
     autoclose: true
   });
</script>
@endsection