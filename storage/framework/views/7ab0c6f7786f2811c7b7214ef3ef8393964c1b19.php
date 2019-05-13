<?php if($data['group'] == 'dependentSection'): ?>
<label class="cel-gap label col-xs-12">Result : </label>
<?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="cel-gap col-xs-12">
    <div id="gtVal<?php echo e($d['id']); ?>" data-sid="<?php echo e($d['staffid']); ?>" data-name="<?php echo e($d['name']); ?>" data-dept="<?php echo e($d['department']); ?>" data-deptid="<?php echo e($d['departmentid']); ?>" data-ic="<?php echo e($d['ic']); ?>" data-rel="<?php echo e($d['related']); ?>"></div>
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td width="90" rowspan="5">
                    <input onclick="changeStaffData('<?php echo e($d['id']); ?>')" type="radio" name="dtinp" value="1"><br>
                    <img src="https://via.placeholder.com/80" alt="" />
                </td>
                <td width="90">Name:</td>
                <td><?php echo e($d['name']); ?></td>
            </tr>
            <tr>
                <td>Staff Id:</td>
                <td><?php echo e($d['staffid']); ?></td>
            </tr>
            <tr>
                <td>Department:</td>
                <td><?php echo e($d['department']); ?></td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td><?php echo e($d['ic']); ?></td>
            </tr>  
            <tr>
                <td>Related:</td>
                <td><?php echo e($d['related']); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif($data['group'] == 'staffSection'): ?>
<label class="cel-gap label col-xs-12">Result : </label>
<?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="cel-gap col-xs-12">
    <div id="gtVal<?php echo e($d['id']); ?>" data-sid="<?php echo e($d['staffid']); ?>" data-name="<?php echo e($d['name']); ?>" data-dept="<?php echo e($d['department']); ?>" data-deptid="<?php echo e($d['departmentid']); ?>" data-ic="<?php echo e($d['ic']); ?>" data-rel="<?php echo e($d['related']); ?>"></div>
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="5">
                    <input onclick="changeStaffData('<?php echo e($d['id']); ?>')" type="radio" name="dtinp" value="1"><br>
                    <img src="https://via.placeholder.com/80" alt="" />
                </td>
                <td>Name:</td>
                <td><?php echo e($d['name']); ?></td>
            </tr>
            <tr>
                <td>Staff Id:</td>
                <td><?php echo e($d['staffid']); ?></td>
            </tr>
            <tr>
                <td>Department:</td>
                <td><?php echo e($d['department']); ?></td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td><?php echo e($d['ic']); ?></td>
            </tr>  
            <tr>
                <td>Related:</td>
                <td><?php echo e($d['related']); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif($data['group'] == 'otherSection'): ?>
<label class="cel-gap label col-xs-12">Result : </label>
<?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="cel-gap col-xs-12">
    <div id="gtVal<?php echo e($d['id']); ?>" data-sid="<?php echo e($d['staffid']); ?>" data-name="<?php echo e($d['name']); ?>" data-dept="<?php echo e($d['department']); ?>" data-deptid="<?php echo e($d['departmentid']); ?>" data-ic="<?php echo e($d['ic']); ?>" data-rel="<?php echo e($d['related']); ?>"></div>
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="2">
                    <input onclick="changeStaffData('<?php echo e($d['id']); ?>')" type="radio" name="dtinp" value="1"><br>
                    <img src="https://via.placeholder.com/80" alt="" />
                </td>
                <td>Name:</td>
                <td><?php echo e($d['name']); ?></td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td><?php echo e($d['ic']); ?></td>
            </tr>  
        </tbody>
    </table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script>
    function changeData(dt){
        var msglist = document.getElementById("gtVal" + dt);
        var sid = msglist.getAttribute("data-sid");
        var name = msglist.getAttribute("data-name");
        var ic = msglist.getAttribute("data-ic");
        var deptid = msglist.getAttribute("data-deptid");
        var dept = msglist.getAttribute("data-dept");
        
        
        $("#staff_id").val(sid);
        $("#icno").val(ic);
        $("#pname").val(name);
        $("#department_id").val(deptid);
        $("#departmentname").val(dept);
    }
    
    function changeStaffData(dt){
        var msglist = document.getElementById("gtVal" + dt);
        var sid = msglist.getAttribute("data-sid");
        var name = msglist.getAttribute("data-name");
        var ic = msglist.getAttribute("data-ic");
        var deptid = msglist.getAttribute("data-deptid");
        var dept = msglist.getAttribute("data-dept");
        
        $("#staff_id").val(sid);
        $("#icno").val(ic);
        $("#pname").val(name);
        $("#department_id").val(deptid);
        $("#departmentname").val(dept);
    }
</script>    

