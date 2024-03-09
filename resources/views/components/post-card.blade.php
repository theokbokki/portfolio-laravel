<article class="post-card">
    <a href="#" class="post-card__link">@lang('posts.link')</a>
    <h2 class="post-card__title"><span class="post-card__title--underline">{{ $post->title }}</span></h2>
    <p class="post-card__excerpt">{{ $post->excerpt }}</p>
    <div class="post-card__tags">
    @foreach($post->tags as $tag)
        <x-tag>{{ $tag->text }}</x-tag>
    @endforeach
    </div>
</article>
