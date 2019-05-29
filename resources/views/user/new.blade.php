@extends('layouts.app')

@section('title', 'Create')

@section('content')
<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="true">
        <header>
                 <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Create Users</h2>

        </header>
        <div>   <!-- widget div-->

                                    <!-- widget edit box -->
        
 <div class="widget-body">
    <div class="row">
        <div class="col-md-5">
           <!--  <h3>Create</h3> -->
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => ['users.store'] ]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

</div>
</div>
@endsection