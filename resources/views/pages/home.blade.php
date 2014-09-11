@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>Welcome to Larabook 2.0!</h1>
        <p>
            Welcome to the premiere place to talk about Laravel with others. Why don't you sign up to see what all
            the fuss is about?
        </p>

        @if( ! $currentUser)
            <p>
                {!! link_to_route('register_path', 'Sign Up', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </p>
        @endif
    </div>

@stop