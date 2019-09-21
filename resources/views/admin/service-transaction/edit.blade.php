@extends('layouts.app')
@section('content')
<section class="content">
<div class="box" id="layanan">
<div class="box-header">
<h3 class="box-title">PESANAN KAMAR :
<b>{{$guest->room->room_no}}</b> -
<b>{{$guest->guest->name}}</b>
</h3>
<a class="btn btn-warning pull-right" href="{{url('admin/service-transaction')}}">Cancel</a>
</div>
<div class="box-body">
<!-- Pilih Produk Layanan -->
<!-- Pilih Kategori Layanan -->
<div class="row">
@foreach($servicecategory as $service)
<div class="col-sm-3">
<a href="" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#tambah-data{{$service->id}}">{{$service->name}}</a>
</div>

<div class="modal fade" id="tambah-data{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form method="POST" enctype="multipart/form-data" action="{{url('admin/service-transaction/store')}}">
{{ csrf_field() }}

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-name" id="myModalLabel">Order Service</h4>
</div>
<div class="modal-body">
<table class="table table-striped table-hover" id="purchaseInvoice">
	<thead>
		<tr>
			<th>Nama Produk / Layanan</th>
			<th>Harga</th>
			<th>Jumlah Pesanan</th>
		</tr>
	</thead>
	<tbody>

		@foreach($services as $serv)
		@if ($serv->service_category_id == $service->id)
		<tr>
			<td><input type="hidden" name="service_id" value="{{$serv->id}}">{{$serv->service_name}}</td>
			<td><input class="form-control" type="hidden" name="price" id="hb" value="{{number_format($serv->price)}}">Rp.{{number_format($serv->price)}}</td>
			<td>
				<div class="row">
					<div class="col-sm-4">
						<input type="text" class="form-control" name="qty">
						<input class="form-control"  type="hidden" name="total">
					</div>
					<div class="col-sm-8">

					</div>
				</div>
			</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
</div>
<div class="modal-footer">
<input type="hidden" name="room_transaction_id" value="{{$guest->id}}">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
@endforeach
</div>
</div>


</div>
</section>


@endsection


