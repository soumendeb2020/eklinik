<?php if($data['group'] == 'dependentSection'): ?>
    <label class="label col col-3">Result : </label>
    <div class="col col-9">
        <table class="table table-striped table-bordered table-hover" width="100%">
            <tbody>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <input onclick="changeData('<?php echo e($d->id); ?>')" type="radio" name="dtinp" value="1"> </td>
                    <td>
                        <div id="gtVal<?php echo e($d->id); ?>" data-sid="<?php echo e($d->HR_NO_PEKERJA); ?>" data-name="<?php echo e($d->HR_NAMA_TANGGUNGAN); ?>" data-ic="<?php echo e($d->HR_NO_KP); ?>"> 
                            Name: <?php echo e($d->HR_NAMA_TANGGUNGAN); ?> <br>
                            Staff Id: <?php echo e($d->HR_NO_PEKERJA); ?> <br>
                            Department: <br>
                            I/C: <?php echo e($d->HR_NO_KP); ?> <br>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php elseif($data['group'] == 'staffSection'): ?>
    <label class="label col col-3">Result : </label>
    <div class="col col-9">
        <table class="table table-striped table-bordered table-hover" width="100%">
            <tbody>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <input onclick="changeData('<?php echo e($d['id']); ?>')" type="radio" name="dtinp" value="1"> </td>
                    <td>
                        <div id="gtVal<?php echo e($d['id']); ?>" data-sid="<?php echo e($d['staffid']); ?>" data-name="<?php echo e($d['name']); ?>" data-dept="<?php echo e($d['department']); ?>" data-ic="<?php echo e($d['ic']); ?>"> 
                            Name: <?php echo e($d['name']); ?> <br>
                            Staff Id: <?php echo e($d['staffid']); ?> <br>
                            Department: <?php echo e($d['department']); ?><br>
                            I/C: <?php echo e($d['ic']); ?> <br>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<script>
    function changeData(dt){
        var msglist = document.getElementById("gtVal" + dt);
        var sid = msglist.getAttribute("data-sid");
        var name = msglist.getAttribute("data-name");
        var ic = msglist.getAttribute("data-ic");
        var dept = msglist.getAttribute("data-dept");
        $("#staff_id").val(sid);
        $("#icno").val(ic);
        $("#department_id").val(dept);
        $("#pname").val(name);
    }
    
    function changeStaffData(dt){
        //alert(dt);
        var msglist = document.getElementById("gtVal" + dt);
        var sid = msglist.getAttribute("data-sid");
        var name = msglist.getAttribute("data-name");
        var ic = msglist.getAttribute("data-ic");
        //alert(sid);
        $("#staff_id").val(sid);
        $("#icno").val(ic);
        $("#pname").val(name);
    }
</script>    

