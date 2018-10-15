
  <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        @include('admin.layouts.menu')
      </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('/design/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{admin()->user()->name}}</p>
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
        <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>{{ trans('admin.dashboard') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="{{ admin_url('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class=""><a href="{{ admin_url('settings') }}">
          <i class="fa fa-cog"></i> <span>{{ trans('admin.settings') }}</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
    </ul>
  </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Admin Accounts</span>
           
              @if(direction()=='ltr')
               <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              @else
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
              @endif
            
          </a>
          <ul class="treeview-menu">
           
            <li><a href="{{admin_url('admin')}}"><i class="fa fa-users"></i>Admin Accounts</a></li>
          </ul>
        </li>
        
        
        
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users Accounts</span>
           
              @if(direction()=='ltr')
               <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              @else
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
              @endif
            
          </a>
          <ul class="treeview-menu">
           
            <li><a href="{{admin_url('user')}}"><i class="fa fa-users"></i>Users Accounts</a></li>
            <li><a href="{{admin_url('user?level=user')}}"><i class="fa fa-users"></i>Users</a></li>
            <li><a href="{{admin_url('user?level=vendor')}}"><i class="fa fa-users"></i>Vendors</a></li>
            <li><a href="{{admin_url('user?level=company')}}"><i class="fa fa-users"></i>Companies</a></li>
          </ul>
        </li>


        <li class=" treeview">
          <a href="#">
            <i class="fa fa-flag"></i> <span>Countries</span>
           
              @if(direction()=='ltr')
               <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              @else
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
              @endif
            
          </a>
          <ul class="treeview-menu">
           
            <li><a href="{{admin_url('countries')}}"><i class="fa fa-flag"></i>Countries</a></li>
            <li><a href="{{admin_url('countries/create')}}"><i class="fa fa-plus"></i>Add Country</a></li>
            
          </ul>
        </li>


        <li class=" treeview">
          <a href="#">
            <i class="fa fa-flag"></i> <span>Cities</span>
           
              @if(direction()=='ltr')
               <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              @else
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
              @endif
            
          </a>
          <ul class="treeview-menu">
           
            <li><a href="{{admin_url('cities')}}"><i class="fa fa-flag"></i>Cities</a></li>
            <li><a href="{{admin_url('cities/create')}}"><i class="fa fa-plus"></i>Add City</a></li>
            
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>