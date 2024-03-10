<article class="post-card">
    <div class="post-card__type">
        <img src="{{ asset(App\Enums\PostType::icon($post->type)) }}" class="post-card__type--icon"/>
    </div>
    <div class="post-card__content">
        <a href="#" class="post-card__link">@lang('posts.link', ['title' => $post->title])</a>
        <h2 class="post-card__title"><span class="post-card__title--underline">{{ $post->title }}</span></h2>
        <p class="post-card__excerpt">{{ $post->excerpt }}</p>
        <div class="post-card__tags">
        @foreach($post->tags as $tag)
            <x-tag>{{ $tag->text }}</x-tag>
        @endforeach
        </div>
    </div>
</article>
