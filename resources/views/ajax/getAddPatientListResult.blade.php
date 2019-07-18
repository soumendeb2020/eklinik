<label class="cel-gap label col-xs-12">Result : </label>
<div class="cel-gap col-xs-12">
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <?php if($data['related'] != ''){ ?>
                    <td rowspan="3"><img src="https://via.placeholder.com/80" alt="" /></td>
                <?php } else { ?>
                    <td rowspan="3"><img src="https://via.placeholder.com/80" alt="" /></td>
                <?php } ?>
                <td>Name:</td>
                <td>{{$data['name']}}</td>
            </tr> 
            <tr>
                <td>I/C:</td>
                <td>{{$data['ic']}}</td>
            </tr>
            <?php if($data['related'] != ''){ ?>
            <tr>
                <td>Related:</td>
                <td>{{$data['related']}}</td>
            </tr>
            <?php } ?>
            <tr>
                <td>Staff Id:</td>
                <td>{{$data['staffid']}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered" style="margin-top: 20px" width="100%">
        <thead>
            <tr>
                <td></td>
                <td>Name</td>
                <td>IC NO</td>
                <td>Relationship</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input type="radio" name="selfchk" id="selfchk" onclick="getPatientDataSource('{{$data['ic']}}', '{{$data['name']}}')" > </td>
                <td>{{$data['name']}}</td>
                <td>{{$data['ic']}}</td>
                <td>Self</td>
            </tr>
            @if ($data['dependendcount'] > 0)
                @foreach ($data['dependend'] as $d)
                    <tr>
                        <td> <input type="radio" name="selfchk" id="selfchk" onclick="getPatientDataSource('{{$d->HR_NO_KP}}','{{$d->HR_NAMA_TANGGUNGAN}}')" > </td>
                        <td>{{$d->HR_NAMA_TANGGUNGAN}}</td>
                        <td>{{$d->HR_NO_KP}}</td>
                        <td>{{$d->SHORT_DESCRIPTION}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<script>
    function getPatientDataSource(ic, name){
        $('#icno').val(ic);
        $('#pname').val(name);
    }
</script>