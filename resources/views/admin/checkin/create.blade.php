@extends('layouts.app')
@section('content')
<section class="content">
	<div class="box" id="checkin">
		<div class="box-header">
			<h3 class="box-title">ROOM NO : <b>{{$room->room_no}}</b></h3>
		</div>
		<form method="POST" enctype="multipart/form-data" action="{{url('admin/checkin/store')}}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="invoice_id" value="{{$no_invoice}}" readonly>
						</div>

						<h4>Room Type:<b> {{$room->roomtype->name}}</b></h4>
						<ul class="list-unstyled">
							<li>Price / Night : <b>{{$room->roomtype->price_night_format}}</b></li>
							<li>Maximum Adult : <b>{{$room->max_adult}} Guest</b></li>
							<li>Maximum Child : <b>{{$room->max_child}} Guest</b></li>
						</ul>

					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Guest Name</label>
							<select id="e9" class="form-control select2" name="guest_id">
								<option selected="selected" value="0">-- Select --</option>
								@foreach($guest as $key=>$value)
								<option value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>

						</div>
						<div class="well">
							<a href="{{url('admin/guest')}}"><b>Click here</b></a> to add guests
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>The Number of Guests</label>
							<div class="row">
								<div class="col-sm-6">
									<select class="form-control select2" name="adult" v-model="dataInput.jumlah_dewasa">
										<option value="0">- Select Adult -</option>
										@for($i= 1;$i <= $room->max_adult;$i++)
										<option value="{{$i}}">{{$i}} Orang</option>
										@endfor
									</select>

								</div>
								<div class="col-sm-6">
									<select class="form-control select2" name="child" v-model="dataInput.jumlah_anak">
										<option value="0">- Select Child -</option>
										@for($i= 1;$i <= $room->max_child;$i++)
										<option value="{{$i}}">{{$i}} Orang</option>
										@endfor
									</select>

								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Check-In Date</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="checkin_date" value="{{date('Y-m-d')}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="time_checkin" value="{{date('h:i')}}" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Check-Out Date</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="datepicker" class="form-control" name="checkout_date" data-date-format="yyyy-mm-dd" readonly>
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="time_checkout" value="12:00" readonly >
								</div>
							</div>
						</div>
						<div class="row">
						<div class="form-group">
							<div class="col-sm-6">
							<label>Deposite Ammount (Rp)</label>
							<input type="number" class="form-control" name="deposite">
							</div>


							<div class="col-sm-6">
							<label>Payment Method</label>
							<select class="form-control select2" name="method" id='jenis-bayar' >
								<option value="0">- Select -</option>
								<option value="Cash">Cash</option>
								<option value="Credit Card">Credit Card</option>
							</select>

							</div>
							<div id="inputs" class="col-sm-6"></div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="box-footer" align="center">
				<input type="hidden" name="room_id" value="{{$room->id}}">
				<button class="btn btn-success" type="submit">Check In</button>
				<a class="btn btn-danger" href="{{url('admin/checkin')}}">Cancel</a>
			</div>
		</form>
	</div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $('#jenis-bayar').change(function () {
        var selectedItem = $(this).val();
        if (selectedItem === 'Credit Card') {
            if (!$('#other-field').length) {
                $('<input type="text" name="credit_no" id="other-field" class="form-control" placeholder="Enter Card Number">').appendTo('#inputs');
            }
        }
    });
});
 $('#datepicker').datepicker({
     autoclose: true
   });
 $('.select2').select2()
</script>
@endsection
