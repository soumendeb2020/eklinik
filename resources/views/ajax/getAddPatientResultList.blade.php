@if ($data['group'] == 'dependentSection')
    <label class="label col col-3">Result : </label>
    <div class="col col-9">
        <table class="table table-striped table-bordered table-hover" width="100%">
            <tbody>
                @foreach ($data['detail'] as $d)
                <tr>
                    <td> <input onclick="changeData('{{$d->id}}')" type="radio" name="dtinp" value="1"> </td>
                    <td>
                        <div id="gtVal{{$d->id}}" data-sid="{{$d->HR_NO_PEKERJA}}" data-name="{{$d->HR_NAMA_TANGGUNGAN}}" data-ic="{{$d->HR_NO_KP}}"> 
                            Name: {{$d->HR_NAMA_TANGGUNGAN}} <br>
                            Staff Id: {{$d->HR_NO_PEKERJA}} <br>
                            Department: <br>
                            I/C: {{$d->HR_NO_KP}} <br>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@elseif ($data['group'] == 'staffSection')
    <label class="label col col-3">Result : </label>
    <div class="col col-9">
        <table class="table table-striped table-bordered table-hover" width="100%">
            <tbody>
                @foreach ($data['detail'] as $d)
                <tr>
                    <td> <input onclick="changeStaffData('{{$d['id']}}')" type="radio" name="dtinp" value="1"> </td>
                    <td>
                        <div id="gtVal{{$d['id']}}" data-sid="{{$d['staffid']}}" data-name="{{$d['name']}}" data-dept="{{$d['department']}}" data-ic="{{$d['ic']}}"> 
                            Name: {{$d['name']}} <br>
                            Staff Id: {{$d['staffid']}} <br>
                            Department: {{$d['department']}}<br>
                            I/C: {{$d['ic']}} <br>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<script>
    function changeData(dt){
        var msglist = document.getElementById("gtVal" + dt);
        var sid = msglist.getAttribute("data-sid");
        var name = msglist.getAttribute("data-name");
        var ic = msglist.getAttribute("data-ic");
        $("#staff_id").val(sid);
        $("#icno").val(ic);
        $("#pname").val(name);
    }
    
    function changeStaffData(dt){
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
</script>    

