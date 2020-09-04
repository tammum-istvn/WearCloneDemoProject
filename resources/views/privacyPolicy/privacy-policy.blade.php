@extends('master')
@section('custom-css')
    <style>
        .privacy-page {
            font-family: "Roboto","HelveticaNeue","Helvetica Neue",sans-serif;
        }
        .privacy-title h1 {
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 9px;
            color: #080000;
            text-decoration: none;
        }
        .privacy-title h1 a {
            color: #000;
        }
        .privacy-title h1 a:hover {
            text-decoration: none;
        }
    </style>
@endsection
@section('main')
    <div class="privacy-page">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="privacy-title">
                        <h1>
                            <a href="#">{{ __('privacy.privacy_title') }}</a>
                        </h1>
                    </div>
                    <div class="privacy-content">
                        <p>{{ __('privacy.p_1') }}<br>
                            {{ __('privacy.p_2') }}<br>
                            {{ __('privacy.p_3') }}<br>
                            {{ __('privacy.p_4') }}<br>
                            {{ __('privacy.p_5') }} <strong>snappinvn@gmail.com</strong> {{ __('privacy.p_6') }}<br>
                            {{ __('privacy.p_7') }}<br>
                        </p>
                        <p>
                            <strong>{{ __('privacy.privacy_1') }}</strong><br>
                            {{ __('privacy.privacy_1.1') }}<br>
                            {{ __('privacy.privacy_1.2') }}<br>
                            {{ __('privacy.privacy_1.3') }}<br>
                            {{ __('privacy.privacy_1.3.a') }}<br>
                            {{ __('privacy.privacy_1.3.b') }}<br>
                            {{ __('privacy.privacy_1.3.c') }}<br>
                            {{ __('privacy.privacy_1.3.d') }}
                        </p>
                        <p>
                            <strong>{{ __('privacy.privacy_2') }}</strong><br>
                            {{ __('privacy.privacy_2.1') }} <strong>https://www.snappinvn.com.vn</strong></p>
                        <p>
                            <strong>{{ __('privacy.privacy_3') }}</strong><br>
                            {{ __('privacy.privacy_3.1') }}<br>
                            {{ __('privacy.privacy_3.1.a') }}<br>
                            {{ __('privacy.privacy_3.1.b') }}<br>
                            {{ __('privacy.privacy_3.1.c') }}　　
                        </p>
                        <p>
                            <strong>{{ __('privacy.privacy_4') }}</strong><br>
                            {{ __('privacy.privacy_4.1') }}<br>
                            {{ __('privacy.privacy_4.2') }} <strong>https://www.snappinvn.com.vn</strong> {{ __('privacy.privacy_4.2.a') }} <strong>snappinvn@gmail.com</strong> {{ __('privacy.privacy_4.2.b') }} <span> 0123456789 </span> {{ __('privacy.privacy_4.2.c') }}</p>
                        <p>
                            <strong>{{ __('privacy.privacy_5') }}</strong><br>
                            {{ __('privacy.privacy_5.1') }}</p>
                        <p>
                            {{ __('privacy.privacy_6') }} <strong>snappinvn@gmail.com</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
