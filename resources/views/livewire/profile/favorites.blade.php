<div>
    <div class="favorites row g-4">
        @foreach ($favoritedPosts as $favorite)
            <div class="mt-5 col-lg-4 col-md-4 col-sm-6 col-12">
                @if ($favorite)
                    @foreach ($favorite->media ?? [] as $media)
                        @if ($media->mime === 'image')
                            <div class="ratio ratio-4x3">
                                <img src="{{ asset($media->url) }}" alt="Favorite Post Media" class="img-fluid"
                                    {{-- Add a click event handler to the image --}}
                                    onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $favorite->id }}}})"
                                    class="w-full h-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">
                            </div>
                        @elseif ($media->mime === 'video')
                            <div class="ratio ratio-4x3">
                                <video controls class="img-fluid">
                                    <source src="{{ asset($media->url) }}" type="video/mp4">

                                </video>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
