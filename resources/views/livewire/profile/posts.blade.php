<div class="d-flex flex-wrap gap-2">
    <!-- Your Livewire component content goes here -->
    @foreach ($posts as $post)
        <div class="post-item">
            <!-- Display post media -->
            @foreach ($post->media as $media)
                <img src="{{ asset($media->url) }}" class="img-fluid item_img" alt="Post Media"
                    style="max-width: 100%; height: auto;">
            @endforeach
        </div>
    @endforeach
</div>
