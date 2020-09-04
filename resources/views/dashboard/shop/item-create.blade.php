@extends('master')
@section('custom-css')
    <style>
        .fa-asterisk {
            font-size: 7pt;
            color: #ff000085;
        }
        .col-md-6.size-group {
            display: flex;
            /*flex-direction: row;*/
            align-items: center;
        }
        .size-title {
            margin: 0 20px 0 3px;
            font-weight: bold;
            align-self: flex-end;
            line-height: 14px;
            font-size: 14px;
        }
        .sizeselector {
            cursor: pointer;
            width: 16px;
            height: 16px;
        }
        .table-responsive-xl {
            width: 90%;
            margin: auto;
            /*border-radius: 4px;*/
        }
        .table.table-bordered {
            border-radius: 4px;
        }
        .table.table-bordered thead {
            background-color: #ebecf0;
        }
        input[type="file"] {
            display:block;
            color: transparent;
        }
        .imageThumb {
            width: 75px;
            height: 75px;
            border: 2px solid;
            margin: 10px 10px 0 0;
            padding: 1px;
        }
        .row.pro-image-zone {
            margin-left: 0;
            margin-right: 0;
        }
        .image-cancel {
            position: absolute;
            right: 10px;
            top: 0;
            font-size: 14px;
            line-height: 14px;
            margin-left: 5px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 50%;
            text-align: center;
            height: 14px;
            width: 14px;
            color: #ffffff;
            background-color: #000000;
            display: none;
            z-index: 1000;
        }
        .preview-image {
            height: 80px;
            width: 80px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }
        .preview-image {
            padding: 0;
        }
        .preview-image:hover {
            opacity: 0.5;
        }
        .preview-image:hover .image-cancel{
            display: block;
        }
        .brandInput {
            position: relative;
            /*display: flex;*/
        }
        .deleteBrand-icon {
            position: absolute;
            right: calc(0.75em );
            top: 13px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: none;
        }
        .searchBrand-icon {
            position: absolute;
            right: -30px;
            top: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 200ms ease-in;
        }
        .searchBrand-icon.actived {
            transition: all 200ms ease-in;
            transform: scale(1.8);
        }
        #nobrand {
            color: #3f9ae5;
        }
        .invalid-feedback-size, .invalid-feedback-pic, .invalid-feedback-color {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #e3342f;
        }
        .autocomplete {
            position: relative;
            display: inline-block;
        }
        .autocomplete-items {
            position: absolute;
            z-index: 1000;
            top: 104%;
            left: 0px;
            right: 0;
            overflow: hidden;
            overflow-y: auto;
            max-height: 264px;
            border-left: 1px solid #d4d4d4;
            border-right: 1px solid #d4d4d4;
            border-radius: 5px;
            width: 100%;
            border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
        }
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
        .was-validated .custom-select:invalid, .custom-select.is-invalid {
            background: none;
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px
        }
        .was-validated .form-control:invalid, .form-control.is-invalid {
            background: none;
        }
        .was-validated .custom-select:valid, .custom-select.is-valid {
            background: none;
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px
        }
        .was-validated .form-control:valid, .form-control.is-valid {
            background: none;
            padding-right: 12px;
        }
        .form-control.is-valid, .was-validated .form-control:valid {
            border: 1px solid #ced4da;
        }
        .was-validated .form-control:valid:focus, .form-control.is-valid:focus {
            border-color: #a1cbef;
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
        }
        .was-validated .custom-select:valid:focus, .custom-select.is-valid:focus {
            border: 1px solid #ced4da;
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            color: #000;
        }
        .priceInput {
            background: #fff !important;
        }
        .up-down-btn {
            display: flex;
            cursor: pointer;
            margin-left: 10px;
            font-size: 19px;
        }
        .up-down-icon {
            line-height: 10px;
            font-size: 20px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .was-validated .custom-select:valid, .custom-select.is-valid {
            border: 1px solid #ced4da;
        }
        .was-validated .form-control:invalid, .form-control.is-invalid {
            padding-right: 12px;
        }
        .delete-link {
            width: 36px;
            height: 35px;
            display: block;
            text-align: center;
            text-indent: 20px;
            padding: 0 10px;
            border-radius: 3px;
            line-height: 35px;
            text-decoration: none;
            background: #dee2e6 url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBkPSJNNDI0LjU2MiA3OC4wMjJ2NDAuMDMySDg3LjQzOFY3OC4wMjJoOTQuOTM4YzE1LjQ2NCAwIDI4LTEyLjU0NiAyOC0yOC4wMjJoOTEuMjUgYzAgMTUuNSAxMi41IDI4IDI4IDI4LjAyMkg0MjQuNTYyeiBNNDA2LjMzNCAxNDguMDc5VjQ2MkgxMDUuNjY2VjE0OC4wNzlINDA2LjMzNHogTTE5Ny4zMzMgMjEwLjUgYzAtOC4yOTEtNi43MTYtMTUuMDEyLTE1LTE1LjAxMnMtMTUgNi43MjEtMTUgMTUuMDEydjE5MC4xNTNjMCA4LjMgNi43IDE1IDE1IDE1LjAxMnMxNS02LjcyMSAxNS0xNS4wMTJWMjEwLjQ2MnogTTI3MSAyMTAuNDYyYzAtOC4yOTEtNi43MTYtMTUuMDEyLTE1LTE1LjAxMnMtMTUgNi43MjEtMTUgMTUuMDEydjE5MC4xNTNjMCA4LjMgNi43IDE1IDE1IDE1LjAxMnMxNS02LjcyMSAxNS0xNS4wMTIgVjIxMC40NjJ6IE0zNDQuNjY3IDIxMC40NjJjMC04LjI5MS02LjcxNi0xNS4wMTItMTUtMTUuMDEycy0xNSA2LjcyMS0xNSAxNS4wMTJ2MTkwLjE1M2MwIDguMyA2LjcgMTUgMTUgMTUgczE1LTYuNzIxIDE1LTE1LjAxMlYyMTAuNDYyeiIgc3R5bGU9ImZpbGw6ICNGRkY7Ii8+PC9zdmc+) no-repeat 10px center;
            background-size: 17px;
            position: relative;
            transition: background 0.3s;
            cursor: pointer;
        }
        .delete-link:hover {
            background-color: #6c757d;
            text-decoration: none;
        }
        .delete-link.show-delete-box {
            background-color: #6c757d;
            text-decoration: none;
        }
        .show-delete-box .delete-box {
            display: block;
        }
        .delete-box {
            position: absolute;
            bottom: 40px;
            right: -147px;
            overflow: visible;
            background: #6c757d;
            color: #fff;
            border-radius: 5px;
            cursor: default;
            transition: opacity 0.3s, top 0.3s, width 0s 0.3s, height 0s 0.3s;
            z-index: 20;
            line-height: 22px;
            width: 555%;
            box-shadow: 7px 9px 7px -1px #888888;
            display: none;
        }
        .delete-box:after {
            content: "";
            display: block;
            width: 0px;
            border-top: 5px solid #fff;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            position: absolute;
            bottom: -5px;
            left: 15%;
        }
        .my-btn {
            justify-content: center;
            height: 38px;
            background-color: #fff;
            display: flex;
        }
        .btn-yes-no {
            color: #FFF;
            border-radius: 3px;
            height: 24px;
            cursor: pointer;
            transition: background 0.3s;
            margin: 8px;
            display: flex;
            width: 50%;
        }
        .myYes {
            background: #e3342f;
        }
        .myCancel {
            background: #6c757d;
        }
</style>
@endsection

@section('main')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if(isset($item))
                            {{ __('item_create.card_update_name') }}
                        @else
                            {{ __('item_create.card_create_name') }}
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" id="myForm" onsubmit="return validateMyForm()" novalidate autocomplete="off">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row">
                                @if(session('message'))
                                        <div class="alert alert-success mx-auto" role="alert">
                                        <span class="alert ">{{ session('message') }} </span>
                                    </div>
                                @endif
                            </div>

                            <!-------------------------ADD TITLE----------------------------------------------->
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('item_create.item_title') }}
                                    <i class="fas fa-asterisk"></i></label>
                                <div class="col-md-6" id="titleField">
                                    <input id="title" type="text" class="form-control" name="title" required value="@if(isset($item)){{ $item->title }}@endif">
                                    <div class="invalid-feedback">{{ __('item_create.title_required') }}</div>
                                </div>
                            </div>

                            <!-------------------------ADD DESCRIPTION----------------------------------------------->
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('item_create.item_description') }}
                                    <i class="fas fa-asterisk"></i></label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" rows="4" cols="50" required placeholder="{{ __('item_create.description_guide') }}" minlength="20" maxlength="2000">@if(isset($item)){{ $item->description }}@endif</textarea>
                                    <div class="invalid-feedback">{{ __('item_create.description_required') }}</div>
                                </div>
                            </div>

                            <!-------------------------ADD CATEGORY----------------------------------------------->
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('item_create.category') }} <i class="fas fa-asterisk"></i></label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <select id="category" class="custom-select" name="category" required onchange="changeCategory()">
                                            <option value="">{{ __('item_create.choose') }}</option>
                                        </select>
                                        <div class="invalid-feedback">{{ __('item_create.category_required') }}</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <select id="subCategory" class="custom-select" name="sub_category" required>
                                                <option value="">{{ __('item_create.sub_category') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-------------------------ADD BRAND----------------------------------------------->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('item_create.brand') }} </label>
                                <div class="col-md-4 autocomplete">
                                    <div class="brandInput">
                                        <input type="text" id="brand" value="{{ isset($item->brand) ? $item->brand["name"] : "No Brand" }}" name="myBrand" class="form-control" placeholder="{{ __('item_create.brand_guide') }}">
                                        <i class="fa fa-times deleteBrand-icon" aria-hidden="true" onclick="deleteBrand()"></i>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------ADD COLOR AND PICTURES----------------------------------------------->
                            <div id="colorandpic" class="colorandpic">
                                @if(isset($item))
                                    <?php $position = 0; ?>
                                    @foreach($item->details as $key => $itemDetail)
                                        @if($itemDetail["is_delete"] == 0)
                                        <div class="colorandpicDetail" id="colorandpic-{{$position}}">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('item_create.color') }} <i class="fas fa-asterisk"></i></label>
                                                <div class="col-md-4" >
                                                    <?php $itemDetailColor = strtolower($itemDetail['color']);?>
                                                    <select id="colorselector-{{$position}}" class="custom-select colorselector" name="color[]" onchange="changeColor(this.id)" required>
                                                        <option value="black" <?php if ($itemDetailColor == "black") echo "selected"; ?>>Black</option>
                                                        <option value="red" <?php if ($itemDetailColor == "red") echo "selected"; ?>>Red</option>
                                                        <option value="yellow" <?php if ($itemDetailColor == "yellow") echo "selected"; ?>>Yellow</option>
                                                        <option value="orange" <?php if ($itemDetailColor == "orange") echo "selected"; ?>>Orange</option>
                                                        <option value="white" <?php if ($itemDetailColor == "white") echo "selected"; ?>>White</option>
                                                        <option value="blue" <?php if ($itemDetailColor == "blue") echo "selected"; ?>>Blue</option>
                                                        <option value="green" <?php if ($itemDetailColor == "green") echo "selected"; ?>>Green</option>
                                                        <option value="gray" <?php if ($itemDetailColor == "gray") echo "selected"; ?>>Gray</option>
                                                        <option value="brown" <?php if ($itemDetailColor == "brown") echo "selected"; ?>>Brown</option>
                                                        <option value="violet" <?php if ($itemDetailColor == "violet") echo "selected"; ?>>Violet</option>
                                                        <option value="purple" <?php if ($itemDetailColor == "purple") echo "selected"; ?>>Purple</option>
                                                        <option value="coral" <?php if ($itemDetailColor == "coral") echo "selected"; ?>>Coral</option>
                                                        <option value="lemon" <?php if ($itemDetailColor == "lemon") echo "selected"; ?>>Lemon</option>
                                                        <option value="orchid" <?php if ($itemDetailColor == "orchid") echo "selected"; ?>>Orchid</option>
                                                    </select>
                                                    <div class="invalid-feedback-color">{{ __('item_create.color_required') }}</div>
                                                </div>
                                                <a class="col-form-label text-md-left col-md-1" id="colordelete-{{$position}}" onclick="deleteColor(this.id)"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                            <!--Picture-->

                                            <div class="form-group row" id="choosePic-{{ $position }}">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('item_create.pictures') }}
                                                    <i class="fas fa-asterisk"></i></label>

                                                <div class="col-md-6" id="images-zone-{{$position}}">
                                                    <button id="image-button-{{$position}}" type="button" class="btn border-dark image-button" onclick="clickButtonImage(this.id)">{{ __('item_create.pictures_upload') }}</button>
                                                    <div class="row pro-image-zone" id="pro-image-zone-{{ $position }}">
                                                        @foreach($itemDetail["picture"] as $keyDetail => $itemPicture)
                                                            <div class="preview-image" id="preview-image-{{ $position }}-{{ $keyDetail }}">
                                                                <div class="image-cancel" id="{{ $position }}-{{ $keyDetail }}" onclick="deleteImg(this.id)">x</div>
                                                                <img src="{{ url($itemPicture) }}" title="" class="imageThumb">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="invalid-feedback-pic" id="invalid-feedback-pic-{{$position}}">{{ __('item_create.pictures_required') }}</div>
                                                    @for($index = 0; $index <= count($itemDetail["picture"]); $index++)
                                                        <input type="file" value="" class="pro-image" id="pro-image-{{$position}}-{{$index}}" onchange="uploadImg(this.id)" style="display: none" name="pictures[]"/>
                                                        <input type="hidden" value="{{ optional($itemDetail["picture"])[$index] }}" id="hidden-image-{{$position}}-{{$index}}" name="pics[]"/>
                                                    @endfor
                                                </div>
                                            </div>
                                            <!--End Picture-->
                                        </div>
                                        <?php $position = $position + 1; ?>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                            <!--Add new Color-->
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6 size-group">
                                    <a onclick="checkToAddNewColor()">{{ __('item_create.add_new_color') }}</a>
                                </div>
                            </div>

                            <!-------------------------ADD SIZE----------------------------------------------->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" style="padding: 0 15px 0 0;">{{ __('item_create.size') }} <i class="fas fa-asterisk"></i></label>
                                <div class="col-md-6" id="">
                                    <div class="input-group">
                                        <input type="checkbox" class="sizeselector" id="sizeselector-0" value="S" onclick="chooseSize()"><label class="size-title" for="sizeselector-0" style="cursor: pointer">S</label>
                                        <input type="checkbox" class="sizeselector" id="sizeselector-1" value="M" onclick="chooseSize()"><label class="size-title" for="sizeselector-1" style="cursor: pointer">M</label>
                                        <input type="checkbox" class="sizeselector" id="sizeselector-2" value="L" onclick="chooseSize()"><label class="size-title" for="sizeselector-2" style="cursor: pointer">L</label>
                                        <input type="checkbox" class="sizeselector" id="sizeselector-3" value="XL" onclick="chooseSize()"><label class="size-title" for="sizeselector-3" style="cursor: pointer">XL</label>
                                    </div>
                                    <div class="invalid-feedback-size">{{ __('item_create.size_required') }}</div>
                                </div>
                            </div>

                            <!-------------------------ADD TABLE----------------------------------------------->
                            <!-- This is parity -->
                            <div class="form-group row" style="margin-top: 10px; margin-bottom: 0">
                                <div class="col-md-11 col-form-label text-md-right" style="cursor: pointer;" onclick="parityPrice()">
                                    <i class="fa fa-paperclip" aria-hidden="true" style="color: #3698e8;"></i> {{ __('item_create.parity') }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="table-responsive-xl">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>{{ __('item_create.color_table') }}</th>
                                            <th>{{ __('item_create.size_table') }}</th>
                                            <th>{{ __('item_create.price') }} <i class="fas fa-asterisk"></i> </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="myTableBody">
                                            @if(isset($item))
                                                <?php
                                                    $itemDetail = $item->details;
                                                    $rowIndex = 1;
                                                    for ($index = 0; $index < count($itemDetail); $index++) {
                                                        if ($itemDetail[$index]["is_delete"] == 0){
                                                            $currentColor = $itemDetail[$index]["color"];
                                                            $itemDetailInformation = $itemDetail[$index]->informations;
                                                            for ($index2 = 0; $index2 < count($itemDetailInformation); $index2++) {
                                                                if ($itemDetailInformation[$index2]["is_delete"] == 0) {
                                                                    $currentSize = $itemDetailInformation[$index2]["size"];
                                                                    $currentPrice = $itemDetailInformation[$index2]["price"];
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <input class="form-control" type="text" readonly value="{{ $currentColor }}" tabindex="-1">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" readonly value="{{ $currentSize }}" tabindex="-1">
                                                                        </td>
                                                                        <td>
                                                                            <div class="priceInp" style="display: flex">
                                                                                <input class="form-control priceInput" id="priceInput-{{ $rowIndex }}" value="{{ $currentPrice }}" type="text" placeholder="VND" maxlength="10"
                                                                                oninput="onInputPrice(this)"
                                                                                onfocus="onFocusPrice(this)"
                                                                                onblur="onBlurPrice(this)"
                                                                                onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required
                                                                                style="text-align: right; flex: 1;">
                                                                                <div style="display: flex; flex-direction: column-reverse; justify-content: center">
                                                                                    <div class="up-down-btn" id="decrease-btn-{{ $rowIndex }}" onclick="modifyPrice(this.id, false)"><i class="fa fa-sort-desc up-down-icon" aria-hidden="true"></i></div>
                                                                                    <div class="up-down-btn" id="increase-btn-{{ $rowIndex }}" onclick="modifyPrice(this.id, true)"><i class="fa fa-sort-asc up-down-icon" aria-hidden="true"></i></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td width="6%">
                                                                            <div class="delete-link" id="dr-{{ $rowIndex }}" onclick="deleteRow(this.id, this)">
                                                                                <div class="delete-box" id="delete-box-{{ $rowIndex }}">You want to delete?
                                                                                    <div class="my-btn">
                                                                                        <div class="myCancel btn-yes-no">Cancel</div>
                                                                                        <div class="myYes btn-yes-no">Yes</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $rowIndex = $rowIndex + 1;
                                                                }
                                                            }
                                                        }
                                                    }
                                                ?>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-------------------------HIDDEN INPUT----------------------------------------------->
                            <input type="hidden" id="tableData" name="tableData" value="">
                            <input type="hidden" name="brand" value="{{ isset($item) ? $item->brand_id : "" }}" id="brandHidden">
                            <input type="hidden" name="modifyColorPicture" value="" id="modifyCP">
                            <input type="hidden" name="modifyTable" value="" id="modifyT">
                            <!-------------------------BUTTON SUBMIT----------------------------------------------->
                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    @if(isset($item))
                                        <button type="submit" formaction="{{ route('shop.itemUpdate',$item['id']) }}" id="myUpdate" class="button is-info" onclick="submit2()">
                                            {{ __('item_create.update') }}
                                        </button>
                                        <button type="submit" formaction="{{ route('shop.itemDelete',$item['id']) }}" id="myDelete" class="button is-danger ml-3">
                                            {{ __('item_create.delete') }}
                                        </button>

                                    @else
                                        <button type="submit" formaction="{{ route('shop.itemCreate') }}" class="button is-info" onclick="submit2()">
                                            {{ __('item_create.publish') }}
                                        </button>
                                    @endif
                                </div>
                                <div class="col-md-2 text-right">
                                    <a href="{{ route('shop.profile', Auth::user()->id) }}" style="text-decoration: none" class="button">
                                        {{ __('item_create.cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-------------------------MODAL----------------------------------------------->
                        <div class="modal fade" id="chooseDeleteColor" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">{{ __('item_create.msg_color_delete') }}</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirm-to-delete">{{ __('item_create.delete_btn') }}</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('item_create.cancel_btn') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="modal fade" id="deleteItem" tabindex="-1">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">Do you really want to delete these records? This process cannot be undone.</div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="submit" formaction="{{ route('shop.itemDelete',$item['id']) }}" data-dismiss="modal" class="btn btn-danger" id="confirm-delete-item">{{ __('item_create.delete_btn') }}</button>--}}
{{--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('item_create.cancel_btn') }}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="modal fade" id="chooseSameColor" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">{{ __('item_create.msg_color_same') }}</div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="chooseColorFirst" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">{{ __('item_create.msg_color_choose') }}</div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>

        let numberColorIsDisplayed;
        let arrayColor = [];
        let arraySize = [];
        let arrayBrand = [];
        let resultBrand;
        let modifyAtColorAndPicture = false, modifyAtTable = false;
        /**
         * Currency formater
         */
        const formatter = new Intl.NumberFormat('vi', {
            style: 'currency',
            currency: 'vnd',
        });

        // Brand Initialization
        $.ajax({
            type: 'GET',
            url: "{{ route('apiBrandList') }}",
            success: function(data) {
                data.forEach(element => {
                    arrayBrand.push(element['name']);
                });
            }
        });
        // Category Option initialize
        $.ajax({
            type: 'GET',
            url: "{{ route('apiCategoryList') }}",
            success: function(data) {
                data.forEach(element => {
                    // $('#category').append(option(element['id'], element['name'], selectedId));
                    let newoption = "<option value='" + element['id'] + "'> " + element['name'] + "</option>";
                    $("#category").append(newoption);
                });
            }
        });
        // option create
        function option(id, name, selectedId) {
            let option;
            if (id == selectedId) {
                option = "<option selected value='" + id + "'> " + name + "</option>";
            } else {
                option = "<option value='" + id + "'> " + name + "</option>";
            }
            return option;
        }
        function subCategoryLoadWhenHasCategory(categoryId) {
            $.ajax({
                type: 'GET',
                url: "{{ route('apiSubCategoryList','/') }}" + '/' + categoryId,
                success: function(data) {
                    // make empty all previous data
                    $('#subCategory').empty();
                    let selectedId = "{{ isset($item['sub_category_id']) ? $item['sub_category_id'] : '' }}";
                    data.forEach(element => {
                        $('#subCategory').append(option(element['id'], element['name'], selectedId));
                    });
                }
            });
        }
        //----------- INITIALIZE FORM -------------
        $(document).ajaxStop(function () {
            initializeForm();
        });
        function initializeForm() {
            let hasItem = "{{ isset($item) ? true : false }}";
            if (hasItem == true) {
                //category & subcategory
                let categoryIndex = `{{ isset($item['category_id']) ? $item['category_id'] : "" }}`;
                $("#category").val(categoryIndex);
                $("#category option[value='']").remove();
                subCategoryLoadWhenHasCategory(categoryIndex);
                //brand
                resultBrand = true;
                closeBrandInput();
                //color and picture
                numberColorIsDisplayed = $(".colorselector").length;
                for (let i = 0; i < numberColorIsDisplayed; i++) {
                    let currentColor = $("#colorselector-"+i).val();
                    arrayColor.push(currentColor);
                }
                //table
                //size
                let myTable = document.getElementById("myTable");
                let numberRowOfMyTable = myTable.rows.length;
                for (let i = 1; i < numberRowOfMyTable; i++) {
                    let currentSize = myTable.rows[i].cells[1].firstChild.value;
                    arraySize.push(currentSize);
                    //-----
                    let currentPrice = myTable.rows[i].cells[2].firstChild.firstChild.value;
                    currentPrice = formatter.format(currentPrice);
                    myTable.rows[i].cells[2].firstChild.firstChild.value = currentPrice;
                }
                arraySize = getUnique(arraySize);
                for (let i = 0; i < 4; i++) {
                    let checkBoxValue = document.getElementById("sizeselector-"+i).value;
                    if (arraySize.indexOf(checkBoxValue) > -1) {
                        $("#sizeselector-"+i).prop("checked", true);
                    }
                }
            } else {
                resultBrand = false;
                addNewColor(0);
                numberColorIsDisplayed = 1;
            }
            autocomplete(document.getElementById("brand"), arrayBrand);
            clickOutOfBrand();
            disableUpdate();
        }
        //CATEGORY ZONE---------------------------------------------------------------
        function changeCategory() {
            subCategoryLoadWhenHasCategory($("#category").val());
            $("#category option[value='']").remove();
        }
        //BRAND ZONE------------------------------------------------------------------
        function defaultBrand(variable) {
            $("#brand").val(variable);
            $("#brandHidden").val(arrayBrand.indexOf(variable)+1);
            closeBrandInput();
        }
        function clickOutOfBrand() {
            let $window = $(window);
            let $brandInput = $(".brandInput");
            $window.on("click.Bst", function(event){
                if (
                    $brandInput.has(event.target).length == 0 //checks if descendants of $brandInput was clicked
                    &&
                    !$brandInput.is(event.target) //checks if the $brandInput itself was clicked
                ){
                    if (resultBrand == false) {
                        document.getElementById("brand").value = "";
                    }
                } else {
                }
            });
        }
        function autocomplete(inp, arr) {
            let currentFocus;
            inp.addEventListener("input", function (e) {
                let div1, div2, val = this.value;
                closeAllLists();
                if (!val) { return false; }
                currentFocus = -1;
                div1 = document.createElement("div");
                div1.setAttribute("id", this.id + "autocomplete-list");
                div1.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(div1);
                for (let i = 0; i < arr.length; i++) {
                    if (arr[i].toUpperCase().includes(val.toUpperCase()) == true) {
                        div2 = document.createElement("div");
                        div2.innerHTML = arr[i];
                        div2.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        div2.addEventListener("click", function (e) {
                            inp.value = this.getElementsByTagName("input")[0].value;
                            closeBrandInput();
                            closeAllLists();
                        });
                        div1.appendChild(div2);
                    }
                }
            });
            inp.addEventListener("keydown", function (e) {
                let x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                let countDiv = $("#brandautocomplete-list > div").length;
                if (e.keyCode == 40) { //down
                    currentFocus++;
                    if (countDiv > 0) addActive(x);
                } else if (e.keyCode == 38) { //up
                    currentFocus--;
                    if (countDiv > 0) addActive(x);
                } else if (e.keyCode == 13) { //enter
                    e.preventDefault();
                    if (countDiv > 0){
                        if (x) { x[currentFocus].click(); closeBrandInput(); }
                    }
                    else { resultBrand = false; }
                }
                else if (e.keyCode == 9) { //Tab
                    if (countDiv > 0) {
                        let countActivedItem = $("#brandautocomplete-list .autocomplete-active").length;
                        if (countActivedItem == 0) { inp.value = ""; closeAllLists(); }
                        else {
                            if (x) { x[currentFocus].click(); closeBrandInput();}
                        }
                    }
                    else {
                        if (!resultBrand) inp.value = "";
                        resultBrand = false;
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
                let currentBrand = x[currentFocus].firstElementChild.value;
                $("#brand").val(currentBrand);
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (let i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                let x = document.getElementsByClassName("autocomplete-items");
                for (let i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }
        function closeBrandInput() {
            $("#brand").prop("readonly", true);
            $("#brand").css("cursor", "default");
            $(".deleteBrand-icon").css("display", "block");
            $(".searchBrand-icon").css("display", "none");
            resultBrand = true;
        }
        function deleteBrand() {
            document.getElementById("brand").value = "";
            $("#brand").prop("readonly", false);
            $("#brand").css("cursor", "text");
            $(".deleteBrand-icon").css("display", "none");
            $(".searchBrand-icon").css("display", "block");
            resultBrand = false;
        }

        //COLOR AND PICTURE ZONE
        function changeColor(variable){
            let lastChar = variable[variable.length - 1];
            let colorSelected = document.getElementById(variable).value;
            let currentColor = arrayColor[lastChar];
            let checkIfSameColor = false;
            for (let i = 0; i < numberColorIsDisplayed; i++){
                if (arrayColor[i] == colorSelected){
                    checkIfSameColor = true;
                    break;
                }
            }
            if (checkIfSameColor) {
                showChooseSameColorModal();
                colorSelected = currentColor;
                document.getElementById(variable).value = colorSelected;
                arrayColor[lastChar] = colorSelected;
                if (!colorSelected) {
                    document.getElementById(variable).selectedIndex = "0";
                }
                return false;
            } else {
                arrayColor[lastChar] = document.getElementById(variable).value;
                deleteOldTable();
                createNewTable();
                let selectElement = document.getElementById(variable);
                if (selectElement[0].value == "") selectElement.remove(0);
            }

            if (colorSelected != ""){ //means color is choosen
                document.getElementById("choosePic-"+lastChar).style.display = "flex";
                $(".invalid-feedback-color").css("display", "none");
            }
            modifyAtColorAndPicture = true;
        }
        function deleteColor(variable){
            $("#chooseDeleteColor").modal('show');
            $("#chooseDeleteColor").off("click.confirm").on("click.confirm", "#confirm-to-delete", function (e) {
                e.preventDefault();
                let lastChar = variable[variable.length - 1];
                //Remove div of colorandpic at index = lastChar
                document.getElementById("colorandpic-"+lastChar).remove();
                //Decrease number of color are displayed on screen
                numberColorIsDisplayed = numberColorIsDisplayed - 1;
                //Replace id
                for (let i = lastChar; i < numberColorIsDisplayed; i++){
                    replaceId(parseInt(parseInt(i)+1), i);
                }
                arrayColor.splice(lastChar,1); //Remove 1 element at index = lastChar in arrayColor
                if (numberColorIsDisplayed > 0){
                    deleteOldTable();
                    createNewTable();
                }
                else {
                    deleteOldTable();
                    addNewColor(0);
                    numberColorIsDisplayed = 1;
                    arrayColor = [];
                    $("#colorselector-0").prop('required',true);
                }
            });
            $("#myUpdate").attr("disabled", false);
            modifyAtColorAndPicture = true;
        }
        function checkToAddNewColor() {
            //Check if there is color form which is not choosen
            let cs = document.getElementById('colorselector-'+(numberColorIsDisplayed - 1));
            if (cs.value == "") {
                showChooseColorFirst();
                return false;
            }
            addNewColor(numberColorIsDisplayed);
            numberColorIsDisplayed++;
        }
        function addNewColor(variable){
            let containerColorandPicandSize = $(".colorandpic");
            let html ='<div class="colorandpicDetail" id="colorandpic-'+variable+'">' +
                '<div class="form-group row">' +
                '<label for="name" class="col-md-4 col-form-label text-md-right">Choose color <i class="fas fa-asterisk"></i></label>' +
                '<div class="col-md-4" >' +
                '<select id="colorselector-'+variable+'" class="custom-select colorselector" name="color[]" onchange="changeColor(this.id)">' +
                '<option value="" selected>Choose</option>' +
                '<option value="black">Black</option>' +
                '<option value="red">Red</option>' +
                '<option value="yellow">Yellow</option>' +
                '<option value="orange">Orange</option>' +
                '<option value="white">White</option>' +
                '<option value="blue">Blue</option>' +
                '<option value="green">Green</option>' +
                '<option value="gray">Gray</option>' +
                '<option value="brown">Brown</option>' +
                '<option value="violet">Violet</option>' +
                '<option value="purple">Purple</option>' +
                '<option value="coral">Coral</option>' +
                '<option value="lemon">Lemon</option>' +
                '<option value="orchid">Orchid</option>' +
                '</select>';
            if (variable == 0) html += '<div class="invalid-feedback-color">Please choose color.</div>';
            html += '</div>' +
                '<a class="col-md-1 col-form-label text-md-left" id="colordelete-'+variable+'" onclick="deleteColor(this.id)"><i class="far fa-trash-alt"></i></a>' +
                '</div>' +
                '<div class="form-group row" id="choosePic-'+variable+'" style="display: none">' +
                '<label for="name" class="col-md-4 col-form-label text-md-right">Choose pictures' +
                '<i class="fas fa-asterisk"></i></label>' +
                '<div class="col-md-6" id="images-zone-'+variable+'">' +
                '<button id="image-button-'+variable+'" type="button" class="btn border-dark image-button" onclick="clickButtonImage(this.id)">Upload</button>' +
                '<div class="row pro-image-zone" id="pro-image-zone-'+variable+'">' +
                '</div>' +
                '<div class="invalid-feedback-pic" id="invalid-feedback-pic-'+variable+'">Please upload image to describe clearly product.</div>' +
                '<input type="file" class="pro-image" id="pro-image-'+variable+'-0" onchange="uploadImg(this.id)" style="display: none" name="pictures[]"/>' +
                '<input type="hidden" id="hidden-image-'+variable+'-0" name="pics[]">'+
                '</div>'+
                '</div>';
            containerColorandPicandSize.append(html);
        }
        function clickButtonImage(variable){
            let lastChar = variable[variable.length - 1];
            let numberOfInputImage = $('#images-zone-'+lastChar+' .pro-image').length;
            let currentInput = numberOfInputImage - 1;
            $("#pro-image-"+lastChar+"-"+currentInput).click();
        }
        function uploadImg(variable) {
            let firstNo = variable[10]; //pro-image-0-0 for example
            let lastNo = variable[variable.length - 1];
            let files = event.target.files;
            let numberOfPicAtIndexNo = $("#pro-image-zone-"+firstNo+" .preview-image").length;
            for (let i = 0; i < files.length ; i++) {
                let f = files[i]
                let fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    let file = e.target;
                    let htmlExtra = '<div class="preview-image" id="preview-image-'+firstNo+'-'+lastNo+'">' +
                        '<div class="image-cancel" id="'+firstNo+'-'+lastNo+'" onclick="deleteImg(this.id)">x</div>' +
                        '<img src="'+file.result+'" title="'+""+'" class="imageThumb">' +
                        '</div>';
                    $("#pro-image-zone-"+firstNo).append(htmlExtra);
                    $(".invalid-feedback-pic#invalid-feedback-pic-"+firstNo).css("display", "none");
                });
                fileReader.readAsDataURL(f);
            }
            if ($("#"+variable)[0].files.length === 0) {
            } else {
                let extraInput = '<input type="file" class="pro-image" id="pro-image-'+firstNo+'-'+(parseInt(lastNo)+1)+'" onchange="uploadImg(this.id)" style="display: none" name="pictures[]"/>' +
                                '<input type="hidden" value="" id="hidden-image-'+firstNo+'-'+(parseInt(lastNo)+1)+'" name="pics[]"/>';
                $("#images-zone-"+firstNo).append(extraInput);
            }
            modifyAtColorAndPicture = true;
        }
        function deleteImg(variable) {
            let firstNo = variable[0];
            let lastNo = variable[variable.length - 1];
            $("#preview-image-"+firstNo+"-"+lastNo).remove();
            $("#pro-image-"+firstNo+"-"+lastNo).remove();
            $("#hidden-image-"+firstNo+"-"+lastNo).remove();
            let numberOfPicAtIndexNo = $("#pro-image-zone-"+firstNo+" .preview-image").length;
            for (let i = lastNo; i < numberOfPicAtIndexNo; i++){
                replaceIdPicture(firstNo, parseInt(parseInt(i)+1), i);
            }
            let numberOfInputImage = $("#images-zone-"+firstNo+" .pro-image").length;
            for (let i = lastNo; i < numberOfInputImage; i++){
                replaceIdInputImage(firstNo, parseInt(parseInt(i)+1), i);
            }
            $("#myUpdate").attr("disabled", false);
            modifyAtColorAndPicture = true;
        }
        function replaceId(oldvariable, newvariable){
            document.getElementById("colorandpic-"+oldvariable).id = "colorandpic-"+ newvariable;
            document.getElementById("colorselector-"+oldvariable).id = "colorselector-"+newvariable;
            document.getElementById("colordelete-"+oldvariable).id = "colordelete-"+newvariable;
            document.getElementById("choosePic-"+oldvariable).id = "choosePic-"+newvariable;
            document.getElementById("images-zone-"+oldvariable).id = "images-zone-"+newvariable;
            document.getElementById("image-button-"+oldvariable).id = "image-button-"+newvariable;
            document.getElementById("pro-image-zone-"+oldvariable).id = "pro-image-zone-"+newvariable;
            document.getElementById("invalid-feedback-pic-"+oldvariable).id = "invalid-feedback-pic-"+newvariable;
            let countInputUploadImg = $("#images-zone-"+newvariable+" .pro-image").length;
            for (let i = 0; i < countInputUploadImg; i++) {
                document.getElementById("pro-image-"+oldvariable+"-"+i).id = "pro-image-"+newvariable+"-"+i;
            }
            //because preview always less than input upload img 1 digit
            if (countInputUploadImg >= 1) {
                for (let i = 0; i < countInputUploadImg - 1; i++) {
                    document.getElementById("preview-image-"+oldvariable+"-"+i).id = "preview-image-"+newvariable+"-"+i;
                    document.getElementById(oldvariable+"-"+i).id = newvariable+"-"+i;
                }
            }
        }
        function replaceIdPicture(zone, oldvariable, newvariable) {
            document.getElementById("preview-image-"+zone+"-"+oldvariable).id = "preview-image-"+zone+"-"+newvariable;
            document.getElementById(zone+"-"+oldvariable).id = zone+"-"+newvariable;
        }
        function replaceIdInputImage(zone, oldvariable, newvariable) {
            document.getElementById("pro-image-"+zone+"-"+oldvariable).id = "pro-image-"+zone+"-"+newvariable;
            document.getElementById("hidden-image-"+zone+"-"+oldvariable).id = "hidden-image-"+zone+"-"+newvariable;
        }
        function showChooseSameColorModal() {
            $("#chooseSameColor").modal('show');
        }
        function showChooseColorFirst() {
            $("#chooseColorFirst").modal('show');
        }
        //SIZE ZONE------------------------------------------------------------------------
        function chooseSize(){
            deleteOldTable();
            arraySize = [];
            for (let i = 0; i < 4; i++){
                if (document.getElementById("sizeselector-"+i).checked == true){
                    arraySize.push(document.getElementById("sizeselector-"+i).value);
                }
            }
            if (arraySize) {
                $(".invalid-feedback-size").css("display", "none");
            }
            createNewTable();
            modifyAtTable = true;
        }
        //TABLE ZONE------------------------------------------------------------------
        function createNewTable(){
            for (let i = 0; i <= numberColorIsDisplayed; i++) {
                for (let j = 0; j < arraySize.length; j++) {
                    if (arrayColor[i]){
                        insertNewRow(arrayColor[i], arraySize[j]);
                    }
                }
            }
        }
        function insertNewRow(color,size){
            let numberOfRow = $("#myTable tr").length;
            let newRow = '<tr>';
            newRow += '<td><input class="form-control" type="text" readonly value="'+color+'" tabindex="-1"></td>';
            newRow += '<td><input class="form-control" type="text" readonly value="'+size+'" tabindex="-1"></td>';
            newRow += '<td>' +
                      '<div class="priceInp" style="display: flex">'+
                      '<input class="form-control priceInput" id="priceInput-'+numberOfRow+'" type="text" placeholder="VND" min="0" maxlength="10" ' +
                      'oninput="onInputPrice(this)"' +
                      'onfocus="onFocusPrice(this)"' +
                      'onblur="onBlurPrice(this)"' +
                      'onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required ' +
                      'style="text-align: right; flex: 1;">' +
                      '<div style="display: flex; flex-direction: column-reverse; justify-content: center">'+
                      '<div class="up-down-btn" id="decrease-btn-'+numberOfRow+'" onclick="modifyPrice(this.id, false)"><i class="fa fa-sort-desc up-down-icon" aria-hidden="true"></i></div>'+
                      '<div class="up-down-btn" id="increase-btn-'+numberOfRow+'" onclick="modifyPrice(this.id, true)"><i class="fa fa-sort-asc up-down-icon" aria-hidden="true"></i></div>'+
                      '</div>'+
                      '</div>'+
                      '</td>';
            newRow += '<td width="6%">' +
                      '<div class="delete-link" id="dr-'+numberOfRow+'" onclick="deleteRow(this.id, this)">'+
                      '<div class="delete-box" id="delete-box-'+numberOfRow+'">You want to delete?' +
                      '<div class="my-btn">'+
                      '<div class="myCancel btn-yes-no">Cancel</div>' +
                      '<div class="myYes btn-yes-no">Yes</div>' +
                      '</div>'+
                      '</div>'+
                      '</div>'+
                      '</td>';
            newRow += '</tr>';
            $("#myTableBody").append(newRow);
        }
        function modifyPrice(variable, isUp) {
            let lastChar = variable[variable.length - 1];
            let currentPrice = document.getElementById("priceInput-"+lastChar).value;
            currentPrice = removeFormatter(currentPrice.trim());
            if (!isUp) {
                if (!currentPrice) {
                    document.getElementById("priceInput-"+lastChar).value = formatter.format(0);
                }
                currentPrice = currentPrice - 10000;
                if (currentPrice < 0) document.getElementById("priceInput-"+lastChar).value = formatter.format(0);
                else {
                    document.getElementById("priceInput-"+lastChar).value = formatter.format(currentPrice);
                }
            } else {
                if (!currentPrice) {
                    document.getElementById("priceInput-"+lastChar).value = formatter.format(10000);
                } else {
                    currentPrice = parseInt(currentPrice) + 10000;
                    if (parseInt(currentPrice) > 1000000000) {
                        document.getElementById("priceInput-"+lastChar).value = formatter.format(currentPrice-10000);
                    }
                    else {
                        document.getElementById("priceInput-"+lastChar).value = formatter.format(currentPrice);
                    }
                }
            }
            $("#myUpdate").attr("disabled", false);
            modifyAtTable = true;
        }
        function onInputPrice(btn) {
            if (btn.value.length > btn.maxLength) btn.value = btn.value.slice(0, btn.maxLength);
        }
        function onFocusPrice(btn) {
            let val = removeFormatter(btn.value);
            if (val == "") btn.value = "";
            else btn.value = val;
        }
        function onBlurPrice(btn) {
            let val = removeFormatter(btn.value);
            if (val == "") {
                btn.value = "";
            } else {
                btn.value = formatter.format(val);
            }
        }
        function parityPrice() {
            let myTable = document.getElementById("myTable");
            let numberOfRow = myTable.rows.length;
            if (numberOfRow >= 2) {
                let firstPrice = document.getElementById("priceInput-1").value;
                firstPrice = removeFormatter(firstPrice.trim());
                if (firstPrice != 0 && firstPrice) {
                    for (let i = 2; i < numberOfRow; i++) {
                        document.getElementById("priceInput-"+i).value = formatter.format(firstPrice);
                    }
                }
            }
            $("#myUpdate").attr("disabled", false);
            modifyAtTable = true;
        }
        function deleteOldTable(){
            //Delete Old Table
            $('#myTable').find('tr:gt(0)').remove();
        }
        function deleteRow(variable, btn) {
            var lastChar = variable[variable.length - 1];
            var numberOfRow = $("#myTable tr").length;
            if (!$("#dr-"+lastChar).hasClass("show-delete-box")) {
                $("#dr-"+lastChar).addClass("show-delete-box");
                $("#dr-"+lastChar).off("click").on("click", function (event) {
                    if ((event.target).length != 0) {
                        if (document.getElementById("dr-"+lastChar).contains(event.target)) {
                            var $button = $(event.target);
                            if ($button[0].className.includes("myCancel")) {
                                $("#dr-"+lastChar).removeClass("show-delete-box");
                            }
                            if ($button[0].className.includes("myYes")) {
                                var row = btn.parentNode.parentNode;
                                row.parentNode.removeChild(row);
                                for (var i = lastChar; i < numberOfRow-1; i++) {
                                    replaceIdInputPrice(parseInt(parseInt(i) + 1), i);
                                }
                                $("#myUpdate").attr("disabled", false);
                                modifyAtTable = true;
                            }
                            if ($button[0].className.includes("delete-box") || $button[0].className.includes("my-btn")){
                            }
                        }
                        else {
                            $("#dr-"+lastChar).removeClass("show-delete-box");
                        }
                    }
                });
            } else {
                $("#dr-"+lastChar).removeClass("show-delete-box");
            }
        }
        function replaceIdInputPrice(oldvariable, newvariable) {
            document.getElementById("priceInput-"+oldvariable).id = "priceInput-"+newvariable;
            document.getElementById("dr-"+oldvariable).id = "dr-"+newvariable;
            document.getElementById("delete-box-"+oldvariable).id = "delete-box-"+newvariable;
            document.getElementById("decrease-btn-"+oldvariable).id = "decrease-btn-"+newvariable;
            document.getElementById("increase-btn-"+oldvariable).id = "increase-btn-"+newvariable;
        }
        //VALIDATION ZONE-------------------------------------------------------------------
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                //Get myform
                let myform = document.getElementsByClassName("needs-validation");
                //loop over them and prevent submission
                let validation = Array.prototype.filter.call(myform, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false ) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                        if (!checkSize()) {
                            $(".invalid-feedback-size").css("display", "block");
                        }
                        if (!checkColor()) {
                            $(".invalid-feedback-color").css("display", "block");
                        }
                        if (numberColorIsDisplayed > 1) {
                            if ($("#colorselector-"+(numberColorIsDisplayed-1)).val() == "") {
                                $("#colorandpic-"+(numberColorIsDisplayed-1)).remove();
                                numberColorIsDisplayed--;
                            }
                        }
                        for (let i = 0; i < numberColorIsDisplayed; i++) {
                            if ($("#pro-image-zone-"+i)){
                                if (!checkPicture(i)) {
                                    $(".invalid-feedback-pic#invalid-feedback-pic-"+i).css("display", "block");
                                }
                            }
                        }
                        let numberOrRow = $("#myTable tr").length;
                        if (numberOrRow == 1) {
                            createNewTable();
                        }
                    }, false);
                });
            }, false);
        })();
        function validateMyForm() {
            let checkPic = true;
            let checkSize = false;
            let numberOfChoosenColor = numberColorIsDisplayed;
            let numberOfRow = $("#myTable tr").length;
            if (numberColorIsDisplayed > 1) {
                if ($("#colorselector-"+(numberColorIsDisplayed-1)).val() == "") {
                    numberOfChoosenColor--;
                }
            }
            for (let i = 0; i < numberOfChoosenColor; i++) {
                if (!checkPicture(i)) {
                    checkPic = false; break;
                }
            }
            for (let i = 0; i < 4; i++) {
                if (document.getElementById("sizeselector-"+i).checked == true) {
                    checkSize = true; break;
                }
            }
            if (checkPic == true && checkSize == true && numberOfRow >= 2) return true; else return false;
        }
        function checkPicture(pictureZoneIndex) {
            let countImg = $("#pro-image-zone-"+pictureZoneIndex+" img").length;
            if (countImg > 0) return true;
            return false;
        }
        function checkSize() {
            for (let i = 0; i < 4; i++) {
                if ($("#sizeselector-"+i).is(":checked")) return true;
            }
            return false;
        }
        function checkColor() {
            let colorSelector = document.getElementById("colorselector-0");
            let colorValue = colorSelector.value;
            if (numberColorIsDisplayed == 1 && !colorValue) return false;
            return true;
        }
        //OTHERS----------------------------------------------------------------------------
        function submit2() {
            //get data from table
            let TableData = [];
            let table = document.getElementById('myTable');
            let numberofrow = table.rows.length;
            for (let i = 1; i < numberofrow; i++) {
                let currentArr = [];
                let cellColor = table.rows[i].cells[0].firstChild.value;
                let cellSize = table.rows[i].cells[1].firstChild.value;
                let cellPrice = table.rows[i].cells[2].firstChild.firstChild.value;
                cellPrice = removeFormatter(cellPrice);
                currentArr.push(cellColor);
                currentArr.push(cellSize);
                currentArr.push(cellPrice);
                TableData.push(currentArr);
            }
            $("#tableData").val(JSON.stringify(TableData));
            //Get Brand id
            let brandId = arrayBrand.indexOf($("#brand").val());
            brandId = parseInt(parseInt(brandId) + 1);
            $("#brandHidden").val(brandId);
            $("#modifyCP").val(modifyAtColorAndPicture);
            $("#modifyT").val(modifyAtTable);
        }
        // function deleteItem() {
        //     $("#deleteItem").modal('show');
        //     $("#deleteItem").off("click.confirm").on("click.confirm", "#confirm-to-delete", function (e) {
        //
        //     });
        // }
        function disableUpdate(){
            $("#myUpdate").attr("disabled", true);
            $('#myForm').each(function() {
                $(this).data("serialized", $(this).serialize())
            }).on("change input", function() {
                $(this).find("#myUpdate").attr("disabled", $(this).serialize() == $(this).data("serialized"));
            }).find("#myUpdate").attr("disabled", true);
        }
        function getUnique(arr) {
            let set = new Set(arr);
            return [...set];
        }
    </script>

@endsection
