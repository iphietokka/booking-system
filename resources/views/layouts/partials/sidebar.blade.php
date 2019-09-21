<section class="sidebar" id="nav">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master Booking</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/checkin')}}"><i class="fa fa-circle-o"></i> Checkin</a></li>
            <li><a href="{{url('admin/checkout')}}"><i class="fa fa-circle-o"></i> Checkout</a></li>
           {{--  <li><a href="{{url('admin/checkin/list')}}"><i class="fa fa-circle-o"></i> Booking List</a></li> --}}
            <li><a href="{{url('admin/checkin/list')}}"><i class="fa fa-circle-o"></i> Booking Data</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Master Service</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/service-transaction')}}"><i class="fa fa-circle-o"></i> Order Service</a></li>
            <li><a href="{{url('admin/service')}}"><i class="fa fa-circle-o"></i> Service List</a></li>
            <li><a href="{{url('admin/service-category')}}"><i class="fa fa-circle-o"></i> Service Category</a></li>
            <li><a href="{{ url('admin/cleaning-room') }}"><i class="fa fa-circle-o"></i> Room Clean</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master Room</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/room')}}"><i class="fa fa-circle-o"></i> Room List</a></li>
            <li><a href="{{url('admin/room-type')}}"><i class="fa fa-circle-o"></i> Room Type</a></li>
            <li><a href="{{url('admin/floor')}}"><i class="fa fa-circle-o"></i> Floor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/user')}}"><i class="fa fa-circle-o"></i> User</a></li>
            <li><a href="{{url('admin/guest')}}"><i class="fa fa-circle-o"></i> Guest</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/company') }}"><i class="fa fa-circle-o"></i> Company</a></li>
            <li><a href="{{ url('admin/company/backup') }}"><i class="fa fa-circle-o"></i> DB Backup</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('admin/news') }}">
            <i class="fa fa-table"></i> <span>News</span>
          </a>
        </li>
        <li>
          <a href="{{ url('admin/report') }}">
            <i class="fa fa-calendar"></i> <span>Report</span>
          </a>
        </li>
      </ul>
    </section>