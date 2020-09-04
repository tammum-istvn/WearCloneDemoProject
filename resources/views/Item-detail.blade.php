@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/itemDetail.css') }}">
@endsection
@section('main')
<section class="main-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
{{--                <ul class="product-path">--}}
{{--                    <li><a href="/fashion/public">Home</a></li>--}}
{{--                    <li><a href="{{ route('shop.profile',$item->user_id) }}">{{ $item->user->first_name }}</a></li>--}}
{{--                    <li><a href="{{url()->current()}}">{{$item->title}}</a></li>--}}
{{--                </ul>--}}
                <div class="user-menu">
                    <div class="row">
                        <div class="col-md-10" style="display: table">
                            <div class="user-avatar">
                                <a href="{{ route('shop.profile',$item->user_id) }}">
                                    <img src="{{ isset($item->user->picture) ? url($item->user->picture): url('img/no-image.png') }}" alt="avatar">
                                </a>
                            </div>
                            <div class="user-content">
                                <p class="user-name">{{ $item->user->first_name }} {{ $item->user->last_name }}</p>
                                <ul class="user-info">
                                    <li>HEIGHT: {{ isset($item->user->height) ? $item->user->height : "" }} CM</li>
                                    @if($item->user->address)
                                        <li>CITY: {{ $item->user->address->city}}</li>
                                    @endif
{{--                                    <li>{{ isset($item->user->gender) ? strtoupper($item->user->gender) : "..." }}</li>--}}
{{--                                    <li>{{ strtoupper($item->user->account_type) }}</li>--}}
                                </ul>
                            </div>
                        </div>
{{--                        <div class="col-md-2 follow-zone">--}}
{{--                            <a id="favourite-btn" class="button btn-follow">--}}
{{--                                <span id="favourite-btn-text">Follow</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-detail row">
                    <div class="product-detail-images col-md-7">
                        <div class="row">
                            <div class="product-thumbs item-thumbs">
                                @if(isset($item->details[0]))
                                    @foreach($item->details[0]->picture as $picture)
                                        <figure>
                                            <img id="item_img_{{$item->details[0]->id}}" class="product-thumb-detail" value="{{$item->details[0]->id}}" src="{{ url($picture) }}">
                                        </figure>
                                    @endforeach
                                @endif
                            </div>
                            <figure class="product-main-img item-full" id="main-img">
                                <img src="{{ url($item->details[0]->picture[0] ?? '') }}" class="product-main-image">
                            </figure>
                        </div>
                        <div class="product-share">
                            <div class="social-btn">
                                <ul>
{{--                                    <a href="#" class="social-link" target="_blank">--}}
{{--                                        <li><i class="fas fa-link social-icon"></i></li>--}}
{{--                                    </a>--}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" class="social-link" target="_blank">
                                        <li><i class="fab fa-facebook-f social-icon"></i></li>
                                    </a>
{{--                                    <a href="#" class="social-link" target="_blank">--}}
{{--                                        <li><i class="fab fa-instagram social-icon"></i></li>--}}
{{--                                    </a>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-content col-md-5">
                        <h1 class="product-title">{{ $item->title }}</h1>
                        <div class="product-price">
                            <span class="price"></span>
                        </div>
                        <span class="product-detail-option">Color</span>
                        <ul class="options-list colors">
                            @foreach($item->details as $detail)
                                <li id="color_{{$detail->id}}" class="{{ strtolower($detail->color) }} color-picker" value="{{ $detail->id }}" title="{{ucfirst($detail->color) }}"></li>
                            @endforeach
                        </ul>
                        <span class="product-detail-option">Size</span>
                        <ul class="options-list item-size"></ul>
                        <!-- display all errors  -->
                        <div id="error" class="has-text-danger mt-2 text-center"></div>
                        <div class="product-chat">
                            @if(sizeof($item->details) == 0)
                                <button class="btn out-of-stock hide" disabled>Out of stock</button>
                            @else
                                <button class="btn chat-with-shop" id="openChat" >Chat with shop</button>
                            @endif
                        </div>
                        <div class="product-likes">
                            <div class="like-count-list">
                                <a href="#" class="like-link" id="like-btn">
                                    <span class="like-icon">
                                        <img id="normal-heart" class="heart-icon" src="https://img.icons8.com/carbon-copy/100/000000/like--v2.png"/>
                                        <img id="red-heart" class="heart-icon" src="https://img.icons8.com/plasticine/100/000000/like--v1.png"/>
                                    </span>
                                    <span id="like-count"></span>
                                </a>
                            </div>
                        </div>
                        <div class="help-index">
                            <div id="accordion" class="panel-group">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                            <h4>Description</h4>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="description-detail">
                                                <p>{{ $item->description }}</p>
                                            </div>
                                            <p><strong>CATEGORY : </strong> {{optional($item->category)->name }}</p>
                                            <p><strong>SUB CATEGORY : </strong> {{optional($item->subCategory)->name }}</p>
                                            <p><strong>BRAND : </strong> {{optional($item->brand)->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                            <h4>Shop Information</h4>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="description-detail">
                                                <p><strong>INTRO : </strong> </p> {{ $item->user->description }}
                                            </div>
                                            <p><strong>OTHER</strong></p>
                                            <ul>
                                                <li><a href="{{ route('shop.profile',$item->user_id) }}">{{ $item->user->first_name }}</a></li>
                                                <li>{{ optional($item->user->shop)->website }}</li>
                                                <li>{{ optional($item->user->address)->address }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-other">
                    <div class="related-products-container">
                        <div class="related-products products-slider">
                            <div class="desktop">
                                <h2>Similar Items</h2>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                                    <ol class="carousel-indicators">
                                        @if(count($similerItems) >0)
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        @endif
                                        @if(count($similerItems) >= 6)
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        @endif
                                        @if(count($similerItems) >= 12)
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        @endif
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            @if(count($similerItems) > 0)
                                            <div class="row">
                                                @for($index = 0; $index < 6; $index++)
                                                    @if(isset($similerItems[$index]))
                                                    <div class="col-sm-2">
                                                        <div class="thumb-wrapper">
                                                            <div class="img-box">
                                                                <a href="{{route('itemDetail', $similerItems[$index]->id) }}">
                                                                    <img src="{{url(optional($similerItems[$index]->detail[0])->picture[0])}}" class="img-fluid" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="thumb-content">
                                                                <div class="display-name">{{ $similerItems[$index]->title }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endfor
                                            </div>
                                            @endif
                                        </div>
                                        @if(count($similerItems) >= 6)
                                        <div class="carousel-item">
                                            <div class="row">
                                                @for($index = 6; $index < 12; $index++)
                                                    @if(isset($similerItems[$index]))
                                                        <div class="col-sm-2">
                                                            <div class="thumb-wrapper">
                                                                <div class="img-box">
                                                                    <a href="{{route('itemDetail', $similerItems[$index]->id) }}">
                                                                        <img src="{{url(optional($similerItems[$index]->detail[0])->picture[0])}}" class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="thumb-content">
                                                                    <div class="display-name">{{ $similerItems[$index]->title }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        @endif
                                        @if(count($similerItems) >= 12)
                                        <div class="carousel-item">
                                            <div class="row">
                                                @for($index = 12; $index < 18; $index++)
                                                    @if(isset($similerItems[$index]))
                                                        <div class="col-sm-2">
                                                            <div class="thumb-wrapper">
                                                                <div class="img-box">
                                                                    <a href="{{route('itemDetail', $similerItems[$index]->id) }}">
                                                                        <img src="{{url(optional($similerItems[$index]->detail[0])->picture[0])}}" class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="thumb-content">
                                                                    <div class="display-name">{{ $similerItems[$index]->title }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @if(count($similerItems) >= 6)
                                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="same-store-products-container">
                        <div class="same-store">
                            <h2>Same Store Products</h2>
                            <div class="container">
                                <div class="row">
                                    @foreach($item->shopOtherItems->take(6) as $shopItem)
                                        <div class="same-store-item">
                                            <a href="{{route('itemDetail', $shopItem->id) }}">
                                                <img src="{{url(optional($shopItem->detail[0])->picture[0])}}">
                                            </a>
                                            <div style="padding: 15px 0; user-select: none">
                                                <div class="display-name">{{ $shopItem->title }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    //initial
    let itemDetail = null;
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'vnd',
    });

    $(document).ready(function () {
        $('#carousel-example').on('slide.bs.carousel', function (e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 5;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    // append slides to end
                    if (e.direction=="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });
    });

    //Like handle
    $(document).ready(function() {

        loadLikes();

        $("#like-btn").click(function() {
            if ("{{Auth::User()}}") {
                let isInsertLike = false;
                toogleLikeButton();
                if ($("#like-btn").hasClass("red-like")) {
                    isInsertLike = true;
                    $("#like-count").text(parseInt($("#like-count").text()) + 1);
                } else {
                    $("#like-count").text(parseInt($("#like-count").text()) - 1);
                }
                handleLikes(isInsertLike);
            } else {
                window.location.href = "{{route('login')}}";
            }
        });
    });

    function handleLikes(isInsertLike) {
        let isInsertLikes;
        let itemId;
        let url = "{{route('addRemoveLikeItem')}}";
        let data = {
            isInsertLikes: isInsertLike,
            itemId: "{{$item->id}}"
        }

        AjaxRequest.post(url, data).done((data) => {
        });
    }
    function loadLikes() {
        let url = "{{route('loadLikeItem')}}";
        let data = {
            itemId: "{{$item->id}}"
        }
        AjaxRequest.post(url, data).done((data) => {
            if (data.likeStatus) {
                changeLikeButtonToHighlight();
            } else {
                changeLikeButtonToNormal();
            }
            $("#like-count").text(data.likesCount);
        });
    }
    function toogleLikeButton() {
        if ($("#like-btn").hasClass("red-like")) {
            changeLikeButtonToNormal();
        } else {
            changeLikeButtonToHighlight();
        }
    }
    function changeLikeButtonToNormal() {
        $("#red-heart").removeClass("active-heart");
        $("#like-btn").removeClass("red-like");
        $("#normal-heart").addClass("active-heart");
    }
    function changeLikeButtonToHighlight() {
        $("#normal-heart").removeClass("active-heart")
        $("#red-heart").addClass("active-heart");
        $("#like-btn").addClass("red-like");
    }

    $(document).ready(function() {
        var itemDetailId = '{{ $item->details[0]->id ?? ""}}';
        if (itemDetailId) {
            itemDetail = apiCall(itemDetailId);
        }
        // change item image on thumbs item click
        $('.item-thumbs').on('click', 'figure', function(fig) {
            $('.item-thumbs figure').removeClass('active');
            $(this).addClass('active');
            $('.item-full img').attr('src', $(fig.target).attr('src'));
        });
        $('.item-size').on('click', 'li', function() {
            $('.item-size li').removeClass('active');
            $(this).addClass('active');
            // price is related with item size
            priceUpdate($(this).val());
        });
        $('.colors li').click(function() {
            let itemDetailId = $(this).attr('value');
            if (itemDetail == null || itemDetail.id != itemDetailId) {
                apiCall(itemDetailId);
            }
        });
    });

    $(document).ready(function() {
        // decrese item quntity
        $('.fa-minus').click(function() {
            var quantity = $(this).parent().children('.item-quantity').text() - 1;
            $(this).parent().children('.item-quantity').text(quantity);

            // disable button click
            if (quantity <= 1) {
                $(this).addClass('btn-disabled').attr("disabled", true);
            }
        });
        // increment item quntity
        $('.fa-plus').click(function() {
            var parent = $(this).parent();
            var quantity = parseInt(parent.children('.item-quantity').text()) + 1;
            parent.children('.item-quantity').text(quantity);
            // enable minus button click
            parent.children('.fa-minus').removeClass('btn-disabled').removeAttr("disabled");
        });
        $('#openChat').click(function() {
            const itemInfoId = $('.item-size .active').val();
            const color = $('.colors').children('.active').val();
            const colorName = $('.colors').children('.active').attr('title');
            const quantity = parseInt($('.item-quantity').text());
            let flag = false;
            $('#error').empty();
            if (!itemInfoId) {
                var error = `<li>{{__('item_detail.size_required')}}</li>`;
                $('#error').append(error);
                flag = true;
            }
            if (!color) {
                var error = `<li>{{__('item_detail.color_required')}}</li>`;
                $('#error').append(error);
                flag = true;
            }
            // required field are empty
            if (flag) return;
            // start messaging with shop owner

            createChannel(messageHtml(itemInfoId, colorName, 1));
            // Cart function
            // saveCart(itemInfoId, quantity);
            // $("#myToast").toast('show');
        });
    });

    /**
     * As per client review on 16 june 2020,
     * Cart function not required for phase 3
     * Comment out below cart function code for future use.
     * Date: 06.17.2020
     */

    // function saveCart(item_detail_information_id, quantity) {
    //     if (!('{{Auth::check()}}')) {
    //         return;
    //     }

    //     $cart_item = {
    //         'user_id': '{{ optional(Auth::user())->id }}',
    //         'item_detail_information_id': item_detail_information_id,
    //         'quantity': quantity,
    //     };
    //     var url = "{{ route('cartSave') }}";

    //     AjaxRequest.post(url, $cart_item).then(function(data) {
    //         // $('#cartTotal').text(data.quantity);

    //         updateCartTotal(data.quantity);
    //     }).catch(function(err) {
    //         console.log(err);
    //     });
    // }

    function apiCall(detailId) {
        let url = "{{ route('apiItemDetail','') }}" + '/' + detailId;
        AjaxRequest.get(url).then(function(data) {
            itemDetail = JSON.parse(data);
            // update UI
            updateSize();
            updateThumbs();
            priceUpdate();
            updateView(detailId);
            console.log('Api call success');
        }).catch(function(err) {
            console.log(err);
        });
    }
    function updateSize() {
        if (itemDetail === null) return;
        let sizes = '';
        itemDetail.informations.forEach(element => {
            sizes += `<li class="white size" value="` + element.id + `">`+ element.size.toUpperCase() +`</li>`;
        });
        $('.item-size').empty();
        $('.item-size').append(sizes);
    }
    function updateThumbs() {
        if (itemDetail === null) return;
        let thumbs = '';
        itemDetail.picture.forEach(element => {
        thumbs += ` <figure class="">
                        <img id="item_img_` + itemDetail.id + `" class="product-thumb-detail" value="` + itemDetail.id + `" src="{{ URL::asset('` + element + `') }}">
                    </figure>
                `;
        });
        $('.item-thumbs').empty();
        $('.item-thumbs').append(thumbs);
    }

    function priceUpdate(itemDetailInformationId = itemDetail.informations[0].id) {
        let itemInfo = itemDetail.informations.find(el => el.id == itemDetailInformationId);
        $('.price').text(formatter.format(itemInfo.price));
    }
    /**
     * Update view according to item selection
     */
    function updateView(detailId) {
        $('.colors li').removeClass('active');
        $('.item-thumbs>figure').removeClass('active');
        $('#color_' + detailId).addClass('active');
        $('#item_img_' + detailId).parent().addClass('active');
        $('.item-full img').attr('src', $('#item_img_' + detailId).attr('src'));
    }

    function createChannel(message) {
        if (!my_id) {
            $('#message-popup').fadeIn("slow");
        }
        $.ajax({
            type: "get",
            url: "{{ route('channel','') }}" + '/' + '{{ $item->user_id }}',
            success: function(data) {
                sentMessage(data, message);
                $('#message-popup').fadeIn("slow");
                $('#' + data).click();
                $('#' + data).parent().prepend($('#' + data));
                $('#channels li[id=' + data + ']').className = 'chat_channels chat_active';
            }
        });
    }

    // generate a item html template
    function messageHtml(itemInfoId, color, quantity) {
        let itemInfo = itemDetail.informations.find(el => el.id == itemInfoId);
        var picture = $('.item-full img').attr('src');
        var itemName = `{{ $item->title }}`;
        var price = itemInfo.price;
        var itemId = `{{ $item->id }}`;
        var message = `
                <a href="{{ route('itemDetail','') }}/` + itemId + `"style="text-decoration: none;" disabled>
                    <input id="itemInfoId_` + itemInfoId + `" type="hidden" value="` + itemInfoId + `">
                    <div class="item-element card" style="max-width:240px">
                        {{--<div class="card-header p-2">{{__('item_detail.title')}}</div>--}}
                        <div class="card-content pt-1 pb-1">
                            <div class="row">
                                <div class="col-4 px-2">
                                    <img src="` + picture + `" alt="" class="zoom-img">
                                </div>
                                <div class="col-8">
                                    <p class="is-size-6 has-text-weight-bold text-left">` + itemName + `</p>
                                    <p class="is-size-7 has-text-weight-bold dark-red text-left"> ` + formatter.format(itemInfo.price) + ` </p>
                                    <p class="text-left">
                                        <span class="is-size-7">{{__('item_detail.color')}}: ` + color + `</span>
                                        <span class="is-size-7">{{__('item_detail.size')}}: ` +  itemInfo.size.toUpperCase() + ` </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-1 level">
                        {{--<span>{{__('item_detail.quantity')}} : ` + quantity + `</span>--}}
                        <span>See detail</span>
                        <span class="has-text-danger is-hidden">{{__('item_detail.out_of_stock')}}</span>
                        </div>
                    </div>
                </a>
                `;
        return message;
    }

    function sentMessage(channel_id, message) {
        $data = {
            'channel_id': channel_id,
            'message': message,
        };
        var url = "{{ route('messagePost') }}";
        AjaxRequest.post(url, $data).then(function(data) {
            console.log(data);
        }).catch(function(err) {
            console.log(err);
        });
    }
</script>
@endsection('script')
