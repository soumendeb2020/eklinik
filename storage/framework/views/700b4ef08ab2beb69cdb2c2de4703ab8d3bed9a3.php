<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_dashboard'); ?></span>
                </a>
            </li>
           <?php if(auth()->guard()->check()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts')): ?>
                                <li class="nav-item <?php echo e(Request::is('posts*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('posts.index')); ?>">
                                        <i class="fa fa-briefcase"></i>
                                         Queue Mgmnt System
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-key"></i>
                                        Consultations
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-folder-open"></i>
                                        Laboratory
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-lock"></i>
                                        TY2
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-globe"></i>
                                        Inventory
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-laptop"></i>
                                        Dispensary
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
                                <li class="nav-item <?php echo e(Request::is('consultations*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                                        <i class="fa fa-inbox"></i>
                                        Reports
                                    </a>
                                </li>
                            <?php endif; ?>

               <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span class="title">Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>             


           <!--  <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Setting</span>
                </a> -->
                <ul class="treeview-menu">
                       
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                                <!-- <li class="nav-item <?php echo e(Request::is('users*') ? 'active' : ''); ?>"> -->
                                    <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                                        <i class="fa fa-user"></i>
                                        Users
                                    </a>
                                </li>
                            <?php endif; ?>

                           

                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles')): ?>
                                <li class="nav-item <?php echo e(Request::is('roles*') ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                                        <i class="fa fa-briefcase"></i>
                                        Roles
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php endif; ?>

                            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('auth.change_password')); ?>">
                            <i class="fa fa-key"></i>
                            <span class="title">Change password</span>
                            </a>              
                            </li>
                            
                        
                    </ul>

            </li>
            
      

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_logout'); ?></span>
                </a>
            </li>
        </ul>
        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                   
    </section>
</aside>
<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit"><?php echo app('translator')->getFromJson('global.logout'); ?></button>
<?php echo Form::close(); ?>

