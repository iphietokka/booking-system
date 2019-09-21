@extends('layouts.app')
@section('content')

  <section class="content">
<div class="row">
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
       <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bed"></i></span>
            <div class="info-box-content">
                        <span class="info-box-text">Avail Room</span>
                        <span class="info-box-number">{{$avail_room}}</span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        <a href="{{ url('admin/room/avail') }}" style="color: white;">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </span>
                      </div>


          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
       <div class="info-box bg-orange">
            <span class="info-box-icon"><i class="fa fa-bed"></i></span>
            <div class="info-box-content">
                        <span class="info-box-text">Used Room</span>
                        <span class="info-box-number">{{$used_room}}</span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        <a href="{{ url('admin/room/used') }}" style="color: white;">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </span>
                      </div>


          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
       <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-bed"></i></span>
            <div class="info-box-content">
                        <span class="info-box-text">Dirty Room</span>
                        <span class="info-box-number">{{$dirty_room}}</span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        <a href="{{ url('admin/room/dirty') }}" style="color: white;">
                            More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </span>
                      </div>


          </div>
        </div>




      </div>
<!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Check In List</h3>
        </div>
        <div class="box-body">
          <table class="table table-sriped">
            <thead>
              <tr>
                <th>Guest Name</th>
                <th>#Room</th>
                <th>Check-In Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($guests as $guest)
              <tr>
                <td>{{$guest->guest->name}}</td>
                <td>{{$guest->room->room_no}}</td>
                <td>{{$guest->checkin_date}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Check Out Time <small>(Today)</small></h3>
        </div>
        <div class="box-body">
          <table class="table table-sriped">
            <thead>
              <tr>
                <th>Guest Name</th>
                <th>#Room</th>
                <th>Checkout Date</th>
              </tr>
            </thead>
            <tbody>

              @foreach($guest_checkout as $guest)
              <tr>
                <td>{{$guest->guest->nama}}</td>
                <td>{{$guest->room->room_no}}</td>
                <td>{{$guest->checkout_date}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
<div class="row">
  <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">News</h3>
        </div>
        <div class="box-body">
          <ul class="list-unstyled">
            @foreach($news as $new)
            <li>
              <h4>
                <a href="#" data-toggle="modal" data-target="#edit_modal{{$new->id}}" ><b>{{$new->title}}</b></a> <span class="badge {{$new->status == 0 ? 'bg-green' : 'bg-red' }}">{{$new->status_text}}</span><br>
                <span class="small">By : <b>{{$new->user->name}}</b> - {{date('Y-m-d H:i',strtotime($new->created_at))}}</span>
              </h4>
              <hr>
            </li>
            <div class="modal fade" id="edit_modal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">{{$new->title}}</h4><br>
                <small>By: <b>{{$new->user->name}}</b> | Created at: {{date('Y-m-d H:i',strtotime($new->created_at))}}</small> |
                       @if ($new->status == '0')
                 <span class="label label-success"><b>NORMAL</b></span>
                 @elseif ($new->status == '1')
                 <span class="label label-danger"><b>URGENT</b></span>
                 @else
                 <span class="label label-danger"></span>
                 @endif
              </div>
               <div class="modal-body">
                <p>{{$new->content_news}}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            @endforeach
          </ul>
          <a href="" class="btn btn-primary btn-sm pull-right">Seel All </a>
        </div>
      </div>
    </div>

</div>
        </section>

@endsection