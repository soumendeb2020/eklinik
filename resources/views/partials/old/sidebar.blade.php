@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
           @auth()
                            @can('view_posts')
                                <li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('posts.index') }}">
                                        <i class="fa fa-briefcase"></i>
                                         Queue Mgmnt System
                                    </a>
                                </li>
                            @endcan

                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-key"></i>
                                        Consultations
                                    </a>
                                </li>
                            @endcan
                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-folder-open"></i>
                                        Laboratory
                                    </a>
                                </li>
                            @endcan
                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-lock"></i>
                                        TY2
                                    </a>
                                </li>
                            @endcan
                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-globe"></i>
                                        Inventory
                                    </a>
                                </li>
                            @endcan
                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-laptop"></i>
                                        Dispensary
                                    </a>
                                </li>
                            @endcan
                            @can('view_consultation')
                                <li class="nav-item {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('consultations.index') }}">
                                        <i class="fa fa-inbox"></i>
                                        Reports
                                    </a>
                                </li>
                            @endcan

               <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span class="title">Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>             


           <!--  <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Setting</span>
                </a> -->
                <ul class="treeview-menu">
                       
                            @can('view_users')
                                <!-- <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}"> -->
                                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <i class="fa fa-user"></i>
                                        Users
                                    </a>
                                </li>
                            @endcan

                           

                             @can('view_roles')
                                <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('roles.index') }}">
                                        <i class="fa fa-briefcase"></i>
                                        Roles
                                    </a>
                                </li>
                            @endcan
                            @endauth

                            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                            <a href="{{ route('auth.change_password') }}">
                            <i class="fa fa-key"></i>
                            <span class="title">Change password</span>
                            </a>              
                            </li>
                            
                        
                    </ul>

            </li>
            
      

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                   
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
