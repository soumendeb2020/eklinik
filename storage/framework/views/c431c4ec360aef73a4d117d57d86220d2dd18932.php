<?php $request = app('Illuminate\Http\Request'); ?>

<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="<?php echo e(asset('img/avatars/sunny.png')); ?>" alt="me" class="online" /> 
                <span>
                    <?php echo e(auth()->user()->name); ?> 
                    <!-- <span class="badge badge-warning"><?php echo e(auth()->user()->roles->first()->name); ?>

                    </span> -->
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <!-- 
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li class="active open">
                <a href="<?php echo e(route('home')); ?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
                <!-- <ul style="display: block;">
                        <li class="active">
                                <a href="/index" title="Dashboard"><span class="menu-item-parent">Analytics Dashboard</span></a>
                        </li>
                </ul>	 -->
            </li>


            <?php if(auth()->guard()->check()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_queue')): ?>
            <li class="top-menu-invisible">
                <a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Queue System</span></a>
                <ul>
                    <li class="">
                        <a href="" title="Dashboard"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">App Layouts</span></a>
                    </li>
                    <li class="">
                        <a href="skins.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Prebuilt Skins</span></a>
                    </li>
                    <li>
                        <a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_registration')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-list txt-color-green"></i> <span class="menu-item-parent">Registration</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('registrations.index')); ?>">Patient Registration</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('registrations.index')); ?>">Patient List</a>
                    </li>

                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_consultation')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o txt-color-red"></i> <span class="menu-item-parent">Consultation</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('consultations.index')); ?>">Patient List</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('consultations.index')); ?>">Consultation History</a>
                    </li>

                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_laboratory')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table txt-color-yellow"></i> <span class="menu-item-parent">Laboratory</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('laboratory.index')); ?>">Patient List</a>
                    </li>
                    <!--
                    <li>
                        <a href="<?php echo e(route('laboratory.index')); ?>">Data Tables <span class="badge inbox-badge bg-color-greenLight hidden-mobile">responsive</span></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('laboratory.index')); ?>">Jquery Grid</a>
                    </li>
                    -->
                </ul>
            </li> 
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_ty2')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o txt-color-orange" ></i> <span class="menu-item-parent">TY2</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('ty2.index')); ?>">TY2 List</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ty2.index')); ?>">History</a>
                    </li>

                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_dispensary')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-cloud txt-color-purple"></i> <span class="menu-item-parent">Dispensary</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('dispensary.index')); ?>"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">List</span></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('dispensary.index')); ?>"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">History</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_inventory')): ?>	
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece txt-color-yellow"></i> <span class="menu-item-parent">Inventory</span></a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('inventory.index')); ?>"><i class="fa fa-file-text-o"></i> Inventory Status</a>
                    </li>	
                    <li>
                        <a href="<?php echo e(route('inventory.index')); ?>"><i class="fa fa-paragraph"></i> Inventory History</a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('inventory.index')); ?>"><i class="fa fa-search"></i>  Search Page</a>
                    </li>
                </ul>		
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_report')): ?>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart txt-color-red"></i> <span class="menu-item-parent">Reports</span></a>
                <ul>
                    <li><a href="<?php echo e(route('reports.index')); ?>">Patient Reports</a></li>
                    <li><a href="<?php echo e(route('reports.index')); ?>">Consultation Reports</a></li>
                    <li><a href="<?php echo e(route('reports.index')); ?>">Inventory Reports</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_setting')): ?>	
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-windows txt-color-blue"></i> <span class="menu-item-parent">Settings</span></a>
                <ul>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                    <li>
                        <a href="<?php echo e(route('users.index')); ?>">Users</a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles')): ?>
                    <li>
                        <a href="<?php echo e(route('roles.index')); ?>">Roles</a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="lock.html" target="_top">Email setting</a>
                    </li>
                    <li>
                        <a href="invoice.html">Audit Trail</a>
                    </li>

                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>