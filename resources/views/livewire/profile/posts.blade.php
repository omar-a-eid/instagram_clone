<div>
    <ul class="grid grid-cols-3 sm:gap-5">
        @foreach ($posts as $post)
            @php
                $cover = $post->media()->first();
            @endphp
            <li onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})"
                class="h-28 sm:h-72 w-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">


                @if ($post->media->count() > 1)
                    <div class="absolute top-4 right-4 z-10 text-white">
                        <span>
                            <svg class="h-6 w-6" fill="none" height="24" viewBox="0 0 24 24" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <g fill="currentcolor">
                                    <path
                                        d="m16 12.9v4.2c0 3.5-1.4 4.9-4.9 4.9h-4.2c-3.5 0-4.9-1.4-4.9-4.9v-4.2c0-3.5 1.4-4.9 4.9-4.9h4.2c3.5 0 4.9 1.4 4.9 4.9z" />
                                    <path
                                        d="m17.0998 2h-4.2c-3.08312 0-4.52906 1.09409-4.83029 3.73901-.06302.55334.39525 1.01099.95216 1.01099h2.07813c4.2 0 6.15 1.95 6.15 6.15v2.0781c0 .5569.4576 1.0152 1.011.9522 2.6449-.3013 3.739-1.7472 3.739-4.8303v-4.2c0-3.5-1.4-4.9-4.9-4.9z" />
                                </g>
                            </svg>
                        </span>
                    </div>
                @endif
                @switch($cover->mime)
                    @case('video')
                        <x-video :controls="false" source="{{ $cover->url }}" />
                    @break

                    @case('image')
                        <img src="{{ $cover->url }}" alt="image" class="h-full w-full object-cover" />
                    @break

                    @default
                @endswitch
            </li>
        @endforeach
    </ul>
</div>
