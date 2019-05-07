<?php $__env->startSection('title', 'Roles & Permissions'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            <?php echo Form::open(['method' => 'post']); ?>


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="roleModalLabel">Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- name Form Input -->
                    <div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                        <?php echo Form::label('name', 'Name'); ?>

                        <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']); ?>

                        <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <!-- Submit Form Button -->
                    <?php echo Form::submit('Submit', ['class' => 'btn btn-primary']); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
        <header>
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Roles</h2>

                                    </header>
               <div>   <!-- widget div-->

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
<div class="widget-body">                                    
    <div class="row">
        <div class="col-md-5">
            <h3>Roles and Permissions Settings</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_roles')): ?>
                <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
            <?php endif; ?>
        </div>
    </div>




    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']); ?>


        <?php if($role->name === 'Admin'): ?>
            <?php echo $__env->make('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'options' => ['disabled'] ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'model' => $role ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_roles')): ?>
                <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

            <?php endif; ?>
        <?php endif; ?>

        <?php echo Form::close(); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    <?php endif; ?>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>