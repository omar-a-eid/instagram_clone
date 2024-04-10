<!-- resources/views/livewire/profile/posts.blade.php -->

<div>
    @foreach ($posts as $post)
        <div>
            <!-- Display post content here -->
            <p>{{ $post->description }}</p>
        </div>
    @endforeach
</div>
