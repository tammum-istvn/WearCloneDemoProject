@extends('master')
@section('custom-css')
    <style>
        .terms-page {
            font-family: "Roboto","HelveticaNeue","Helvetica Neue",sans-serif;
        }
        .terms-title h1 {
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 9px;
            color: #080000;
            text-decoration: none;
        }
        .terms-title h1 a {
            color: #000;
        }
        .terms-title h1 a:hover {
            text-decoration: none;
        }
    </style>
@endsection
@section('main')
    <div class="terms-page">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="terms-title">
                        <h1>
                            <a href="#">{{ __('terms.terms_title') }}</a>
                        </h1>
                    </div>
                    <div class="content-page rte">
                        <p>{{ __('terms.p_1') }}</p>
                        <p>{{ __('terms.p_2') }}</p>
                        <p><strong>{{ __('terms.term_1') }}</strong></p>
                        <p>{{ __('terms.term_1.1') }}</p>
                        <p>{{ __('terms.term_1.2') }}</p>
                        <p>{{ __('terms.term_1.3') }}</p>
                        <p>{{ __('terms.term_1.4') }}</p>
                        <p><strong>{{ __('terms.term_2') }}</strong></p>
                        <p>{{ __('terms.term_2.1') }}</p>
                        <p><strong>{{ __('terms.term_3') }}</strong></p>
                        <p>{{ __('terms.term_3.1') }}</p>
                        <p><strong>{{ __('terms.term_4') }}</strong></p>
                        <p>{{ __('terms.term_4.1') }}</p>
                        <p>{{ __('terms.term_4.2') }}</p>
                        <p>{{ __('terms.term_4.3') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
