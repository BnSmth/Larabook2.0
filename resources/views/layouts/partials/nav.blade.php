<nav class="navbar navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(Auth::check())
                {!! link_to_route('statuses_path', 'Laravel 2.0', [], ['class' => 'navbar-brand']) !!}
            @else
                {!! link_to_route('home', 'Laravel 2.0', [], ['class' => 'navbar-brand']) !!}
            @endif
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>{!! link_to_route('users_path', 'Browse Users') !!}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ $currentUser->present()->gravatar }}?s=30" alt="{{
                            $currentUser->username }}" class="nav-gravatar"/>

                            {{ $currentUser->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Link</a></li>
                            <li>{!! link_to_route('profile_path', 'Your Profile', [$currentUser->username]) !!}</li>
                            <li class="divider"></li>
                            <li>{!! link_to_route('logout_path', 'Log Out') !!}</li>
                        </ul>
                    </li>
                @else
                    <li>{!! link_to_route('register_path', 'Register') !!}</li>
                    <li>{!! link_to_route('login_path', 'Login') !!}</li>
                @endif
            </ul>

        </div>
    </div>
</nav>