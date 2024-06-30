<section class="posts__container">
<form action="{{ route('filter-posts') }}" method="post" class="posts__types">
    @csrf
    <button type="submit"
        name="button"
        value="all"
        class="posts__type
        {{ is_null(session('type')) ? 'posts__type--selected' : ''}}"
    >
        @lang('posts.all')
    </button>
    <button type="submit"
        name="button"
        value="work"
        class="posts__type {{ session('type') === 'work' ? 'posts__type--selected' : ''}}"
    >
        @lang('posts.works')
    </button>
    <button type="submit"
        name="button"
        value="article"
        class="posts__type {{ session('type') === 'article' ? 'posts__type--selected' : ''}}"
    >
        @lang('posts.articles')
    </button>
</form>
@fragment('posts')
<div class="posts">
    @foreach($postsByYear as $year => $posts)
        <div class="posts__for-year">
            <p class="posts__year">{{ $year }}</p>
            <div class="posts">
            @foreach($posts as $post)
                <x-post-card :$post/>
            @endforeach
            </div>
        </div>
    @endforeach
</div>
@endfragment
</section>
