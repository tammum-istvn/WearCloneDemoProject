@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/userList.css') }}">
<style>
    .top-image {
        justify-content: flex-end;
    }
    .thumbnail:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    
</style>
@endsection
@section('main')
{{-- content switch navbar --}}
<div class="container">
    <div class="columns is-centered mt-5">
        <div class="column" style="display: contents">
            <ul class="nav">
                <li class="{{$userType == "men"?"li-selected":""}}" id="user-select-list">
                    <a class="text-center" href="{{ route('rankList', 'men') }}">
                        {{__('user_list.men')}}
                    </a>
                </li>

                <li class="{{$userType == "women"?"li-selected":""}}" id="user-select-list">
                    <a class="text-center" href="{{ route('rankList', 'women') }}">
                        {{__('user_list.women')}}
                    </a>
                </li>
                <li class="{{$userType == "kids"?"li-selected":""}}" id="user-select-list">
                    <a class="text-center" href="{{ route('rankList', 'kids') }}">
                        {{__('user_list.kids')}}
                    </a>
                </li>

                <li class="li {{$userType == "shop"?"li-selected":""}}" id="shop-select-list">
                    <a class="text-center" href="{{ route('rankList', 'shop') }}">
                        {{__('user_list.shop')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- header for showing all user count --}}
    <div class="columns is-mobile mt-1" style="background-color: white;">
        <div class="column is-6 " style="padding: 25px">
            <span class="custom-bold-20px" id="user-type-description">
                @if ($userType != "shop")
                {{__('user_list.total_user')}}
                @else
                {{__('user_list.total_shop')}}
                @endif
            </span>
        </div>
        <div class="column is-6 text-right">
            <div class="column is-4 text-right is-offset-8 is-mobile" id="user-type-count-left-border" style="border-left: gray solid 1px;">
                <span class="custom-bold-20px" id="user-type-count">{{ sizeof($rankPageData)}}</span>
            </div>
        </div>
    </div>
    {{-- body for showing user list --}}
    <div class="columns">
        <div class="column" id="total-user-list-column">
            @foreach($rankPageData as $index => $userRank)
            <div class="columns user-list">
                <div class="column is-1 vcenter" style="width: auto; border-right: 1px solid darkgrey">
                    <h2>{{ sprintf('%02d', $index+1) }}</h2>
                </div>

                <div class="column is-2 vcenter">
                    <figure class="image is-96x96 mb-0">
                        <img class="is-rounded" src="{{($userRank->picture)!=null?url("{$userRank->picture}"):url(Config::get('constants.noImagePath'))}}" style="height: 100px">
                    </figure>
                </div>

                <div class="column is-5">
                    <div>
                        @if($userType == "shop")
                        <a href="{{route('shop.profile',$userRank->user_id)}}" style="font-weight: bold; font-size:16px; color:black">{{$userRank->first_name}}{{$userRank->last_name}} </a>
                        @else
                        <a href="{{route('individual.profile',$userRank->user_id)}}" style="font-weight: bold; font-size:16px; color:black">{{$userRank->first_name}}{{$userRank->last_name}} </a>
                        @endif
                    </div>

                    <div>
                        @if($userRank->city)
                        <span class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true" style="color: gray"></i>
                        </span>
                        <span style="color:gray;">{{$userRank->city}}</span>
                        @endif
                    </div>

                    <!-- individual have gender and height  -->
                    @if($userType != "shop")
                    <div >
                        @if($userRank->height)
                        <span style="margin-right: 10px;color:gray;"> {{ $userRank->height }} CM</span>
                        @endif
                        @if($userRank->gender)
                        <span class="mb-0">{{$userRank->look_count==null?0:$userRank->look_count}} {{__('user_list.upload_post')}}</span>
                        @endif
                    </div>
                    @endif

                    <div>
                        @if($userType == "shop")
                            <span>{{$userRank->follower_count ?? 0}} {{__('user_list.follower')}}</span>
                        @else
                            {{-- <p class="mb-0">{{$userRank->look_count==null?0:$userRank->look_count}} {{__('user_list.upload_post')}}</p> --}}
                        @endif
                    </div>
                </div>

                <div class="column is-4 vcenter is-flex top-image">
                    @if($index < 10) @if($userType=="shop" ) @foreach($userRank->items as $item)
                        <a href="{{ route('itemDetail', $item->id) }}">
                            <figure class="image is-128x128 mb-0 pr-2 is-flex">
                                <img class="thumbnail" src="{{ url(json_decode($item->picture)) }}">
                            </figure>
                        </a>
                        @endforeach

                        @else
                        @foreach($userRank->looks as $look)
                        <a href="{{ route('detail',$look->id) }}">
                            <figure class="image is-128x128 mb-0 pr-2 is-flex">
                                <img class="thumbnail" src="{{ url($look->picture) }}">
                            </figure>
                        </a>

                        @endforeach
                        @endif
                        @endif

                        <!-- @if($userType == "shop")
                    <a class="button is-light" class="favourite-btn">
                        <span><i class="fa fa-star" style="color: white" aria-hidden="true"></i>
                        </span>
                        <span class="favourite-btn-text">Add to favourite
                        </span></a>
                    {{-- <x-favorite-btn class="favorite-btn" profileId={{$userRank->user_id}} linkId={{$userRank->user_id}}/> --}}
                    @endif -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{--
    <div class="columns mt-4">
        <div class="column has-text-right is-vcentered" style="display: inline-flex; justify-content:flex-end">
            @if($rankPageData)
            {{ $rankPageData->links()}}
    {{ $rankPageData->perPage()	 }}
    @endif
</div>
</div>
--}}
</div>

@endsection
