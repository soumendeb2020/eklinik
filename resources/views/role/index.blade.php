@extends('layouts.app')

@section('title', 'Roles & Permissions')

@section('content')

<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method' => 'post']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="roleModalLabel">Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- name Form Input -->
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
        <h2>Roles</h2>

    </header>
    <div>   <!-- widget div-->

        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

        </div>
        <div class="widget-body">                                    
            <div class="row">
                <div class="col-md-5">
                    <h3>Roles and Permissions Settings</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_roles')
                    <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
                    @endcan
                </div>
            </div>




            @forelse ($roles as $role)
            {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

            @if($role->name === 'Admin')
            @include('shared._permissions', [
            'title' => $role->name .' Permissions',
            'options' => ['disabled'] ])
            @else
            @include('shared._permissions', [
            'title' => $role->name .' Permissions',
            'model' => $role ])
            @can('edit_roles')
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan
            @endif

            {!! Form::close() !!}

            @empty
            <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
            @endforelse
        </div>
    </div>
</div>


@endsection
