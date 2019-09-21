@extends('layouts.app')
@section('content')
<section class="content">
	<div class="box">
		<div class="box-body">
			@forelse($room as $rooms)
			<div class="col-sm-3">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{$rooms->room_no}}</h3>
						<p>{{$rooms->roomtype->name}}</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
<form method="POST" action="{{url('admin/cleaning-room/update/'.$rooms->id)}}" enctype="multipart/form-data" class="small-box-footer">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$rooms->id}}">
						<button type="submit" class="btn btn-default">Clean</button>
					</form>
				</div>
			</div>
			@empty

			<h4 class="text-center"><b>Sorry!! <br>
			For A While, There are No Rooms Dirty.</b></h4>


			@endforelse
		</div>
	</div>
</section>
@endsection