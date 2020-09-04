<div class="footer">
    <div class="container">
        <div class="col-12">
{{--            <div class="row" id="footer-1">--}}
{{--                <div class="col-2">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">{{ __('master.all_looks') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.all_users') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.all_items') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.all_stores') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">{{ __('master.brand_list') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.category') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">{{ __('master.popular_looks') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.popular_users') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.popular_folders') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-3">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">{{ __('master.to_begin') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.help') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.contact') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.site_map') }}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-3">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">{{ __('master.iphone') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.android') }}</a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('images/fb.png') }}" alt="fb" class="soc-icon"> Facebook</a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('images/tw.png') }}" alt="tw" class="soc-icon"> Twitter</a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('images/ins.png') }}" alt="ins" class="soc-icon"> Instagram</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row" id="footer-2">
                <div class="col-9">
                    <ul class="hor-list">
                        <li><a href="https://www.is-tech.co.jp/" target="_blank">{{ __('master.corporate') }}</a></li>
                        <li><a href="{{route('rankList',['men'])}}">{{ __('User Ranking') }}</a></li>
                        <li><a href="{{route('rankList',['shop'])}}">{{ __('Shop Ranking') }}</a></li>
                        <li><a href="{{route('termsOfUse')}}">{{__('Terms of Use')}}</a></li>
                        <li><a href="{{route('privacyPolicy')}}">{{__('Privacy Policy')}}</a></li>
{{--                        <li><a href="#">{{ __('master.career') }}</a></li>
{{--                        <li><a href="#">{{ __('master.term') }}</a></li>--}}
{{--                        <li><a href="#">{{ __('master.privacy') }}</a></li>--}}
                    </ul>
                </div>
                <div class="col-3">
                    <select name="" id="lang" class="custom-select" style="border: none; width: 40%; float: right;">
                        <option value="en">{{ __('master.english') }}</option>
                        <option value="vi">{{ __('master.vietnamese') }}</option>
                    </select>
                </div>
                <form action="{{ url('lang/vi') }}" id="vn_lang"></form>
                <form action="{{ url('lang/en') }}" id="en_lang"></form>
            </div>

            {{-- <div class="row" id="user-list-link" style="margin-top:5px">
                <a href="{{route('rankList',['men'])}}" style="color: #666;" id="user-list-link">{{ __('master.all_users') }}</a>
            </div>

            <div class="row" id="shop-list-link" style="margin-top:5px">
                <a href="{{route('rankList',['shop'])}}" style="color: #666;" id="user-list-link">{{ __('master.all_stores')  }}</a>
            </div> --}}
            <div class="row" id="footer-3">
                <div class="col-12">
                    {{ __('master.copyright') }} <br>
                    {{ __('master.content') }}
                </div>
            </div>
            <input type="hidden" value="{{ Session::get('locale') }}" id="locale">
        </div>
    </div>
    @section('language.script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#lang").change(function() {
                // window.location = "lang/"+$(this).val();
                var lang = $(this).val();
                if (lang == 'en'){
                    document.getElementById('en_lang').submit();
                }else{
                    document.getElementById('vn_lang').submit();
                }
            });
            var current_locale = $('#locale').val();
            if(current_locale==''){
                $('#lang option[value=en]').attr('selected','selected');
                $('#lang option[value=vi]').removeAttr('selected');
            }
            else if(current_locale == 'en'){
                $('#lang option[value=en]').attr('selected','selected');
                $('#lang option[value=vi]').removeAttr('selected');
            }else{
                $('#lang option[value=vi]').attr('selected','selected');
                $('#lang option[value=en]').removeAttr('selected');
            }
        });

        // $(document).ready(function() {
        //     //on hover underline the link
        // $("#user-list-link").over(function() {
        //     $("#user-list-link").css('text-decoration', 'underline');
        // });
        // });
    </script>
        @endsection
</div>
