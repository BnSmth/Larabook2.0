@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Need to reset your password?</h1>

            {!! Form::open() !!}
                <!--- Email Field --->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!--- Reset Password Field --->
                <div class="form-group">
                    {!! Form::submit('Reset Password', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop