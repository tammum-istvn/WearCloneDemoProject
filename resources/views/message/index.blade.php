<div class="message-index">
    <ul class="message-text">
        @foreach($messages as $row)
        <li class="message-li clearfix">
            <div class="{{ ($row->sender_id == Auth::id()) ? 'sent-mess' : 'received-mess' }}" style="max-width: 80%">
                <div class="is-size-6 message">{!! $row->message !!}</div>
                <p class="is-size-7">
{{--                    @if($row->sender_id == Auth::id())--}}
{{--                    <span class="mr-5" style="float: left;">--}}
{{--                        @if($row->is_read)--}}
{{--                        {{ __('message.seen') }}--}}
{{--                        @else--}}
{{--                        {{ __('message.unseen') }}--}}
{{--                        @endif--}}
{{--                    </span>--}}
{{--                    @endif--}}
                    {{ ($row->created_at)->format('Y-m-d h:i A') }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="submit-text">
    <input type="text" class="form-control submit" placeholder="{{ __('message.placeholer_msg') }}" name="message" id="type-mess" autofocus>
</div>

<script>
    $('.message input').each(function(index) {

        let url = "{{ route('apiItemIsAvailable','') }}" + '/' + $(this).val();
        var parent = $(this).parent('a');

        AjaxRequest.get(url).then(function(isAvailable) {
            if (!isAvailable) {
                $(parent).attr('href', '#');
                $(parent).find('.is-hidden').removeClass('is-hidden');
                $(parent).find('.card').addClass('disable-click');
            }
        }).catch(function(err) {
            console.log(err);
        });
    })
</script>
