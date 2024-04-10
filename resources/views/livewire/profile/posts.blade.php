<div>
    <div class="row g-4">
        <!-- Your Livewire component content goes here -->
        @foreach ($posts as $post)
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="post-item">
                    <!-- Display post media -->
                    @foreach ($post->media as $media)
                        <div class="ratio ratio-1x1">
                            <!-- Add a click event handler to the image -->
                            <img src="{{ asset($media->url) }}" class="img-fluid" alt="Post Media"
                                wire:click="loadPostForUser({{ $post->id }})">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
