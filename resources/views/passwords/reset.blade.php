@extends('layouts.default')

@section('content')
    <div class="row">
        @include('layouts.partials.errors')
            <div class="col-md-6 col-md-offset-3">
                <h1>Reset your password</h1>

                {!! Form::open() !!}
                    {!! Form::hidden('token', $token) !!}

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

                    <!--- Password confirmation Field --->
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <!--- Submit Field --->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
@stop