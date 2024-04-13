<div>
    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="mt-5 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="post-item">
                    <!-- Display post media -->
                    @foreach ($post->media as $media)
                        <div class="ratio ratio-4x3">

                            {{-- Add a click event handler to the image --}}
                            <img src="{{ asset($media->url) }}" class="img-fluid" alt="Post Media"
                                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})"
                                class="w-full h-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
