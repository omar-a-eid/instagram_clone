<!-- profile/favorites.blade.php -->
<div>
    <div class="favorites row g-4">
        @foreach ($favoritedPosts as $favorite)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                @if ($favorite)
                    @foreach ($favorite->media ?? [] as $media)
                        <div class="favorite-item ratio ratio-16x9">
                            <img src="{{ asset($media->url) }}" alt="Favorite Post Media"
                                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $favorite->id }}}})"
                                class="w-full h-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
