<label class="label col col-3">Result : </label>
<div class="col col-9">
    <table class="table table-striped table-bordered table-hover" width="100%">
        <tbody>
            <tr>
                <td rowspan="4"></td>
                <td>Name: {{$data['name']}}</td>
            </tr>
            <tr>
                <td>Staff Id: {{$data['staffid']}}</td>
            </tr>
            <tr>
                <td>Department: {{$data['department']}}</td>
            </tr>
            <tr>
                <td>I/C: {{$data['ic']}}</td>
            </tr>
            <!--
            <tr>
                <td colspan="2">Dependant: {{$data['dependent']}}</td>
            </tr>
            -->
        </tbody>
    </table>
</div>