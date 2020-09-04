@extends('master')
@section('custom-css')
<style>
    .fa-asterisk {
        font-size: 7pt;
        color: #ff000085;
    }
    .image img {
        height: 250px;
        max-width: 220px;
        border: 1px solid;
        border-style: dotted;
    }
    .file .file-label {
        width: 220px;
        margin-top: 1px;
    }
    .hashTagOutput {
        width: 100%;
    }
    .hashTagInput {
        width: 100%;
        display: flex;
    }
    .hashTagAdvice {
        width: 100%;
    }
    .autocomplete {
        width: 80%;
        padding: 0 10px 0 0;
        position: relative;
    }
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 999;
        top: 100%;
        left: 0%;
        right: 3%;
    }
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
    .hashTagAddNew {
        width: 20%;
        padding: 0 0 0 10px;
    }
    .hashTagAddNew #addNewHashTagButton.btn-off {
        background-color: #ccc;
        color: #fff;
        cursor: default;
    }
    .hashTagAddNew #addNewHashTagButton {
        background-color: #167df0;
        cursor: pointer;
        color: #fff;
    }
    .hashTagOutput.row {
        margin: 0 0 10px 0;
    }
    .hashtags {
        height: 30px;
        border: 1px #e3e3e3 solid;
        background-color: #fbfbfb;
        color: #333;
        padding: 3px 10px 0px 10px;
        border-radius: 3px;
        margin: 0 10px 10px 0;
        position: relative;
    }
    .hashtags p {
        margin: 0;
    }
    .delete-hashtag {
        position: absolute;
        background-color: #888;
        color: #fff;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        top: -8px;
        right: -8px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        cursor: pointer;
        font-size: 10px;
    }
    .delete-hashtag:hover {
        transform: scale(1.3);
        background-color: #999;
        opacity: 0.7;
    }
    #countHashTag {
        border: none;
        width: 24px;
        height: 20px;
    }
    .hashTagAdvice p{
        font-size: 10px;
    }
    .hashTagAdvice p.displayCountTag{
        font-size: 12px;
        margin: 0;
    }
</style>
@endsection

