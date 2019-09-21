@extends('layouts.app')
@section('content')
<section class="content">
	<div class="box">
		<div class="box-body">
			<div class="row">
				@foreach($data as $room)
				<div class="col-md-3 col-sm-6 col-xs-12">
					@if ($room->roomtype->name === 'Standart')
					<div class="info-box bg-green">
						<span class="info-box-icon"><i class="fa fa-bed"></i></span>
						@elseif ($room->roomtype->name === 'Superior')
						<div class="info-box bg-blue">
							<span class="info-box-icon"><i class="fa fa-bed"></i></span>
							@elseif ($room->roomtype->name === 'Deluxe')
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="fa fa-bed"></i></span>
								@elseif ($room->roomtype->name === 'Junior Suite')
								<div class="info-box bg-orange">
									<span class="info-box-icon"><i class="fa fa-bed"></i></span>
									@elseif ($room->roomtype->name === 'Suite')
									<div class="info-box bg-maroon">
										<span class="info-box-icon"><i class="fa fa-bed"></i></span>
										@elseif ($room->roomtype->name === 'Presidential')
										<div class="info-box bg-red">
											<span class="info-box-icon"><i class="fa fa-bed"></i></span>
											@endif
											<div class="info-box-content">
												<span class="info-box-text">{{$room->roomtype->name}}</span>
												<span class="info-box-number">{{$room->room_no}}</span>
												<div class="progress">
													<div class="progress-bar" style="width: 100%"></div>
												</div>
												<span class="progress-description">
													<a href="{{ url('admin/'.$title.'/create/'.$room->id) }}" style="color: white;">
														Select Room <i class="fa fa-arrow-circle-right"></i>
													</a>
												</span>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</section>
					@endsection