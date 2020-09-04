@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/homePage.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/userList.css') }}">--}}

@endsection
@section('main')

<div class="section-trending-look">
    <div id="switch-type">
        <div class="nav">
            <ul class="nav-list">
                <li
                    class="nav-item all {{ session()->get('interest') == ''? 'li-selected':'' }}">
                    @if((session()->get('trending')))
                        <a
                            href="{{ route('home', ['trending'=> session()->get('trending')] ) }}">ALL</a>
                    @else
                        <a href="{{ route('home') }}">ALL</a>
                    @endif
                </li>
                <li
                    class="nav-item men {{ session()->get('interest') == 'men'? 'li-selected':'' }}">
                    @if((session()->get('trending')))
                        <a
                            href="{{ route('home',['interest' => 'men', 'trending'=> session()->get('trending')]) }}">MEN</a>
                    @else
                        <a
                            href="{{ route('home',['interest' => 'men']) }}">MEN</a>
                    @endif
                </li>
                <li
                    class="nav-item women {{ session()->get('interest') == 'women'? 'li-selected':'' }}">
                    @if((session()->get('trending')))
                        <a
                            href="{{ route('home',['interest' => 'women', 'trending'=> session()->get('trending')]) }}">WOMEN</a>
                    @else
                        <a
                            href="{{ route('home',['interest' => 'women']) }}">WOMEN</a>
                    @endif
                </li>
                <li
                    class="nav-item kids {{ session()->get('interest') == 'kids'? 'li-selected':'' }}">
                    @if((session()->get('trending')))
                        <a
                            href="{{ route('home',['interest' => 'kids', 'trending'=> session()->get('trending')]) }}">KIDS</a>
                    @else
                        <a
                            href="{{ route('home',['interest' => 'kids']) }}">KIDS</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">

    @if(count($top8HashTags) > 0)
        <div class="mt-4">
            <div class="trending-tag">
                <p class="hot-tag is-uppercase has-text-weight-bold is-size-5 p-2 pl-3 pr-3">
                    # {{ $trendingHashTag }} <i
                        class="fab fa-hotjar is-pulled-right has-text-danger is-size-6 mt-1 ml-2"></i>
                </p>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="card p-3">
                        <div class="is-flex">
                            <i class="fas fa-tags is-size-7 mt-2"></i>
                            <p class="has-text-weight-bold is-size-5 pl-1 mb-0">Trending Hashtags</p>
                        </div>
                        <ul class="mt-2 mb-0">
                            @if(isset($top8HashTags))
                                @foreach($top8HashTags as $top8HashTag)
                                    @if($top8HashTag->hashTag->name != $trendingHashTag)
                                        <li class="hashtag-item pr-5">
                                            @if((session()->get('interest')))
                                                <a href="{{ route('home',['interest' => session()->get('interest'), 'trending' => $top8HashTag->hashTag->name]) }}"
                                                    class="hashtag-link is-uppercase">{{ $top8HashTag->hashTag->name }}
                                                    <i class="fab fa-hotjar is-pulled-right has-text-danger"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('home',['trending' => $top8HashTag->hashTag->name]) }}"
                                                    class="hashtag-link is-uppercase">{{ $top8HashTag->hashTag->name }}
                                                    <i class="fab fa-hotjar is-pulled-right has-text-danger"></i>
                                                </a>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="column is-three-quarters">
                    <div class="row owl-carousel owl-theme">
                        @foreach($trendingLooks as $trendingLook)
                            <div class="m-1">
                                <a href="{{ route('detail',$trendingLook->id) }}">
                                    <div class="card-img"
                                        style="background-image: url('{{ url($trendingLook->picture) }}'); background-size: contain; background-repeat: no-repeat;">
                                    </div>
                                </a>
                                {{-- <p class="has-text-left pl-2 pr-2" style="font-size: 10pt">
                                    {{ $trendingLook->title }}
                                </p> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-5">
        <div class="show-look-recently">
            <div class="show-look-recently-title">Recently Looks</div>
        </div>

        <div class="row">
            @foreach($recentlyLooks as $recentlyLook)
                <div class="col-4">
                    <div class="m-1 mt-4">
                        <a href="{{ route('detail',$recentlyLook->id) }}">
                            <div class="card-img"
                                style="background-image: url('{{ url($recentlyLook->picture) }}'); background-size: contain; background-repeat: no-repeat;">
                            </div>
                        </a>
                        <p class="mt-2 is-size-6">
                            {{ $recentlyLook->title }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="paging">
            @if($recentlyLooks)
                {{ $recentlyLooks->links() }}
            @endif
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: false,
            responsiveClass: true,
            autoplayHoverPause: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 4,
                    nav: false,
                }
            }
        });

    });

</script>
@endsection
