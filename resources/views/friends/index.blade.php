@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Your friends</h3>
            @if(!$friends->count())
                <p>0 friends.</p>
            @else
                @foreach($friends as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif
        </div>
        <div class="col-lg-6">
            @if(Auth::user()->hasFriendRequestPending($user))
                <p>Waiting for {{$user->getNameOrUsername()}} to accept your request.</p>
            @elseif(Auth::user()->hasFriendRequestReceived($user))
                <a href="#" class="btn btn-primary">Accept request</a>
            @elseif(Auth::user()->isFriendsWith($user))
                <p>You and {{$user->getNameOrUsername()}} are friends.</p>
            @else
                <a href="#" class="btn btn-primary">Add as friend.</a>
            @endif
            <h4>Friends requests</h4>
            @if(!$requests->count())
                <p>0 friend requests.</p>
            @else
                @foreach($requests as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif
        </div>
    </div>
@stop