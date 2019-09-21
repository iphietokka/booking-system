@extends('layouts.app')
@section('content')
<section class="content">
	<div class="row" id="perusahaan">
		<div class="col-xs-12">
			<div class="box">
				<!-- /.box-header -->
				@foreach($company as $dt)
				<div class="box-body">
					<form method="POST" enctype="multipart/form-data" action="{{url('admin/company/update/'.$dt->id)}}">
						 {{ csrf_field() }}
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Hotel Name</label>
											<input type="hidden" name="id" value="{{$dt->id}}">
											<input class="form-control" name="name" placeholder="Nama Pengguna"  value="{{$dt->name}}">

										</div>
										<div class="col-sm-6">
											<label>Nama Perusahaan</label>
											<input class="form-control" name="company_name" placeholder="perusahaanname"  value="{{$dt->company_name}}">

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Address</label>
											<textarea class="form-control" name="address" placeholder="Alamat" rows="3">{{$dt->address}}</textarea>

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label>Phone</label>
											<input class="form-control" name="phone" value="{{$dt->phone}}">

										</div>
										<div class="col-sm-3">
											<label>Website</label>
											<input class="form-control" name="Website"  value="{{$dt->website}}">

										</div>
										<div class="col-sm-3">
											<label>Email</label>
											<input type="email" class="form-control" name="email" value="{{$dt->email}}">

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary pull-right">Save changes</button>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>

		</div>

	</section>
	@endsection
