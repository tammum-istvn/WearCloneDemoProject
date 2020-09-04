<div class="columns user-list">
    <div class="column is-2">
        <figure class="image is-96x96">
            <img src="" class="insert-user-pic is-rounded" style="height: 100px">
        </figure>
    </div>
    <div class="column is-6">
        <div class="columns" style="padding-left: 10px;padding-top: 10px">
            <a href="" class="insert-user-name" style="font-weight: bold; font-size:16px; color:black"></a>
        </div>
        {{-- added new information --}}
        <div class="columns" style="padding-left: 5px">
                <span class="icon">
                    <i class="fa fa-map-marker" aria-hidden="true" style="color: gray"></i>
                </span>
                <span class="insert-user-city" style="color:gray;"></span>
        </div>
        <div class="columns" style="padding-left: 10px">
                <span class="insert-user-height" style="margin-right: 10px;color:gray;"></span>
                <span class="insert-user-gender" style="color:gray;">
                </span>
        </div>
        <div class="columns" style="padding-left: 10px">
            <a style="color:black;"><span class="insert-user-total-looks-or-follower"></span>
                <span class="insert-user-total-looks-or-follower-text"></span>
            </a>
        </div>
        {{-- end adding new information --}}
    </div>
    <div class="column is-4 level-item has-text-right has-text-left-mobile pt-5">
        <a class="button is-light insert-favorite-btn">
            <span><i class="fa fa-star" style="color: white" aria-hidden="true"></i>
            </span>
            <span class="insert-favourite-btn-text">Add to favourite
            </span></a>
           {{-- <x-favorite-btn class="insert-favorite-btn" profileId="" linkId=""/> --}}
    </div>
</div>
