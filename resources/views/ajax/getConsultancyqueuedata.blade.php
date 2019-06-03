@if (!empty($patientList))
    @foreach ($patientList as $p)
        <tr class="datatr alldept dept{{$p['pqueue']->department_id}}">
            <td>{{$p['pqueue']->token_no}}</td>
            <td>{{$p['pqueue']->ic_number}}</td>
            <td>{{$p['pqueue']->name}}</td>
            <td>{{$p['pqueue']->created_at}}</td>
            <td>{{$p['pqueue']->symptopms}}</td>
            <td><span type="button" class=" center-block btn btn-success btn-lg padding-5 ">{{ $p['pqueue']->is_active == 1 ? 'Waiting' : 'Serving' }}</span></td>
            <td>
                <button class="btn btn-info" onclick=""><i class="glyphicon glyphicon-edit"></i>Profile</button>
                <!--<button class="btn btn-danger" data-toggle="modal" data-target="#labForm" onclick=""><i class="glyphicon glyphicon-tint"></i></button>-->
                <a href="{{ URL::to('patientprofile/'.Crypt::encrypt($p['pqueue']->id)) }}"><button class="btn btn-default"  onclick=""><i class="glyphicon glyphicon-bell"></i></button></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7">No Patient Exist In This Room</td>
    </tr>
@endif