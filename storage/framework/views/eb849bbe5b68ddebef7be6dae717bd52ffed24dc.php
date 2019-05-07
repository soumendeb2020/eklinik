<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>


<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="true">
        <header>
                 <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Users Setting</h2>

        </header>
            <div>   <!-- widget div-->

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
 <div class="widget-body">

    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">Total : <?php echo e($result->total()); ?> <?php echo e(str_plural('User', $result->count())); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_users')): ?>
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                <th class="text-center">Actions</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->roles->implode('name', ', ')); ?></td>
                    <td><?php echo e($item->created_at->toFormattedDateString()); ?></td>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                    <td class="text-center">
                        <?php echo $__env->make('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-center">
            <?php echo e($result->links()); ?>

        </div>
    </div>

</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>