<article class="comments__comment media status-media">
    <div class="pull-left">
        <img class="media-object" src="{{ $comment->owner->present()->gravatar(30) }}" alt="{{ $comment->owner->username }}">
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->username }}</h4>
        {{ $comment->body }}
    </div>
</article>