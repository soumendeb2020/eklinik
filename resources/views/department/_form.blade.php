<!-- Name Form Input -->

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>
<!-- Letter Form Input -->
<div class="form-group @if ($errors->has('letter')) has-error @endif">
    {!! Form::label('letter', 'Letter') !!}
    {!! Form::text('letter', null, ['class' => 'form-control', 'placeholder' => 'Letter']) !!}
    @if ($errors->has('letter')) <p class="help-block">{{ $errors->first('letter') }}</p> @endif
</div>
<!-- Start Form Input -->
<div class="form-group @if ($errors->has('start')) has-error @endif">
    {!! Form::label('start', 'Start') !!}
    {!! Form::text('start', null, ['class' => 'form-control', 'placeholder' => 'Start']) !!}
    @if ($errors->has('start')) <p class="help-block">{{ $errors->first('start') }}</p> @endif
</div> 