@if ($data['group'] == 'dependentSection')
<label class="cel-gap label col-xs-12">Result : </label>
@foreach ($data['detail'] as $d)
<div class="cel-gap col-xs-12">
    <div id="gtVal{{$d['id']}}" data-sid="{{$d['staffid']}}" data-name="{{$d['name']}}" data-dept="{{$d['department']}}" data-deptid="{{$d['departmentid']}}" data-ic="{{$d['ic']}}" data-ic="{{$d['related']}}"></div>
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="5">
                    <input onclick="changeStaffData('{{$d['id']}}')" type="radio" name="dtinp" value="1"><br>
                    <img src="https://via.placeholder.com/80" alt="" />
                </td>
                <td>Name:</td>
                <td>{{$d['name']}}</td>
            </tr>
            <tr>
                <td>Staff Id:</td>
                <td>{{$d['staffid']}}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{$d['department']}}</td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td>{{$d['ic']}}</td>
            </tr>  
            <tr>
                <td>Related:</td>
                <td>{{$d['related']}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
@elseif ($data['group'] == 'staffSection')
<label class="cel-gap label col-xs-12">Result : </label>
@foreach ($data['detail'] as $d)
<div class="cel-gap col-xs-12">
    <div id="gtVal{{$d['id']}}" data-sid="{{$d['staffid']}}" data-name="{{$d['name']}}" data-dept="{{$d['department']}}" data-deptid="{{$d['departmentid']}}" data-ic="{{$d['ic']}}" data-ic="{{$d['related']}}"></div>
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="5">
                    <input onclick="changeStaffData('{{$d['id']}}')" type="radio" name="dtinp" value="1"><br>
                    <img src="https://via.placeholder.com/80" alt="" />
                </td>
                <td>Name:</td>
                <td>{{$d['name']}}</td>
            </tr>
            <tr>
                <td>Staff Id:</td>
                <td>{{$d['staffid']}}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{$d['department']}}</td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td>{{$d['ic']}}</td>
            </tr>  
            <tr>
                <td>Related:</td>
                <td>{{$d['related']}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
    <!--
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
    -->
@endif

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

