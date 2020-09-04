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
                    <li class="current">
                        <a href="{{ route('shop.staff', $profile->id) }}">
                            {{0}}<span>STAFFS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.user', $profile->id) }}">
                            {{ $totalUsers }}<span>USERS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection
