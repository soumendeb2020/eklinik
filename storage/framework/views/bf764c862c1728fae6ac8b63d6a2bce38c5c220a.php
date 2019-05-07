<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_'.$entity)): ?>
    <a href="<?php echo e(route($entity.'.edit', [str_singular($entity) => $id])); ?>" class="btn btn-sm btn-light">
        ✏️ Edit</a>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_'.$entity)): ?>
    <?php echo Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']); ?>

        <button type="submit" class="btn-delete btn btn-sm btn-light">
            ❌
        </button>
    <?php echo Form::close(); ?>

<?php endif; ?>
