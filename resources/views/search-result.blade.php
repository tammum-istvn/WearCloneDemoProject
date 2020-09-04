@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection
@section('main')
    <div class="desktop">
        <div class="container">
            <div class="search-title">
                <div class="col-xs-12">
                    <h1 class="text-center">RESULTS FOR "{{$keyword}}"</h1>
                    <p class="title-collection text-center">USERS'S COLLECTIONS</p>
                </div>
            </div>
            <div class="search-condition text-center mb-3">
                <?php $hasFilter = false; ?>
                @if(isset($gender) && $gender[0] != "all")
                    @foreach($gender as $genderElement)
                        <div class="filter-block gender-block">
                            {{$genderElement}}
                            <div class="remove-block remove-gender-block" id="{{$genderElement}}-remove" onclick="removeGender(this.id)">
                                <img src="https://img.icons8.com/metro/26/000000/x.png"/>
                            </div>
                        </div>
                    @endforeach
                    <?php $hasFilter = true; ?>
                @endif
                @if(isset($minHeight) && $minHeight != 50)
                    <div class="filter-block minHeight-block">
                        {{"HEIGHT > ". $minHeight}}
                        <div class="remove-block remove-minHeight-block" onclick="removeMinHeight()">
                            <img src="https://img.icons8.com/metro/26/000000/x.png"/>
                        </div>
                    </div>
                    <?php $hasFilter = true; ?>
                @endif
                @if(isset($maxHeight) && $maxHeight != 200)
                    <div class="filter-block maxHeight-block">
                        {{"HEIGHT < ". $maxHeight}}
                        <div class="remove-block remove-maxHeight-block" onclick="removeMaxHeight()">
                            <img src="https://img.icons8.com/metro/26/000000/x.png"/>
                        </div>
                    </div>
                    <?php $hasFilter = true; ?>
                @endif
                @if(isset($color) && $color[0] != "all")
                    @foreach($color as $colorElement)
                        <div class="filter-block color-block">
                            {{$colorElement}}
                            <div class="remove-block remove-color-block" id="{{$colorElement}}-remove" onclick="removeColor(this.id)">
                                <img src="https://img.icons8.com/metro/26/000000/x.png"/>
                            </div>
                        </div>
                    @endforeach
                    <?php $hasFilter = true; ?>
                @endif
                @if(isset($size) && $size[0] != "all")
                    @foreach($size as $sizeElement)
                        <div class="filter-block size-block">
                            {{$sizeElement}}
                            <div class="remove-block remove-size-block" id="{{$sizeElement}}-remove" onclick="removeSize(this.id)">
                                <img src="https://img.icons8.com/metro/26/000000/x.png"/>
                            </div>
                        </div>
                    @endforeach
                    <?php $hasFilter = true; ?>
                @endif
                @if($hasFilter)
                    <div class="filter-block-remove filter-block" onclick="resetFilter()">REMOVE</div>
                @endif
            </div>
            <div class="search-content">
                <div class="row">
                    <div class="filter-condition">
                        <form id="formSearch" action="{{route('search')}}" method="GET">
                            <input type="hidden" name="keyword" value="{{$keyword}}">
                            <div id="accordion" class="panel-group">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <h4>SHOW RESULT FOR</h4>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" onclick="changeUsersTitle()" id="usersActive" data-toggle="tab" href="#users">USERS ({{sizeof($users)}})</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" onclick="changeLooksTitle()" id="looksActive" data-toggle="tab" href="#looks">LOOKS ({{sizeof($looks)}})</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" onclick="changeItemsTitle()" id="itemsActive" data-toggle="tab" href="#items">ITEMS ({{sizeof($items)}})</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseGender" aria-expanded="false">
                                            <h4>GENDER</h4>
                                        </a>
                                    </div>
                                    <div id="collapseGender" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <a href="{{route('search')}}">
                                                <label class="label-cb">ALL
                                                    <input id="genderAll" type="checkbox" name="gender[]" value="all" @if (!isset($gender)) checked @else @if(in_array("all", $gender) || sizeof($gender) == 3) checked @endif @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </a>
                                            <a href="{{route('search')}}">
                                                <label class="label-cb">MEN
                                                    <input id="MEN-gd" class="cbGender" type="checkbox" name="gender[]" value="men" @if (isset($gender) && in_array("men", $gender) && sizeof($gender) != 3) checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </a>
                                            <a href="{{route('search')}}">
                                                <label class="label-cb">WOMEN
                                                    <input id="WOMEN-gd" class="cbGender" type="checkbox" name="gender[]" value="women" @if (isset($gender) && in_array("women", $gender) && sizeof($gender) != 3) checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </a>
                                            <a href="{{route('search')}}">
                                                <label class="label-cb">KIDS
                                                    <input id="KIDS-gd" class="cbGender" type="checkbox" name="gender[]" value="kids" @if (isset($gender) && in_array("kids", $gender) && sizeof($gender) != 3) checked @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                                            <h4>HEIGHT</h4>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="heightRangeSlider">
                                                <input id="minHeight" class="minHeight" name="minHeight" type="range" min="50" max="200" value="{{isset($minHeight) ? $minHeight : 50}}" />
                                                <input id="maxHeight" class="maxHeight" name="maxHeight" type="range" min="50" max="200" value="{{isset($maxHeight) ? $maxHeight : 200}}" />
                                                <span id="min_height" class="height_range_min left">{{isset($minHeight) ? $minHeight : 50}} CM</span>
                                                <span id="max_height" class="height_range_max right" style="margin-right: 0px;">{{isset($maxHeight) ? $maxHeight : 200}} CM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseColor" aria-expanded="false">
                                            <h4>COLOR</h4>
                                        </a>
                                    </div>
                                    <div id="collapseColor" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <a href="{{route('search')}}">
                                                <label class="label-cb label-all"> ALL
                                                    <input id="colorAll" type="checkbox" name="color[]" value="all" @if (!isset($color)) checked @else @if(in_array("all", $color) || sizeof($color) == 12) checked @endif @endif>
                                                    <span class="checkmark all"></span>
                                                </label>
                                            </a>
                                            <div class="list-option color-option">
                                                <div class="row">
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="BLACK-cl" class="cbColor" type="checkbox" name="color[]" value="black" @if (isset($color) && in_array("black", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark black" title="Black"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="RED-cl" class="cbColor" type="checkbox" name="color[]" value="red" @if (isset($color) && in_array("red", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark red" title="Red"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="YELLOW-cl" class="cbColor" type="checkbox" name="color[]" value="yellow" @if (isset($color) && in_array("yellow", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark yellow" title="Yellow"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="ORANGE-cl" class="cbColor" type="checkbox" name="color[]" value="orange" @if (isset($color) && in_array("orange", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark orange" title="Orange"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="WHITE-cl" class="cbColor" type="checkbox" name="color[]" value="white" @if (isset($color) && in_array("white", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark white" title="White"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="BLUE-cl" class="cbColor" type="checkbox" name="color[]" value="blue" @if (isset($color) && in_array("blue", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark blue" title="Blue"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="GREEN-cl" class="cbColor" type="checkbox" name="color[]" value="green" @if (isset($color) && in_array("green", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark green" title="Green"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="CORAL-cl" class="cbColor" type="checkbox" name="color[]" value="coral" @if (isset($color) && in_array("coral", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark coral" title="Coral"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="BEIGE-cl" class="cbColor" type="checkbox" name="color[]" value="beige" @if (isset($color) && in_array("beige", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark beige" title="Beige"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="BROWN-cl" class="cbColor" type="checkbox" name="color[]" value="brown" @if (isset($color) && in_array("brown", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark brown" title="Brown"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="GRAY-cl" class="cbColor" type="checkbox" name="color[]" value="gray" @if (isset($color) && in_array("gray", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark gray" title="Gray"></span>
                                                        </label>
                                                    </a>
                                                    <a href="{{route('search')}}" class="col-2">
                                                        <label class="label-cb">
                                                            <input id="LEMON-cl" class="cbColor" type="checkbox" name="color[]" value="lemon" @if (isset($color) && in_array("lemon", $color) && sizeof($color) != 12) checked @endif>
                                                            <span class="checkmark lemon" title="Lemon"></span>
                                                        </label>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false">
                                            <h4>SIZE</h4>
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <a href="{{route('search')}}">
                                                <label class="label-cb">ALL
                                                    <input id="sizeAll" type="checkbox" name="size[]" value="all" @if (!isset($size)) checked @else @if(in_array("all", $size) || sizeof($size) == 4) checked @endif @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </a>
                                            <div class="list-option">
                                                <a href="{{route('search')}}">
                                                    <label class="label-cb">S
                                                        <input id="S-s" class="cbSize" type="checkbox" name="size[]" value="s" @if (isset($size) && in_array("s", $size) && sizeof($size) != 4) checked @endif>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </a>
                                                <a href="{{route('search')}}">
                                                    <label class="label-cb">M
                                                        <input id="M-s" class="cbSize" type="checkbox" name="size[]" value="m" @if (isset($size) && in_array("m", $size) && sizeof($size) != 4) checked @endif>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </a>
                                                <a href="{{route('search')}}">
                                                    <label class="label-cb">L
                                                        <input id="L-s" class="cbSize" type="checkbox" name="size[]" value="l" @if (isset($size) && in_array("l", $size) && sizeof($size) != 4) checked @endif>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </a>
                                                <a href="{{route('search')}}">
                                                    <label class="label-cb">XL
                                                        <input id="XL-s" class="cbSize" type="checkbox" name="size[]" value="xl" @if (isset($size) && in_array("xl", $size) && sizeof($size) != 4) checked @endif>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false">--}}
{{--                                            <h4>BRAND</h4>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseSix" class="collapse" data-parent="#accordion" style="">--}}
{{--                                        <div class="card-body">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false">--}}
{{--                                            <h4>PRICE</h4>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseSeven" class="collapse" data-parent="#accordion" style="">--}}
{{--                                        <div class="card-body">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false">--}}
{{--                                            <h4>SORT</h4>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseEight" class="collapse" data-parent="#accordion" style="">--}}
{{--                                        <div class="card-body">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                    <div class="tab-content">
                        <div id="users" class="contetn-container tab-pane active">
                            <div class="row">
                                @if(sizeof($users) != 0)
                                    @foreach($users as $user)
                                        <div class="user-element col-6">
                                            <div class="row">
                                                <div class="col-3 user-avatar">
                                                    <a href="{{ route($user->account_type == 'shop'? 'shop.profile':'individual.profile', $user->id)}}">
                                                        <img src="{{ isset($user->picture) ? url($user->picture): url('https://via.placeholder.com/150') }}" alt="Avatar">
                                                    </a>
                                                </div>
                                                <div class="col-9">
                                                    <a href="{{ route($user->account_type == 'shop'? 'shop.profile':'individual.profile', $user->id)}}">
                                                        <h3>{{ $user->first_name }}</h3>
                                                    </a>
                                                    <label style="margin-bottom: 0">{{ $user->account_type }} | {{ strtoupper($user->gender) }} | {{ $user->height }} CM</label>
                                                    <br>
                                                    @if($user->account_type == 'shop')
                                                        <a style="color: #3490dc" href="{{ 'https://'.$user->shop['website'] }}" target="_blank">{{ $user->shop['website'] }}</a>
                                                        <br>
                                                    @endif
                                                    <label class="intro">{{ $user->introduction }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="no-found">
                                        No Users Found
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="looks" class="contetn-container tab-pane">
                            <div class="row">
                                @if(sizeof($looks) != 0)
                                    @foreach($looks as $look)
                                        <div class="look-item-element col-3">
                                            <a href="{{ route('detail', $look->id) }}">
                                                <img src="{{ url($look->picture ?? 'https://via.placeholder.com/150') }}" alt="Look">
                                                <div class="look-item-info">
                                                    <div class="display-name text-center">{{strtoupper($look->title)}}</div>
                                                    <div class="model-info text-center">Model's Info : {{$look->height}} CM <span class="separate"></span> {{strtoupper($look->gender)}}</div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="no-found">
                                        No Looks Found
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="items" class="contetn-container tab-pane">
                            <div class="row">
                                @if(sizeof($items) != 0)
                                    @foreach($items as $item)
                                        <div class="look-item-element col-3">
                                            <a href="{{ route('itemDetail', $item->id) }}">
                                                <?php $itemPictures = $item->details[0]->picture ?? '';?>
                                                <img src="{{ url($itemPictures[0] ?? 'https://via.placeholder.com/150') }}" alt="Item">
                                                <div class="look-item-info">
                                                    <div class="display-name text-center">{{strtoupper($item->title)}}</div>
                                                    <div class="price-info text-center">vnđ {{$item->details[0]->informations[0]->price()}}</div>
{{--                                                    <div class="category-info text-center">{{ $item->category->name }} <span class="separate"></span> {{ $item->subCategory->name }}</div>--}}
                                                    <div class="color-info text-center">
                                                        @foreach($item->details as $details)
                                                            @if(isset($details->color))
                                                            {{ $details->color }} <label style="width: 8px; height: 8px; background-color: {{ $details->color }};"></label> /
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="size-info text-center">
                                                    <?php
                                                        $arraySize = array();
                                                        foreach ($item->details as $details){
                                                            foreach($details->informations as $info) {
                                                                array_push($arraySize,$info->size);
                                                            }
                                                        }
                                                        $arraySize = array_unique($arraySize);
                                                    ?>
                                                        {{strtoupper($arraySize[0])}}
                                                        @for($index = 1; $index < count($arraySize); $index++)
                                                            @if(isset($arraySize[$index]))
                                                            <span class="separate"></span> {{strtoupper($arraySize[$index])}}
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="no-found">
                                        No Items Found
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile">

    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#formSearch").on("change", "input:checkbox", function(){
            $("#formSearch").submit();
        });

        $("#genderAll").on("change", function() {
            $(".cbGender").prop("checked", false);
            $("#genderAll").prop("checked", true);
        });
        $(".cbGender").on("change", function() {
            $("#genderAll").prop("checked", false);
        });
        $("#colorAll").on("change", function() {
            $(".cbColor").prop("checked", false);
            $("#colorAll").prop("checked", true);
        });
        $(".cbColor").on("change", function() {
            $("#colorAll").prop("checked", false);
        });
        $("#sizeAll").on("change", function() {
            $(".cbSize").prop("checked", false);
            $("#sizeAll").prop("checked", true);
        });
        $(".cbSize").on("change", function() {
            $("#sizeAll").prop("checked", false);
        });

        $('input[type="range"]').on( 'input', rangeInputChangeEventHandler);
    });
    function rangeInputChangeEventHandler(e){
        var rangeGroup = $(this).attr('name'),
            minBtn = $(".minHeight"),
            maxBtn = $(".maxHeight"),
            height_range_min = $(".height_range_min"),
            height_range_max = $(".height_range_max"),
            minVal = parseInt($(minBtn).val()),
            maxVal = parseInt($(maxBtn).val());
        origin = e.target.className;
        if(origin === 'minHeight' && minVal > maxVal-5) {
            $(minBtn).val(maxVal-5);
        }
        var minVal = parseInt($(minBtn).val());
        $(height_range_min).html(minVal + " CM");

        if(origin === 'maxHeight' && maxVal-5 < minVal){
            $(maxBtn).val(5+ minVal);
        }
        var maxVal = parseInt($(maxBtn).val());
        $(height_range_max).html(maxVal + " CM");

        $("#formSearch").submit();
    }

    function changeUsersTitle() {
        $(".title-collection").text("USERS'S COLLECTIONS");
    }
    function changeLooksTitle() {
        $(".title-collection").text("LOOKS'S COLLECTIONS");
    }
    function changeItemsTitle() {
        $(".title-collection").text("ITEMS'S COLLECTIONS");
    }
    function resetFilter() {
        $("#genderAll").prop("checked", true);
        $(".cbGender").prop("checked", false);
        $("#minHeight").val(50);
        $("#maxHeight").val(200);
        $("#colorAll").prop("checked", true);
        $(".cbColor").prop("checked", false);
        $("#sizeAll").prop("checked", true);
        $(".cbSize").prop("checked", false);
        $("#formSearch").submit();
    }
    function removeGender(variable) {
        variable = variable.substring(0, variable.length-7);
        variable = variable.toUpperCase();
        $("#"+variable+"-gd").prop("checked", false);
        $("#formSearch").submit();
    }
    function removeMinHeight() {
        $("#minHeight").val(50);
        $("#formSearch").submit();
    }
    function removeMaxHeight() {
        $("#maxHeight").val(200);
        $("#formSearch").submit();
    }
    function removeColor(variable) {
        variable = variable.substring(0, variable.length-7);
        variable = variable.toUpperCase();
        $("#"+variable+"-cl").prop("checked", false);
        $("#formSearch").submit();
    }
    function removeSize(variable) {
        variable = variable.substring(0, variable.length-7);
        variable = variable.toUpperCase();
        $("#"+variable+"-s").prop("checked", false);
        $("#formSearch").submit();
    }
</script>
@endsection
