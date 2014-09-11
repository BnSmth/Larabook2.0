@if($signedIn)
    @if($user->isFollowedBy($currentUser))
        {!! Form::open(['method' => 'DELETE', 'route' => ['follow_path', $user->id]]) !!}
            {!! Form::hidden('follower', $currentUser->id) !!}
            {!! Form::hidden('userToUnfollow', $user->id) !!}

            <!--- Follow Field --->
            <div class="form-group">
                {!! Form::submit("Unfollow {$user->username}", ['class' => 'btn btn-danger ']) !!}
            </div>

        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => 'follows_path']) !!}
            {!! Form::hidden('userToFollow', $user->id) !!}
            {!! Form::hidden('follower', $currentUser->id) !!}

            <!--- Follow Field --->
            <div class="form-group">
                {!! Form::submit("Follow {$user->username}", ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    @endif
@endif