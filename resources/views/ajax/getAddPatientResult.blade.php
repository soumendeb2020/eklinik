<label class="cel-gap label col-xs-12">Result : </label>
<div class="cel-gap col-xs-12">
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="5"><img src="https://via.placeholder.com/80" alt="" /></td>
                <td>Name:</td>
                <td>{{$data['name']}}</td>
            </tr> 
            <tr>
                <td>Staff Id:</td>
                <td>{{$data['staffid']}}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{$data['department']}}</td>
            </tr>
            <tr>
                <td>I/C:</td>
                <td>{{$data['ic']}}</td>
            </tr>
            <tr>
                <td>Related:</td>
                <td>{{$data['related']}}</td>
            </tr>
        </tbody>
    </table>
</div>