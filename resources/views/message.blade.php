<div class="col-md-6">
    <div class="message-open">
        <button class="btn btn-success" onclick="openForm()" id="open-popup-btn"><i class="fas fa-envelope"></i> {{ __('master.messBtn') }}</button>
    </div>
    <div class="card" id="message-popup">
        <div class="message-container">
            <div class="col-md-12">
                <div class="row" id="pop-header">
                    <div class="col-md-4">
                        {{ __('master.conversation') }}
                    </div>
                    <div class="col-md-8" id="pop-header-right">
                        <button class="btn" id="close-popup" onclick="closeForm()"><img src="https://img.icons8.com/small/16/000000/down-squared.png"/></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" id="chat-list">
                        <ul id="channels">
                        </ul>
                    </div>
                    <div class="col-md-8" id="chat-index">
                        @if(!Auth::id())
                            <div style="text-align: center">{{ __('master.loginToSent') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('message.script')
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script type="text/javascript">
        var channel_id = '';
        var my_id = '{{ Auth::id() }}';
        $(function () {
            getChannels();
            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            // var pusher = new Pusher('eab8875d2c11936ed113', {
            //     cluster: 'ap1',
            //     forceTLS: true
            // });
            var pusher = new Pusher('391fc33c1f12e96cb20f', {
                cluster: 'ap1',
                forceTLS: true
            });


            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // console.log(data);

                if (data.create){
                    if(data.sender_id == my_id || data.receiver_id == my_id){
                        var li = $('<li  id='+data.channel_id+' class="chat_channels"></li>');
                        var url = data.receiver_id;
                        var text = data.receiver_name;
                        var src = '{{ url('/') }}'+'/'+data.receiver_pic;
                        if(data.receiver_pic == ''){
                            src = 'https://via.placeholder.com/150';
                        }
                        if(!data.receiver_pic){
                            src = 'https://via.placeholder.com/150';
                        }
                        if(my_id != data.sender_id){
                            text = data.sender_name;
                            url = data.sender_id;
                            src = '{{ url('/') }}'+'/'+data.sender_pic;
                            if(data.sender_pic == ''){
                                src = 'https://via.placeholder.com/150';
                            }
                        }
                        var route = `{{ route('individual.profile', '/') }}`+'/'+url;
                        var link = $('<a href="'+route+'"></a>');
                        var img = $('<img src="'+src+'" alt="avatar">');
                        link.append(img);
                        li.append(link);
                        li.append(text);
                        $("#channels").append(li);
                    }
                }

                //when user received new message, cou parameters will increase
                var cou = 0;
                var new_mess = $('<div class="new-mess"></div>');
                var find_channel = $('#'+ data.channel);
                if(find_channel.attr('id')){
                    cou++;
                }
                var open_pop = $('#open-popup-btn');
                if(cou != 0){
                    open_pop.append(new_mess);
                }


                // alert(JSON.stringify(data));
                if (channel_id == data.channel) {
                    $('#' + data.channel).click();
                    $('.new-mess').remove();
                } else{
                    //moving channel to top
                    $('#' + data.channel).parent().prepend($('#' + data.channel));
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.channel).find('.pending').html());
                    if (pending) {
                        $('#' + data.channel).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.channel).append('<span class="pending">1</span>');
                    }
                }
            });

            //sent message
            $(document).on('keyup', '.submit-text input', function (e) {
                var message = $(this).val();

                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode == 13 && message != '' && channel_id != '') {
                    $(this).val(''); // while pressed enter text box will be empty

                    var datastr = "channel_id=" + channel_id + "&message=" +"<div class='message-single'>" + message +"</div>";
                    $.ajax({
                        type: "post",
                        url: "{{ route('messagePost') }}", // need to create this post route
                        data: datastr,
                        cache: false,
                        success: function (data) {

                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {
                            scrollToBottomFunc();
                        }
                    })
                }
            });

            //get message when click user
            $('#channels').on('click','.chat_channels',function () {
                //set active class
                var li = $('#channels li');
                for (var i = 0; i < li.length; i++) {
                    var current = document.getElementsByClassName("chat_active");
                    if(current[0]){
                        current[0].className = 'chat_channels';
                    }
                    this.className = 'chat_channels chat_active';
                }
                $(this).find('.pending').remove();

                channel_id = this.id;
                $.ajax({
                    type: "get",
                    url: "{{ route('message','/') }}"+'/'+channel_id,
                    success: function (data) {
                        console.log(data);

                        $('#chat-index').html(data);
                        scrollToBottomFunc();
                        $('#type-mess').focus();
                    }
                });
            })

        });

        //get channels
        function getChannels() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getChannel') }}",
                success: function (data) {
                    data.forEach(element => {
                        // console.log(element);
                        var li = $('<li  id='+element['id']+' class="chat_channels"></li>');

                        var count_pend = 0;
                        element['messages'].forEach(element => {
                            if(element['is_read'] == 0 && element['sender_id'] != my_id){
                                count_pend++;
                            }
                        });
                        if (count_pend != 0) {
                            var pending = $('<span class="pending">'+count_pend+'</span>');
                            li.append(pending);
                        }

                        // var img = $('<img src="https://via.placeholder.com/150" alt="avatar">');
                        var img = $(`<img src="{{url('')}}/`+element.receiver.picture+`" alt="avatar">`);
                        var url = element['receiver']['id'];
                        var text = element['receiver']['first_name'];
                        if(my_id != element['sender']['id']){
                            text = element['sender']['first_name'];
                            url = element['sender']['id'];
                        }
                        var route = `{{ route('individual.profile', '') }}`+'/'+url;
                        var link = $('<a href="'+route+'"></a>');
                        link.append(img);
                        li.append(link);
                        li.append(text);
                        $("#channels").append(li);
                    });
                }
            });
        }
        //get message when click user
        function userClicked(id){
            receiver_id = id;
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                success: function (data) {
                    $('#chat-index').html(data);
                    scrollToBottomFunc();
                }
            });
        }

        //open message form
        function openForm() {
            $('#message-popup').slideToggle("slow");
            $('#open-popup-btn').css('display','none');
            $('.new-mess').remove();
            scrollToBottomFunc();
        }

        //close message form
        function closeForm() {
            $('#message-popup').slideToggle("slow");
            $('#open-popup-btn').css('display','block');
            $('.new-mess').remove();
        }

        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-index').animate({ scrollTop: $(".message-index")[0].scrollHeight }, 1);
        }
    </script>
    @endsection
