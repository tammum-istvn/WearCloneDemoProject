@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('main')
<div class="container">
    <div class="columns mt-5">
        <div class="column is-two-thirds">
            <div class="card">
                <header class="card-header pb-0">
                    <p class="card-header-title p-0">
                        {{ __('cart.cart') }}:
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <table class="table">
                            <thead>
                                <tr class="has-text-weight-bold">
                                    <td> {{ __('cart.product') }} </td>
                                    <td> {{ __('cart.price') }} </td>
                                    <td> {{ __('cart.quantity') }} </td>
                                    <td> {{ __('cart.total') }} </td>
                                </tr>
                            </thead>
                            <tbody class="cart-table">
                                <!-- @for($i = 0; $i < 4; $i++) 
                                
                                <tr>
                                    <td>
                                        <div class="columns">
                                            <div class="column">
                                                <figure class="image ml-0 mr-0">
                                                    <img src="{{ url('img/item/t-shirt2.jpg') }}">
                                                </figure>
                                            </div>
                                            <div class="column is-three-quarters">
                                                <p class="has-text-weight-semibold is-size-6 mb-1"> Girl T-shirt</p>

                                                <div style="font-size:10pt">
                                                    color family: <span>black</span>, size: <span> small</span>
                                                </div>
                                                <div class="mt-2">
                                                    <button class="button has-text-danger remove-item">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="unit-price">50.000</span>₫
                                    </td>
                                    <td class="quantity">
                                        <i class="fas fa-minus button mr-2"></i>
                                        <span class="item-quantity">2</span>
                                        <i class="fas fa-plus button ml-2"></i>
                                    </td>
                                    <td>
                                        <span class="unit-total-price">100.000</span>₫
                                    </td>
                                    </tr>
                                    @endfor -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <header class="card-header pb-0">
                    <p class="card-header-title">
                        {{ __('cart.order_sum') }}
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div>
                            <span>{{ __('cart.subtotal') }}</span>
                            <span class="is-pulled-right">
                                <span class="sub-total"> 0</span>₫
                            </span>
                        </div>

                        <div>
                            <span>{{ __('cart.ship') }}</span>
                            <span class="is-pulled-right">
                                <span class="shipping-fee"> 0</span>
                            </span>
                        </div>

                        <div class="mt-3 total has-text-weight-bold">
                            <span>{{ __('cart.total') }}</span>
                            <span class="is-pulled-right">
                                <span class="total-payable"> 0</span>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="card-footer p-0">
                    <button class="button is-dark upper-case has-text-weight-bold" id="pay">{{ __('cart.pay') }}</button>
                </div>
            </div>

            <!-- acceptable payment method -->
            <!-- <div class="mt-5">
                <p class="is-size-6 has-text-weight-semibold mb-2"> {{ __('cart.accept') }}: </p>
                <ul style="display: flex">
                    <li>
                        <figure class="image">
                            <img src="{{ url('img/visa.png') }}">
                        </figure>
                    </li>
                    <li>
                        <figure class="image">
                            <img src="{{ url('img/mastercard.png') }}">
                        </figure>
                    </li>

                    <li>
                        <figure class="image">
                            <img src="{{ url('img/maestro.png') }}">
                        </figure>
                    </li>

                    <li>
                        <figure class="image">
                            <img src="{{ url('img/jcb.png') }}">
                        </figure>
                    </li>
                    <li>
                        <figure class="image">
                            <img src="{{ url('img/paypal.png') }}">
                        </figure>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let cart;
    /**
     * Currency formater
     */
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'vnd',
    });
    $(document).ready(function() {
        cart = getCart();
        showCart();

        // order sumarry 
        updateOrderSummary();

        // decrese item quntity
        $('.fa-minus').click(function() {
            var quantity = $(this).parent().children('.item-quantity').text() - 1;
            $(this).parent().children('.item-quantity').text(quantity);

            // disable button click 
            if (quantity == 1) {
                $(this).addClass('btn-disabled').attr("disabled", true);
            }

            // update unit total price
            var root = $(this).parents('tr');
            var unitTotal = removeFormatter(root.find('.unit-price').text()) * quantity;
            root.find('.unit-total-price').text(formatter.format(unitTotal));

            let itemInfoId = ($(this).parents('tr')).find('.item-info').val();
            updateCartQuantity(itemInfoId, quantity);
            updateOrderSummary();
        });

        // increment item quntity
        $('.fa-plus').click(function() {
            var parent = $(this).parent();
            var quantity = parseInt(parent.children('.item-quantity').text()) + 1;
            parent.children('.item-quantity').text(quantity);

            // enable minus button click
            parent.children('.fa-minus').removeClass('btn-disabled').removeAttr("disabled");

            // update unit total price
            var root = $(this).parents('tr');
            
            var unitTotal = removeFormatter(root.find('.unit-price').text()) * quantity;
            root.find('.unit-total-price').text(formatter.format(unitTotal));

            updateOrderSummary();

            let itemInfoId = ($(this).parents('tr')).find('.item-info').val();
            updateCartQuantity(itemInfoId, quantity);
        });

        // remove an item from cart
        $('.remove-item').click(function() {
            $(this).parents('tr').remove();

            // remove from local storage
            let itemInfoId = ($(this).parents('tr')).find('.item-info').val();
            deleteCartItem(itemInfoId);

        });

        // checkout
        $('#pay').click(function() {
            var url = "{{ route('checkout') }}";

            // console.log(cart);

            AjaxRequest.post(url, Object.assign(cart)).then(function(result) {
                // updateCartTotal(data.quantity);
                console.log(result);

            }).catch(function(err) {
                console.log(err);
            });
        });
    });

    function deleteCartItem(itemInfoId) {
        var index = cart.findIndex(e => e.item_detail_information_id == itemInfoId);
        var cartId = cart[index].id;

        var url = "{{ route('cartDelete','') }}" + '/' + cartId;
        AjaxRequest.delete(url).then(function(currentCartTotal) {
            cart.splice(index, 1);
            updateOrderSummary();
            updateCartTotal(currentCartTotal);

            console.log(result);

        }).catch(function(err) {
            console.log(err);
        });
    }

    /**
     * update order summary
     */
    function updateOrderSummary() {
        var total = 0;
        var shipping = 0;

        $('.cart-table tr').each(function() {
            total += removeFormatter($(this).find('.unit-total-price').text());
            shipping += 10000;
        });

        var payable = total + shipping;

        $('.sub-total').text(formatter.format(total));
        $('.shipping-fee').text(formatter.format(shipping));
        $('.total-payable').text(formatter.format(payable));
    }

    function updateCartQuantity(itemInfoId, quantity) {
        let index = cart.findIndex(e => e.item_detail_information_id == itemInfoId);
        cart[index].quantity = quantity;
        console.log(cart);
    }

    function showCart() {
        console.log(cart);
        // Create our number formatter.


        let htmlCart = '';
        cart.forEach(item => {
            htmlCart += `
                           <tr>
                                <input class="item-info" value="` + item.item_detail_information_id + `" type="hidden">
                                <td>
                                        <div class="columns">
                                            <div class="column">
                                                <figure class="image ml-0 mr-0">
                                                    <img src="{{ url('` + item.picture + `') }}">
                                                </figure>
                                            </div>
                                            <div class="column is-three-quarters">
                                                <p class="has-text-weight-semibold is-size-6 mb-1"> ` + item.title + `</p>

                                                <div style="font-size:10pt">
                                                    color family: <span>` + item.color + `</span>, size: <span> ` + item.size + `</span>
                                                </div>
                                                <div class="mt-2">
                                                    <button class="button has-text-danger remove-item">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="unit-price">` + formatter.format(item.price) + `</span>
                                    </td>
                                    <td class="quantity">
                                        <i class="fas fa-minus button mr-2"></i>
                                        <span class="item-quantity">` + item.quantity + `</span>
                                        <i class="fas fa-plus button ml-2"></i>
                                    </td>
                                    <td>
                                        <span class="unit-total-price">` + formatter.format(calculatePrice(item.price, item.quantity)) + `</span>
                                    </td>
                                    </tr>
        `;
        });

        $('.cart-table').append(htmlCart);
    }

    function calculatePrice(price, quantity) {
        return parseInt(price) * quantity;
    }

    function getCart() {
        if ((`session.has('cart_data')`)) {
            return JSON.parse(`{!! Session::get('cart_data')['cart'] !!}`);
        }
        return null;
    }
    function removeFormatter(value){
        return Number((value).replace(/[.₫]/g,''));
    }
</script>
@endsection('script')