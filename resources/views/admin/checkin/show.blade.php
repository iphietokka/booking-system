@extends('layouts.app')
@section('content')
<section class="content">
	<div class="box">
		<div class="box-body">
			<table id="example1" class="table table-striped">
				<thead>
					<tr>
						<th># Room</th>
						<th>Guest</th>
						<th>Check-In Date</th>
						<th>Check-Out Date</th>
						<th>Total Deposite</th>
						<th>Method</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $guests)
					<tr>
						<td>{{$guests->room->room_no}}</td>
						<td>{{$guests->guest->name}}</td>
						<td>{{date('Y-m-d',strtotime($guests->checkin_date))}}</td>
						<td>{{date('Y-m-d',strtotime($guests->checkout_date))}}</td>
						<td>{{$guests->deposite_format}}</td>
						<td>{{$guests->method}}</td>
						<td style="color: red">
							@if($guests->status === 1)
						<span class="label label-info"> Checkin</span>
							@else
						<span class="label label-danger"> Checkout</span>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection