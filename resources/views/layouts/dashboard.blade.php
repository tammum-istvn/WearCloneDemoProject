@extends('master')
@section('custom-css')
<style>
    .list-group-item {
        font-weight: 600;
    }

    .list-group-item.active {
        background-color: black !important;
    }

    .list-group-item .fas {
        margin-top: 5px;
    }

</style>
@yield('dashboard.style')
@endsection

@section('main')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">

                <a id="edit-profile" href="{{ route(Session::get('api_prefix').'.profileEdit') }}" class="list-group-item list-group-item-action">
                    {{ __('dashboard.edit_profile') }}
                    <i class="fas fa-chevron-right float-right"></i>
                </a>

                <a id="edit-picture" href="{{ route('profilePicture') }}" class="list-group-item list-group-item-action mt-2">
                    {{ __('dashboard.change_picture') }}
                    <i class="fas fa-chevron-right float-right"></i>
                </a>

                <a id="edit-address" href="{{ route('address') }}" class="list-group-item list-group-item-action mt-2">
                    {{ __('dashboard.edit_address') }}
                    <i class="fas fa-chevron-right float-right"></i>
                </a>

            </div>
        </div>
        <div class="col-md-8">
            @yield('menu-content')
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // $(document).on('click', "a", function () {
        // $('a').removeClass('active');
        // $(this).addClass('active');
    // });

</script>
@yield('dashboard.script');
@endsection
