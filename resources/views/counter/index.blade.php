@extends('layouts.app')
@section('title', 'Department')
@section('content')
<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="true">
    <header>
        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
        <h2>Department Setting</h2>
    </header>
    <div>   <!-- widget div-->
        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">Total : {{ $result->total() }} {{ str_plural('Counter', $result->count()) }} </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_users')
                    <a href="{{ route('counter.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
                    @endcan
                </div>
            </div>
            <div class="result-set">
                <table class="table table-bordered table-striped table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>   
                            <th>Letter</th>
                            <th>Start</th>
                            <th>Created At</th>
                            @can('edit_users', 'delete_users')
                            <th class="text-center">Actions</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->letter }}</td>
                            <td>{{ $item->start }}</td>
                            <td>{{ $item->created_at->toFormattedDateString() }}</td>
                            @can('edit_users')
                            <td class="text-center">
                                <a href="{{ route('counter.edit', [$item->id])  }}" class="btn btn-sm btn-light">Edit</a>
                                
                                {!! Form::open( ['method' => 'delete', 'url' => route('counter.destroy', ['department' => $item->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
                                    <button type="submit" class="btn-delete btn btn-sm btn-light">
                                        Delete
                                    </button>
                                {!! Form::close() !!}
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $result->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection