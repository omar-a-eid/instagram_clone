<x-app-layout>

    <div class="wrapper flex">
        <div class="profile_container">

            <div class="profile_info">
                <div class="cart">

                    {{-- user Image --}}
                    <div class="img" onclick="photoModal.showModal()">
                        <a href="#" id="profileImageLink">
                            @if (!$user->image)
                                <img src="{{ asset('assets/images/avatar.jpeg') }}" alt="Avatar" id="profileImage"
                                    class="circle-image rounded-circle">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Photo"
                                    id="profileImage" class="circle-image rounded-circle">
                            @endif
                        </a>
                    </div>



                    @if (auth()->check() && auth()->user()->id === $user->id)
                        <!-- Modal For Removing And Updating Photo -->
                        <dialog id="photoModal" class="modal">
                            <div class="modal-box">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Change Profile Photo</h5>
                                        <form method="dialog">
                                            <button class="btn btn-sm absolute right-3 top-3">✕</button>
                                        </form>
                                    </div>
                                    <div style="height: 15vh;">
                                        <form id="updatePhotoForm" action="{{ route('profileEdit.edit', $user->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="profilePhotoInput"
                                                    class="text-primary cursor-pointer">Upload Photo</label>
                                                <input id="profilePhotoInput" name="image" type="file"
                                                    accept="image/*" style="display: none;"
                                                    onchange="document.getElementById('updatePhotoForm').submit();">
                                            </div>
                                        </form>
                                        @if ($user->image)
                                            <hr class="w-100 mb-3">
                                            <form id="removePhotoForm"
                                                action="{{ route('editPhoto.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="remove_photo" value="true">
                                                <label for="removePhotoCheckbox" class="text-red-600 cursor-pointer"
                                                    onclick="document.getElementById('removePhotoForm').submit();">Remove
                                                    Profile Photo</label>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </dialog>
                        {{-- End of Modal --}}
                    @endif




                    {{-- user account details --}}
                    <div class="info">
                        <div class="flex items-center">
                            <p class="name mr-10">
                                {{ $user->name }}

                            </p>
                            <div>
                                @auth
                                    @if (auth()->user()->isFollowing($user))
                                        <a href="#" class="btn">Following</a>
                                    @elseif ($user->isFollowing(auth()->user()))
                                        <form action="{{ route('follow', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Follow Back</button>
                                        </form>
                                    @else
                                        <a href="{{ route('profileEdit.edit', $user->id) }}" class="btn edit_profile">Edit
                                            Profile</a>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        <div class="general_info">
                            <p class="fw-bold mt-2" style="width: 100px">{{ $user->postsCount() }} posts </p>
                            {{-- <a href="{{ route('profileFollowers.followers', $user->id) }}" class="btn"
                                onclick="followers.showModal()">
                                <span class="fw-bold cursor-pointer"> {{ $user->followersCount() }} followers </span>
                            </a> --}}
                            <p class="fw-bold mt-2" onclick="followers.showModal()">
                                <span class="fw-bold cursor-pointer"> {{ $user->followersCount() }} followers </span>
                            </p>
                            {{-- <a href="{{ route('profileFollowers.followings', $user->id) }}" class="btn"
                                onclick="following.showModal()">
                                <span class="fw-bold cursor-pointer"> {{ $user->followingCount() }} followings </span>
                            </a> --}}
                            <p class="fw-bold mt-2" onclick="following.showModal()">
                                <span class="fw-bold cursor-pointer"> {{ $user->followingCount() }} followings </span>
                            </p>
                        </div>

                        <p class="nick_name">{{ $user->name }}</p>
                        <p class="desc">
                            {{ $user->bio }}
                            <br>
                        </p>
                        <p class="desc">
                            {{ $user->gender }}
                            <br>
                        </p>
                        <p class="desc">
                            <a href="{{ $user->website }}" target="_blank"
                                style="text-decoration: none; color: blue;">{{ $user->website }}</a>
                            <br>
                            <br>
                        </p>

                        <!-- Followers Modal -->
                        <dialog id="followers" class="modal">
                            <div class="modal-box" style="max-width: 400px; width: 100%;">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <div class="modal-content" style="height: 400px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="followersModalLabel">Followers</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="searchFormFollowers" method="GET">
                                            <div class="search-container">
                                                <input type="text" id="queryFollowers" name="queryFollowers"
                                                    class="form-control search-input" placeholder="Search">
                                            </div>
                                        </form>
                                        <ul id="followersList">
                                            @foreach ($user->followers as $follower)
                                                <a href="{{ route('profile.show', ['id' => $follower->id]) }}">
                                                    <li class="follower-container">
                                                        <span>{{ $follower->name }}</span>
                                                        @auth
                                                            @if (auth()->user()->id == $user->id)
                                                                @if (auth()->user()->isFollowing($follower))
                                                                    <form
                                                                        action="{{ route('removeFollower', $follower->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Remove</button>
                                                                    </form>
                                                                @else
                                                                    <form action="{{ route('follow', $follower->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Follow</button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        @endauth
                                                    </li>
                                                </a>
                                            @endforeach
                                        </ul>

                                        <p id="noResultsMessageFollowers" class="text-center" style="display: none;">
                                            No
                                            results found.</p>
                                    </div>
                                    <form method="dialog" class="modal-backdrop">
                                        <button>close</button>
                                    </form>
                                </div>
                            </div>

                        </dialog>
                        {{-- #endOfModal --}}


                        {{-- Followings modal --}}
                        <dialog id="following" class="modal">
                            <div class="modal-box " style="max-width: 400px; width: 100%;">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <div class="modal-content" style="height: 400px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="followingsModalLabel">Followings</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">

                                        <form id="searchFormFollowings" method="GET">
                                            <div class="search-container">
                                                <input type="text" id="queryFollowings" name="queryFollowings"
                                                    class="form-control search-input" placeholder="Search">
                                            </div>
                                        </form>

                                        <ul class="followingsList">
                                            @foreach ($user->following as $followedUser)
                                                <a href="{{ route('profile.show', ['id' => $followedUser->id]) }}">
                                                    <li class="following-container">
                                                        <span>{{ $followedUser->name }}</span>
                                                        @auth
                                                            @if (auth()->user()->id == $user->id)
                                                                @if (auth()->user()->isFollowing($followedUser))
                                                                    <form
                                                                        action="{{ route('unfollow', $followedUser->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm">Unfollow</button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        @endauth
                                                    </li>
                                                </a>
                                            @endforeach
                                        </ul>

                                        <p id="noResultsMessageFollowings" class="text-center"
                                            style="display: none;">No
                                            results found.</p>
                                    </div>
                                </div>
                            </div>
                        </dialog>
                        {{-- #endOfModal --}}
                    </div>
                </div>


                {{-- Stories region --}}
                <div class="highlights mt-4 mb-5">
                    <div class="highlight">
                        <div class="img">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image"
                                class="highlighted-image rounded-circle">
                        </div>
                        <p>conseils</p>
                    </div>
                    <div class="highlight">
                        <div class="img">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image"
                                class="highlighted-image rounded-circle">
                        </div>
                        <p>conseils</p>
                    </div>
                    <div class="highlight">
                        <div class="img">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image"
                                class="highlighted-image rounded-circle">
                        </div>
                        <p>conseils</p>
                    </div>
                    <div class="highlight highlight_add">
                        <div class="img">
                            <img src="{{ asset('assets/images/plus.png') }}" class="highlighted-image"
                                alt="">
                        </div>
                        <p>New</p>
                    </div>
                </div>

                <hr>

                {{-- Posts - Saved - Reels Region  --}}
                <div class="posts_profile">

                    <div role="tablist" class="tabs tabs-bordered tabs-container">
                        <input type="radio" name="my_tabs_1" role="tab" class="tab post" aria-label="Posts"
                            checked />
                        <div role="tabpanel" class="tab-content p-10">
                            <div>
                                <!-- Livewire component to display user posts -->
                                @livewire('profile.posts', ['userId' => $user->id])
                            </div>
                        </div>

                        @if (auth()->check() && auth()->user()->id === $user->id)
                            <input type="radio" name="my_tabs_1" role="tab" class="tab saved"
                                aria-label="Saved" />
                            <div role="tabpanel" class="tab-content p-10">
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <!-- Livewire component to display user favorites -->
                                    @livewire('profile.favorites', ['userId' => $user->id])
                                </div>
                            </div>
                        @endif

                        <input type="radio" name="my_tabs_1" role="tab" class="tab tagged"
                            aria-label="Tagged" />
                        <div role="tabpanel" class="tab-content p-10">

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/showProfile.js') }}" defer></script>
</x-app-layout>
