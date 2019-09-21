@extends('layouts.app')
@section('content')
<section class="content">
	<div class="box" id="check-out">
		<div class="box-header">
			<h3 class="box-title">Room No : <b>{{$transaction->room->room_no}}</b></h3>
		</div>
		<form action="{{url('admin/checkout/edit')}}" method="POST">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">

							<h4>{{$transaction->room->roomtype->name}}</h4>
							<ul class="list-unstyled">
								<li>Price / Night : <b>{{$transaction->room->roomtype->price_night_format}}</b></li>
								<li>Maximum Adult : <b>{{$transaction->room->max_adult}} Orang</b></li>
								<li>Maximum Child : <b>{{$transaction->room->max_child}} Orang</b></li>
							</ul>

					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="nomor_invoice" value="{{$transaction->invoice_id}}" readonly="">
						</div>
						<div class="form-group">
							<label>Guest Name</label>
							<input class="form-control" value="{{$transaction->guest->name}}" readonly="">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>The Number of Guests</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="{{$transaction->adult}} Adult" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="{{$transaction->child}} Child" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Check-In Date</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="{{date('Y-m-d',strtotime($transaction->checkin_date))}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="{{date('H:i:s',strtotime($transaction->checkin_date))}}" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Check-Out Date</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkout" class="form-control" name="tanggal_checkout" data-date-format="dd-mm-yyyy" value="{{date('Y-m-d',strtotime($transaction->checkout_date))}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="{{date('H:i:s',strtotime($transaction->checkout_date))}}" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
				<h3>Rincian Tagihan</h3>
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Service</th>
							<th class="pull-right">Price</th>
							<th class="text-center">Qty</th>
							<th class="pull-right">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Room reserved type : {{$transaction->room->roomtype->name}} ROOM</td>
							<td class="pull-right">{{$transaction->room->roomtype->price_night_format}}</td>
							<td class="text-center">{{$diffday ? $diffday : 1}} Days</td>
							<td class="pull-right">Rp. {{number_format($transaction->room->roomtype->price_night * ($diffday ? $diffday : 1)),2}}</td>
							<?php $sub_total = $transaction->room->roomtype->price_night * ($diffday ? $diffday : 1) ; ?>
						</tr>
						@foreach($service as $service)
						<tr>
							<td>{{$service->service->service_name}}</td>
							<td class="pull-right">{{$service->service->price_format}}</td>
							<td class="text-center">{{$service->qty.' '.$service->service->unit}}</td>
							<td class="pull-right">{{$service->total_format}}</td>
						</tr>
						@endforeach<tr>
							<td rowspan="5"></td>
							<td colspan="2"><b>Service Total</b></td>
							<td class="pull-right"><b>Rp. {{number_format($service_total,2)}}</b></td>
						</tr>
						<tr>
							<td colspan="2"><b>Room Total</b></td>
							<td class="pull-right"><b>Rp. {{number_format($sub_total,2)}}</b></td>
							<?php $room_total = $service_total + $sub_total ; ?>
						</tr>
						<tr>
							<td colspan="2"><b>Sub-Total</b></td>
							<td class="pull-right"><b>Rp. {{number_format($room_total,2)}}</b></td>
						</tr>

						<tr>
							<td colspan="2">Jumlah Deposit</td>
							<td class="text-red pull-right" >{{$transaction->deposite_format}}</td>
						</tr>
						<tr>

							<?php $final_total = $room_total - $transaction->deposite ; ?>

							<td colspan="2"><b>Grand Total</b></td>
							<td class="pull-right"><b>Rp {{number_format($final_total,2)}}</b></td>

						</tr>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id" value="{{$transaction->id}}">

				<button class="btn btn-success" type="submit" >Check Out</button>

				<a class="btn btn-primary" href="{{ url('admin/'.$title.'/invoice/'.$transaction->id) }}" target="_blank">Print Invoice</a>
				<a class="btn btn-warning" href="">Cancel</a>
			</div>
		</form>
	</div>
</section>
@endsection
