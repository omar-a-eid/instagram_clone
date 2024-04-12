<!-- profile/favorites.blade.php -->

<div class="favorites">
    @foreach ($favoritedPosts as $favorite)
        @foreach ($favorite->post->media as $media)
            <div class="favorite-item">
                <img src="{{ asset($media->url) }}" alt="Favorite Post Media">
            </div>
        @endforeach
    @endforeach
</div>
