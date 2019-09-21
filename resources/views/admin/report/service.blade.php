@extends('layouts.app')
@section('content')
<section class="content">
 <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
             <a href="#" class="btn btn-danger btn-alt border-orange font-orange btn-sm " onclick="printDiv('printableArea')">
            <i class="fa fa-print"></i>
            Print
        </a>
      </div>
      <!-- /.box-header -->
      <div class="box-body" id="printableArea">
         <h4 class="text-center">
           Room Report:
             <b>{{$from}}</b>
            sampai
            <b>{{$to}}</b>
         </h4>
         <table class="table table-bordered dt-responsive nowrap" id="dataTables-example">
                <thead>
                <tr>
          <th>#</th>
        <th>Date</th>
       <th>Operator</th>
       <th>Room No</th>
       <th>Products / Service</th>
       <th>Unit Price</th>
       <th>QTY</th>
       <th>Total</th>

                    </tr>
                </thead>
                <tbody>

          @foreach ($transactions as $key => $v)
     <tr>
      <td>{{$loop->iteration}}</td>
       <td>{{$v->created_at}}</td>
       <td>{{$v->user->name}}</td>
       <td>{{$v->roomtransaction->room->room_no}}</td>
       <td>{{$v->service->service_name}}</td>
       <td>{{$v->service->price_format}}</td>
       <td>{{$v->qty}}</td>
       <td>{{$v->total_format}}</td>

     </tr>
     @endforeach

    <tfoot>

            <tr style="background-color: #F8F9F9;border: 1px solid #ddd;">
                <td colspan="7" align="right">
                    <b>Final Total :</b>
                </td>
                <td>{{$total}}</td>
            </tr>


</tfoot>
        </tbody>
    </table>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</section>
@endsection

@section('scripts')
    @parent
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@stop