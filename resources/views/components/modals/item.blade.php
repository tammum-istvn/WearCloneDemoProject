<link rel="stylesheet" href="{{ asset('css/item.css') }}">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <p id="select_item" class="modal-title is-size-5 has-link back">Select an item
            </p>
            <p id="size" class="ml-2 modal-title is-size-5">
                > size
            </p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="tab_left">
                <section>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div id="search" class="field is-grouped">
                                <p class="control is-expanded">
                                    <input id="searchKey" class="input" type="text" placeholder="Find an item">
                                </p>
                                <button type="button" class="button is-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section style="display:flex">
                    <div class="container">
                        <ul id="items" class="items ml-5">
                        </ul>
                    </div>
                </section>
            </div>
            <div id="tab_right" class="inactive">
                <div class="item-details">
                    <div class="header mb-2 pb-2 has-text-weight-bold" style="border-bottom: 1px dotted;">
                        <p class="m-0">name &emsp; &emsp; &emsp; : <span id="name">test</span></p>
                        <p class="m-0">shop &emsp; &emsp; &emsp; &nbsp;: <span id="shop">test</span></p>
                        <p class="m-0">category &emsp; &emsp;: <span id="category">test</span></p>
                        <p class="m-0">sub-category&nbsp; : <span id="sub_category">test</span> </p>
                        <p class="m-0">brand &emsp; &emsp; &emsp;: <span id="brand">test</span></p>
                        <input id="item_id" type="hidden">
                    </div>
                    <div class="bottom">
                        <ul id="detail_list" class="ml-2 is-size-7">

                        </ul>
                    </div>
                    <div class="columns is-vcentered is-centered">
                        <button id="confirm_item" type="button" class="button m-2 mt-5 pl-5 pr-5 is-primary" data-dismiss="modal"> confirm </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>