<!-- Title of Post Form Input -->
<div class="form-group <?php if($errors->has('title')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('title', 'Title'); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title of Post']); ?>

    <?php if($errors->has('title')): ?> <p class="help-block"><?php echo e($errors->first('title')); ?></p> <?php endif; ?>
</div>

<!-- Text body Form Input -->
<div class="form-group <?php if($errors->has('body')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('body', 'Body'); ?>

    <?php echo Form::textarea('body', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Body of Post...']); ?>

    <?php if($errors->has('body')): ?> <p class="help-block"><?php echo e($errors->first('body')); ?></p> <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php $__env->stopPush(); ?>