@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Register</h1>

            @include('layouts.partials.errors')

            {!! Form::open(['route' => 'register_path']) !!}
                <!--- Username Field --->
                <div class="form-group">
                    {!! Form::label('username', 'Username:') !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!--- Email Field --->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!--- Password Field --->
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!--- Password Confirmation Field --->
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!--- Sign Up Field --->
                <div class="form-group">
                    {!! Form::submit('Sign Up', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop