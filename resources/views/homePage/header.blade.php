<div id="header">
    <div class="container">
        <div class="row header-content">
            <div class="col-4 vcenter" id="header-1">
                <div class="searchNormal">
                    <form action="{{ route('search') }}">
                        <input type="text" name="search" class="searchInput" autocomplete="off" placeholder="{{__('master.keyword')}}. . ." required value="@if(isset($keyword)){{ $keyword }}@endif">
                    </form>
                </div>
            </div>
            <div class="col-4 vcenter" id="header-2">
                <a class="upper-case" style="text-decoration: none" href="{{ url('/') }}">
                {{ __('SNAPPINVN') }}
                </a>
            </div>
            <div class="col-4 vcenter" id="header-3">
                <div class="row">
                    @guest
                    <div style="display: contents">
                        <a href="{{ route('login') }}" class="">
                            <img src="{{ asset('images/pro.jpg') }}" alt="" width="30px" height="30px" style="border: 1px solid gray; border-radius: 5px;"> &nbsp;
                            {{ __('master.login') }}
                        </a>
                        <div style="height: 15px; width: 1px; background-color: gray; margin: 8px 10px;"></div>
                        <a class="mt-1" href="{{ route('register') }}">
                            {{ __('master.sign_up') }}
                        </a>
                    </div>
                    @elseif(!session()->has('api_prefix'))

                    {{ Auth::logout() }}
                    <div style="display: contents">
                        <a href="{{ route('login') }}" class="">
                            <img src="{{ asset('images/pro.jpg') }}" alt="" width="30px" height="30px" style="border: 1px solid gray; border-radius: 5px;"> &nbsp;
                            {{ __('master.login') }}
                        </a>
                        <div style="height: 15px; width: 1px; background-color: gray; margin: 8px 10px;"></div>
                        <a class="mt-1" href="{{ route('register') }}">
                            {{ __('master.sign_up') }}
                        </a>
                    </div>

                    @else
                    <div>

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route(Session::get('api_prefix').'.profile',Auth::user()->id) }}">
                                {{ __('master.my_page') }}
                            </a>
                            <a class="dropdown-item" href="{{ route(Session::get('api_prefix').'.profileEdit') }}">
                                {{ __('master.general') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('master.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- cart total  -->
                    {{--
                    <div class="ml-4 mt-1 vcenter">
                        <a href="{{ route('cart') }}">
                            <i class="fas fa-shopping-cart is-size-5"></i>
                            <span id="cartTotal" class="mb-1 has-text-weight-bold">{!! Session::get('cart_data')['quantity'] !!}</span>
                        </a>
                    </div>
                    --}}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>


