<div class="columns comment">
    <div class="column">
        <article class="media">
            <figure class="media-left is-64x64">
                <a href="#">
                    <img src="{{ url($image) }}" alt="pic" class="pro-pic">
                </a>
            </figure>
            <div class="media-content">
                <div class="content">
                    <strong>{{ $name }}</strong>
                    <p class="mb-0">
                        {{ $comment }}
                    </p>

                    <div class="level">

                        <div class="level-left">
                            @auth
                            <!-- only comment owner can modify the comment -->
                            @if(Auth::user()->id == ($user_id ?? '').'')

                            {{-- <a><i class="fa fa-pencil-square-o has-text-link" aria-hidden="true"></i> </a> --}}
                            <a class="comment-delete" onclick="deleteComment(`{{ $id ?? '' }}`, this)" value='test'>
                                <i class="fa fa-trash has-text-danger" aria-hidden="true"></i>
                            </a>
                            @endif
                            @endauth
                        </div>

                        <div class="level-right">
                            <span>{{ $date }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>