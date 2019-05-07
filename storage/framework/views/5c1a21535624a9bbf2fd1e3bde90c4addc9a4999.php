<label class="label col col-3">Result : </label>
<div class="col col-9">
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="4"></td>
                <td>Name: <?php echo e($data['name']); ?></td>
            </tr>
            <tr>
                <td>Staff Id: <?php echo e($data['staffid']); ?></td>
            </tr>
            <tr>
                <td>Department: <?php echo e($data['department']); ?></td>
            </tr>
            <tr>
                <td>I/C: <?php echo e($data['ic']); ?></td>
            </tr>
            <!--
            <tr>
                <td colspan="2">Dependant: <?php echo e($data['dependent']); ?></td>
            </tr>
            -->
        </tbody>
    </table>
</div>