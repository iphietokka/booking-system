@extends('layouts.app')
@section('content')
<section class="content">
<div class="box">
	<div class="box-body">
		<div class="row">
		@forelse($guest as $service)
			<div class="col-sm-3">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>{{$service->room->room_no}}</h3>
						<p>{{$service->guest->name}}</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<a class="small-box-footer" href="{{url('admin/service-transaction/show/'.$service->id)}}">Enter Service Order</a>
				</div>
			</div>
				@empty

									<h4 class="text-center"><b>Sorry!! <br>
									For a while, No Transaction Request.</b></h4>
		@endforelse
	</div>
</div>
</section>
@endsection