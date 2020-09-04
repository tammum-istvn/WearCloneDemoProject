@extends('dashboard.shop.profile')
@section('contentProfile')

    <div class="profile-menu">
        <nav class="clearfix">
            <div class="profile-menu-left">
                <ul>
                    <li>
                        <a href="{{ route('shop.profile', $profile->id) }}">
                            {{ count($items) }}<span>ITEMS</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="profile-menu-right">
                <ul>
                    <li>
                        <a href="{{ route('shop.staff', $profile->id) }}">
                            {{0}}<span>STAFFS</span>
                        </a>
                    </li>
                    <li class="current">
                        <a href="{{ route('shop.user', $profile->id) }}">
                            {{ count($usersList) }}<span>USERS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="users-list profile-content">
        <div class="row">
            @foreach($usersList as $user)
                <div class="user-card-wrapper col-lg-4 col-md-6">
                    <div class="user-container card">
                        <div class="user-container-left">
                            <a href="{{ route('individual.profile', $user->id)}}">
                                <div class="follow-avatar" style="background-image: url('{{ url($user['picture']) }} ?? {{ url('/img/profile-cartoon.jpg') }}');
                                    padding-bottom: 100%;
                                    background-size: cover;
                                    border-radius: 50%;">
                                </div>
                            </a>
                        </div>
                        <div class="user-container-right">
                            <h3 class="user-name">
                                <a href="{{ route('individual.profile', $user->id)}}">
                                    <span>{{ $user->first_name }}</span>
                                </a>
                            </h3>
                            <ul class="user-info clearfix">
                                @if(isset($user->height))<li>{{ $user->height ." CM"}}</li>@endif
                                @if(isset($user->gender))<li>{{ strtoupper($user->gender) }}</li>@endif
                            </ul>
                            <ul class="meta clearfix">
                                <li>
                                    <a href="{{ route('individual.profile', $user->id)}}">
                                        <span>{{ count($user->look) }}</span>Looks
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('individual.follower', $user->id)}}">
                                        <span>{{ $user->getNumberOfFollower() }}</span>Followers
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{--    <div id="usersList" class="usersList-container">--}}
{{--        <div class="row">--}}
{{--            @foreach($usersList as $user)--}}
{{--                <div class="user-card-wrapper">--}}
{{--                    <div class="user-container">--}}
{{--                        <div class="user-container-left">--}}
{{--                            <div class="user-img">--}}
{{--                                <a href="{{ route('individual.profile', $user->id)}}" class="user-link">--}}
{{--                                    <div class="user-avatar" style="background-image: @if($user['picture']) url('{{ url($user['picture']) }}') @else url('{{ url('/img/profile-cartoon.jpg') }}') @endif;--}}
{{--                                        background-size: cover; background-repeat: no-repeat">--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="user-content">--}}
{{--                                <div class="content-1">--}}
{{--                                    <a href="{{ route('individual.profile', $user->id)}}" class="user-link">--}}
{{--                                        <div class="user-name">{{ $user->first_name }}</div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="content-2">--}}
{{--                                    <div class="user-height">{{ isset($user->height) ? $user->height : "..." }} CM</div>--}}
{{--                                    <div class="separate"></div>--}}
{{--                                    <div class="user-gender" style="text-transform: uppercase">{{ isset($user->gender) ? $user->gender : "..." }}</div>--}}
{{--                                </div>--}}
{{--                                <div class="content-3">--}}
{{--                                    <div class="user-looks ct-3">--}}
{{--                                        <a href="{{ route('individual.profile', $user->id)}}"><span>{{ count($user->look) }}</span>Looks</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="user-follower ct-3">--}}
{{--                                        <a href="{{ route('individual.follower', $user->id)}}"><span>{{ $user->getNumberOfFollower() }}</span>Followers</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