@section('main')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    @if(isset($look))
                    {{ __('look_upload.look_edit') }}
                    @else
                    {{ __('look_upload.look_upload') }}
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" onsubmit="return validation()" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            @if(session('message'))
                            <div class="alert alert-success mx-auto" role="alert">
                                <span class="alert ">{{ session('message') }} </span>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('look_upload.picture') }}
                                <i class="fas fa-asterisk"></i></label>

                            <div class="col-md-6">
                                <div class="image">
                                    <img id="imagePreview" src="{{ isset($look) ? url($look->picture) : url('/img/no-image.png') }}" />
                                </div>
                                <div class="file">
                                    <label class="file-label">
                                        <input id="image" value="@if(isset($look)){{ $look->picture }}@endif" onchange="previewImage()" class="file-input" type="file" name="image">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                {{ __('look_upload.choose_pic') }}
                                            </span>
                                        </span>

                                    </label>

                                </div>
                                <div id="show_error" style="color:red">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('look_upload.title') }}
                                <i class="fas fa-asterisk"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="title" type="text" value="@if(isset($look)){{ $look->title }}@endif" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="{{ __('look_upload.title') }}" autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('look_upload.look_details') }}
                                <i class="fas fa-asterisk"></i>
                            </label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" maxlength='2000' name="description" autofocus>@if(isset($look)){{ $look->description }}@endif </textarea>
                                <p>{{ __('look_upload.max_words') }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('look_upload.items') }}
                                <i class="fas fa-asterisk"></i>
                            </label>

                            <div class="col-md-6">
                                <div id="selectedItems" class="input-group">
                                    @if(isset($lookItems))
                                    @foreach($lookItems as $lookItem)
                                    <div class="mt-2 mb-3 list">
                                        <div class="columns p-1 pb-2">
                                            <div class="column">
                                                <img src="{{ url($lookItem['image']) }}" alt="" class="zoom-img">
                                            </div>
                                            <div class="column">
                                                <p class="m-0">name: <span class="name"> {{ $lookItem['name'] }} </span></p>
                                                <p class="m-0">category: <span class="category"> {{ $lookItem['category'] }} </span></p>
                                                <p class="m-0">sub-category: <span class="sub-category"> {{ $lookItem['sub_category'] }} </span></p>
                                                <p class="m-0">brand: <span class="brand"> {{ $lookItem['brand'] }} </span></p>
                                                <p class="m-0">color: <span class="color"> {{ $lookItem['color'] }} </span></p>
                                                <p class="m-0 dark-red">price: <span class="price"> {{ $lookItem['price'] }} </span></p>
                                                <button type="button" class="button has-text-danger mt-2 remove-item">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <input class="item-detail-information-id" name="item_information_id[]" type="hidden" value="{{ $lookItem['item_detail_information_id'] }}">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div id="addItem" data-toggle="modal" data-target="#itemModa" class="button pl-3 pr-3">
                                        <span>{{ __('look_upload.add_item') }}</span>
                                    </div>
                                    <!-- On addItem click a modal will open in outside of the form  -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hashtag" class="col-md-4 col-form-label text-md-right">Hash Tags</label>
                            <div class="col-md-6">
                                <div class="hashTagOutput row" id="hashTagOutput">
                                    @if (isset($look))
                                        @if (isset($look->hashtags))
                                            @foreach($look->hashtags as $key => $lookHashTag)
                                            <div id="hashtag-{{$key}}" class="hashtags">
                                                <p>{{optional($lookHashTag->hashTag)['name']}}</p>
                                                <div class="delete-hashtag" id="delete-hashtag-{{$key}}" onclick="deleteHastag(this.id)">x</div>
                                                <input type="hidden" id="hashtag-hidden-{{$key}}" name="hashTag[]" value="{{optional($lookHashTag->hashTag)['name']}}">
                                            </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                <div class="hashTagInput">
                                    <div class="autocomplete">
                                        <input id="hashtagInp" type="text" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="hashTagAddNew">
                                        <input id="addNewHashTagButton" disabled type="button" class="form-control btn-off" value="Add">
                                    </div>
                                </div>
                                <div class="hashTagAdvice">
                                    <p class="displayCountTag">Add up to 10 tags (<input id="countHashTag" value="{{isset($look->hashtags) ? (10-sizeof($look->hashtags)) : 10}}" style="text-align: center" disabled>left)</p>
                                    <p>Make your look easy to find by adding tags, especially suggested tags</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.gender') }}
                                <i class="fas fa-asterisk"></i>
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    @include('components.gender')
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.height') }}

                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group">
                                        @include('components.height')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.age') }}
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group">
                                        @include('components.age')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- all form actoin button  -->
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                @if(isset($look))
                                <button type="submit" formaction="{{ route('individual.lookUpdate',$look['id']) }}" class="button is-info">
                                    {{ __('look_upload.update') }}
                                </button>
                                <a href="{{ route('individual.lookDelete',$look['id']) }}" class="button is-danger ml-3" style="text-decoration: none">
                                    {{ __('look_upload.delete') }}
                                </a>
                                <!-- <button type="submit" formaction="{{ route('individual.lookDelete',$look['id']) }}" class="button is-danger ml-3">
                                    {{ __('look_upload.delete') }}
                                </button> -->
                                @else
                                <button type="submit" formaction="{{ route('individual.lookUpload') }}" class="button is-info">
                                    {{ __('look_upload.publish') }}
                                </button>
                                @endif
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('individual.profile', Auth::user()->id) }}" style="text-decoration: none" class="button">
                                    {{ __('look_upload.cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- addItem modal will open here -->
                    <div class="modal fade" id="itemModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        @include('components.modals.item')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    /**
     * Currency formater
     */
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'vnd',
    });
    var selectedItems = [];
    let arrayHashTag = [];
    var numberOfHashTag;
    $.ajax({
        type: 'GET',
        url : "{{ route('apiHashTag') }}",
        success: function (data) {
            data.forEach(element => {
                arrayHashTag.push(element['name']);
            });
        }
    });


    $(function () {
        numberOfHashTag = "{{ isset($look->hashtags) ? sizeof($look->hashtags) : 0 }}";
        if (numberOfHashTag >= 10) {
            $("#hashtagInp").prop("disabled", true);
            disableAddHashTagBtn();
        } else {
            $("#hashtagInp").prop("disabled", false);
            ableAddHashTagBtn();
        }
        inputHashTag(document.getElementById("hashtagInp"), arrayHashTag);
    });

    function inputHashTag(inp, arr) {
        let currentFocus;
        inp.addEventListener("input", function (e) {
            let div1, div2, val = this.value;
            closeAllList();
            if (!val) { return false;}
            currentFocus = -1;
            if (val && currentFocus == -1) {
                ableAddHashTagBtn();
            } else {
                disableAddHashTagBtn();
            }
            div1 = document.createElement("DIV");
            div1.setAttribute("id", this.id + "autocomplete-list");
            div1.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(div1);
            for (let i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    div2 = document.createElement("DIV");
                    div2.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    div2.innerHTML += arr[i].substr(val.length);
                    div2.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    div2.addEventListener("click", function (e) {
                        let htVal = this.getElementsByTagName("input")[0].value;
                        if (checkIfHashTagExist(htVal)) {
                            alert("Tag had been added already");
                            return;
                        }
                        let hashTagDisplayed = document.createElement("div");
                        hashTagDisplayed.setAttribute("id", "hashtag-"+numberOfHashTag);
                        hashTagDisplayed.setAttribute("class", "hashtags");
                        hashTagDisplayed.innerHTML = "<p>"+htVal+"</p>";
                        hashTagDisplayed.innerHTML += "<div class='delete-hashtag' id='delete-hashtag-"+numberOfHashTag+"' onclick='deleteHastag(this.id)'>x</div>";
                        hashTagDisplayed.innerHTML += "<input type='hidden' id='hashtag-hidden-"+numberOfHashTag+"' name='hashTag[]' value='"+htVal+"'>";
                        document.getElementById("hashTagOutput").appendChild(hashTagDisplayed);
                        // inp.value = this.getElementsByTagName("input")[0].value;
                        inp.value = "";
                        numberOfHashTag++;
                        $("#countHashTag").val(10-numberOfHashTag);
                        closeAllList();
                        if (numberOfHashTag >= 10) {
                            $("#hashtagInp").prop("disabled", true);
                        } else {
                            $("#hashtagInp").prop("disabled", false);
                        }
                    });
                    div1.appendChild(div2);
                }
            }
            document.getElementById("addNewHashTagButton").onclick = function () {
                let htVal = $("#hashtagInp").val();
                if (!htVal) {
                    alert("Tag is empty");
                    return;
                }
                if (checkIfHashTagExist(htVal)) {
                    alert("Tag had been added already");
                    return;
                }
                let hashTagDisplayed = document.createElement("div");
                hashTagDisplayed.setAttribute("id", "hashtag-"+numberOfHashTag);
                hashTagDisplayed.setAttribute("class", "hashtags");
                hashTagDisplayed.innerHTML = "<p>"+htVal+"</p>";
                hashTagDisplayed.innerHTML += "<div class='delete-hashtag' id='delete-hashtag-"+numberOfHashTag+"' onclick='deleteHastag(this.id)'>x</div>";
                hashTagDisplayed.innerHTML += "<input type='hidden' id='hashtag-hidden-"+numberOfHashTag+"' name='hashTag[]' value='"+htVal+"'>";
                document.getElementById("hashTagOutput").appendChild(hashTagDisplayed);
                inp.value = "";
                numberOfHashTag++;
                $("#countHashTag").val(10-numberOfHashTag);
                closeAllList();
                if (numberOfHashTag >= 10) {
                    $("#hashtagInp").prop("disabled", true);
                    disableAddHashTagBtn();
                } else {
                    $("#hashtagInp").prop("disabled", false);
                }
            }
        });
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id+ "autocomplete-list");
            if (x) x= x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                if (currentFocus != -1) {
                    disableAddHashTagBtn();
                    addActive(x);
                } else {
                    ableAddHashTagBtn();
                }
            } else if (e.keyCode == 38) {
                currentFocus--;
                if (currentFocus != -1) {
                    disableAddHashTagBtn();
                    addActive(x);
                } else {
                    ableAddHashTagBtn();
                }
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            } else if (e.keyCode == 9) {
                closeAllList();
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = -1;
            if (currentFocus < -1) currentFocus = (x.length - 1);
            if (currentFocus < 0) {
                removeActive(x);
                ableAddHashTagBtn();
            } else {
                x[currentFocus].classList.add("autocomplete-active");
                disableAddHashTagBtn();
            }
        }
        function removeActive(x) {
            for (let i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllList(elmnt) {
            let x = document.getElementsByClassName("autocomplete-items");
            for (let i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener("click", function (e) {
            closeAllList();
        });
    }

    function disableAddHashTagBtn() {
        $("#addNewHashTagButton").addClass("btn-off");
        $("#addNewHashTagButton").attr("disabled", true);
    }
    function ableAddHashTagBtn() {
        $("#addNewHashTagButton").attr("disabled", false);
        $("#addNewHashTagButton").removeClass("btn-off");
    }

    function replaceHashTagId(oldVariable, newVariable) {
        document.getElementById("hashtag-"+oldVariable).id = "hashtag-"+newVariable;
        document.getElementById("delete-hashtag-"+oldVariable).id = "delete-hashtag-" + newVariable;
        document.getElementById("hashtag-hidden-"+oldVariable).id = "hashtag-hidden-"+newVariable;
     }

    function checkIfHashTagExist(variable) {
        for (let i = 0; i < numberOfHashTag; i++) {
            if ($("#hashtag-hidden-"+i).val() === variable) {
                return true;
            }
        }
        return false;
    }

    function deleteHastag(variable) {
        let lastChar = variable[variable.length - 1];
        $("#hashtag-"+lastChar).remove();
        numberOfHashTag--;
        $("#countHashTag").val(10-numberOfHashTag);
        $("#hashtagInp").prop("disabled", false);
        for (let i = lastChar; i < numberOfHashTag; i++) {
            replaceHashTagId(parseInt(parseInt(i)+1), i);
        }
    }

    $(document).ready(function() {
        // initiate default search result
        var query = $('#search .input').val();
        search(query);

        var height = '{{ $look->height ?? Auth::user()->height }}';
        var gender = '{{ $look->gender ?? Auth::user()->gender }}';
        var age = '{{ $look->age ?? Auth::user()->age() }}';

        $("#height option[value='" + height + "']").attr("selected", "selected");
        $("#gender option[value='" + gender + "']").attr("selected", "selected");
        $("#age option[value='" + age + "']").attr("selected", "selected");
    });


    function validation() {
        console.log($('form').attr('method'));

        var isNotEmpty = true;
        $('#show_error').empty(); // remove all old error message

        var oldImage = '@if(isset($look)) {{$look->picture }} @endif';
        if (!$('#image').val() & !oldImage) {
            $('#show_error').append('<li> {{ __("look_upload.image_required") }} </li>');
            isNotEmpty = false;
        }

        if (!$('#title').val()) {
            $('#show_error').append('<li> {{ __("look_upload.title_required") }} </li>');
            isNotEmpty = false;
        }

        if (!$('#description').val()) {
            $('#show_error').append('<li> {{ __("look_upload.description_required") }} </li>');
            isNotEmpty = false;
        }

        if (!$('#gender').val()) {
            $('#show_error').append('<li> {{ __("look_upload.gender_required") }} </li>');
            isNotEmpty = false;
        }

        if (!$('.item-detail-information-id').val()) {
            $('#show_error').append('<li> {{ __("look_upload.item_required") }} </li>');
            isNotEmpty = false;
        }

        return isNotEmpty;
    }
    // On Picture selection preview initialize
    function previewImage() {
        var fileReader = new FileReader();
        fileReader.readAsDataURL(document.getElementById("image").files[0]);

        fileReader.onload = function(oFREvent) {
            document.getElementById("imagePreview").src = oFREvent.target.result;
        };
    };

    $(document).ready(function() {
        itemSearchTabActive();
        $('#search button').on('click', function() {
            search();
        });

        // search input field action
        $('#searchKey').keyup(function(e) {
            if (e.keyCode == 13) {
                $(this).trigger("enterKey");
            }
        });

        $('#searchKey').bind("enterKey", function(e) {
            search();
        });
    });

    // search item and add to modal
    function search(query = $('#search .input').val()) {
        var url = "{{ route('apiItemSearch') }}" + '?q=' + query;

        AjaxRequest.get(url).then(function(data) {
            $('#items').empty();

            data.forEach(item => {
                $('#items').append(itemHtml(item));
            });

            console.log('Api call success');
        }).catch(function(err) {
            console.log(err);
        });
    }

    $(document).on('click', '.back', function(element) {
        itemSearchTabActive();
    });

    $(document).on('click', '.item-details #detail_list .card', function(element) {
        $(this).toggleClass('active');
    });

    $(document).on('click', '.remove-item', function(element) {
        $(this).parents('.list').remove();
    });

    $(document).on('click', '.item-details #confirm_item', function(element) {
        var parent = ($(this).parents('.item-details'));
        var details = [];

        var item = {
            'id': $(parent).find('#item_id').val(),
            'name': $(parent).find('#name').text(),
            'shop': $(parent).find('#shop').text(),
            'category': $(parent).find('#category').text(),
            'sub_category': $(parent).find('#sub_category').text(),
            'brand': $(parent).find('#brand').text(),
        };

        $('.item-details #detail_list .active').each(function(index) {
            details.push({
                'item_detail_information_id': $(this).find('input').val(),
                'image': $(this).find('img').attr('src'),
                'price': removeFormatter(($(this).find('.price').text()).trim()),
                'color': ($(this).find('.color').text()).trim(),
                'size': ($(this).find('.size').text()).trim(),
            });
        });

        updateSelectedItem(item, details);
        itemSearchTabActive();

        $('.item-details #detail_list .card').removeClass('active');

    });

    function updateSelectedItem(item, details) {

        details.forEach(function(detail) {
            $('#selectedItems').append(selectedItemHtml(item, detail));
        });
    }
    // item click listener
    $(document).on('click', '#itemModa #items li', function(element) {
        var itemId = $(this).find('input').val();
        itemSearchTabDeActive();

        let url = "{{ url('/api/') }}" + "/items/" + itemId + "/details";
        AjaxRequest.get(url).then(function(item) {
            $('.item-details #name').text(item.name);
            $('.item-details #shop').text(item.shop);
            $('.item-details #category').text(item.category);
            $('.item-details #sub_category').text(item.sub_category);
            $('.item-details #brand').text(item.brand);
            $('.item-details #item_id').val(item.id);
            $('.item-details #detail_list').empty();

            // udpate selected item list
            selectedItems = getSelectedItems();

            item.details.forEach(itemDetails => {
                $('.item-details #detail_list').append(itemDetailHtml(itemDetails));
            });
        }).catch(function(err) {
            console.log(err);
        });
    });

    function nullCheck(value) {
        return value != null ? value : '';
    }

    //----------------------- Tab1 and Tab2 active/inactive function ------------------------
    function itemSearchTabActive() {
        $('#tab_left').removeClass('inactive');
        itemDetailTabDeActive();
    }

    function itemSearchTabDeActive() {
        $('#tab_left').addClass('inactive');
        itemDetailTabActive();
    }

    function itemDetailTabActive() {
        $('.modal-header #size').removeClass('inactive');
        $('#tab_right').removeClass('inactive');

        $('.modal-header #select_item').addClass('back');
    }

    function itemDetailTabDeActive() {
        $('.modal-header #size').addClass('inactive');
        $('#tab_right').addClass('inactive');

        $('.modal-header #select_item').removeClass('back');
    }

    function getSelectedItems(){
        var items = [];
        $("#selectedItems .item-detail-information-id").each(function() {
            items.push($(this).val());
        });

        return items;
    }
    //----------------------------- HTML template generate ----------------------------------
    function itemHtml(item) {
        return `
            <li class="card">
                <div class="top">
                    <img src="{{url('')}}/` + item.picture + `">
                </div>
                <div class="p-1 bottom">
                    <p class="item-title mb-0" > name: ` + item.name + ` </p>
                    <p class="item-title mb-0" > brand: ` + nullCheck(item.brand) + ` </p>
                    <p class="item-title mb-0" > shop: ` + item.shop + ` </p>
                </div>
                <input type="hidden" value="` + item.id + `">
            </li>
        `;
    }

    function itemDetailHtml(itemDetail) {
        var isSelected = '';
        if (selectedItems.find(element => element == itemDetail.detail_information_id)) {
            isSelected = 'disable-click';
        }

        return `
            <li class="card `+isSelected+`">
                <div class="top">
                    <img src="{{url('')}}/` + itemDetail.picture + `">
                </div>
                <div class="p-1 bottom">
                    <ul>
                        <li> price&nbsp;: <span class="upper-case price"> ` + formatter.format(itemDetail.price) + ` </span> </li>
                        <li> size &nbsp; : <span class="upper-case size"> ` + itemDetail.size + ` </span> </li>
                        <li> color : <span class="upper-case color"> ` + itemDetail.color + ` </span> </li>
                    </ul>
                </div>
                <input type="hidden" value="` + itemDetail.detail_information_id + `">
            </li>
        `;
    }

    function selectedItemHtml(item, detail) {
        return `
            <div class="mt-2 mb-3 list">
                <div class="columns p-1 pb-0 mb-0">
                    <div class="column">
                        <img src="` + detail.image + `" alt="" class="zoom-img">
                    </div>
                    <div class="column">
                        <p class="m-0">name: <span class="name">` + item.name + `</span></p>
                        <p class="m-0">category: <span class="category">` + item.category + `</span></p>
                        <p class="m-0">sub-category: <span class="sub-category">` + item.sub_category + `</span></p>
                        <p class="m-0">brand: <span class="brand">` + item.brand + `</span></p>
                        <p class="m-0">color: <span class="color">` + detail.color + `</span></p>
                        <p class="m-0 dark-red">price: <span class="price">` + formatter.format(detail.price) + `</span></p>
                        <button type="button" class="button has-text-danger mt-2 remove-item">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <input class="item-detail-information-id" name="item_information_id[]" type="hidden" value="` + detail.item_detail_information_id + `">
            </div>
        `;
    }
</script>
@endsection
