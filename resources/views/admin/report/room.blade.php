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
                <th>Invoice No</th>
                <th>Price</th>
                <th>Deposite</th>
               <th>Total Price</th>

                    </tr>
                </thead>
                <tbody>

            @foreach($transactions as $transaction)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$transaction->created_at}}</td>
                    <td class="text-center">{{$transaction->invoice_id}}</td>
                    <td class="text-center">Rp{{number_format($transaction->room->roomtype->price_night,2)}}</td>
                    <td class="text-center">Rp{{number_format($transaction->deposite,2)}}</td>
                    <td class="text-center">{{$transaction->price_total_format}}</td>
                    </tr>

            @endforeach

    <tfoot>
    <tr style="background-color: #F8F9F9; border: 1px solid #ddd;">
                <td colspan="5" align="right">
                    <b>Total Deposit :</b>
                </td>
                <td>
                   Rp{{number_format($total_deposite,2)}}

                </td>
            </tr>



            <tr style="background-color: #F8F9F9;border: 1px solid #ddd;">
                <td colspan="5" align="right">
                    <b>Total Biaya :</b>
                </td>
                <td>Rp{{number_format($price_total,2)}}</td>
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