<section class="posts__container">
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
</section>
