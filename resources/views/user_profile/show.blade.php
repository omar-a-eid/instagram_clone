<x-app-layout>
    {{-- <x-slot name="header">
    </x-slot> --}}

    <div class="wrapper flex">
        <div class="sidebar d-none d-md-block">
            <!-- Logo section -->
            <div class="logo-section pt-3">
                <div class="w-full px-4">
                    <div class="w-full px-4 flex items-center justify-center">
                        <img src="{{ asset('assets/logo.png') }}" class="h-16 w-44 text-black" alt="logo">
                    </div>
                </div>
            </div>

            <div>
                {{-- Side content --}}
                <ul>
                    <!-- Home -->
                    <li class="flex items-center gap-5">
                        <a href="/"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>
                                @if (request()->routeIs('Home'))
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                        <path
                                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                @endif
                            </span>
                            <h4 class=" text-lg  {{ request()->routeIs('Home') ? 'font-bold' : 'font-medium' }}">Home
                            </h4>
                        </a>
                    </li>

                    <!-- Search -->
                    <li><a class="flex items-center gap-5">
                            <a href="#"
                                class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                                            clip-rule="evenodd" />
                                    </svg>


                                </span>
                                <h4 class="text-lg font-medium">Search</h4>
                            </a>
                    </li>

                    <!-- Explore -->
                    <li>
                        <a href="{{ route('explore') }}"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>

                                @if (request()->routeIs('explore'))
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                                    </svg>
                                @else
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                    </svg>
                                @endif

                            </span>
                            <h4 class=" {{ request()->routeIs('explore') ? 'font-bold' : 'font-medium' }} text-lg ">
                                Explore</h4>
                        </a>
                    </li>

                    <!-- Reel -->
                    <li>
                        <a href="#"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>
                                @if (request()->routeIs('reels'))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24" id="instagram-reel">
                                        <path fill="#000" fill-rule="evenodd"
                                            d="M12.6126 1H8.72076L8.94868 1.68377L10.7208 7H14.6126L13.0513 2.31623L12.6126 1ZM15.9766 9C15.9921 9.00036 16.0076 9.00036 16.0231 9H23V17.5C23 20.5376 20.5376 23 17.5 23H6.5C3.46243 23 1 20.5376 1 17.5V9H9.97665C9.99208 9.00036 10.0076 9.00036 10.0231 9H15.9766ZM16.7208 7L14.9487 1.68377L14.7208 1H17.5C20.5376 1 23 3.46243 23 6.5V7H16.7208ZM6.5 1H6.61257L7.05132 2.31623L8.61257 7H1V6.5C1 3.46243 3.46243 1 6.5 1ZM10.0735 10.1808C9.76799 9.96694 9.36892 9.94083 9.03819 10.113C8.70746 10.2852 8.5 10.6271 8.5 11V18C8.5 18.3729 8.70746 18.7148 9.03819 18.887C9.36892 19.0592 9.76799 19.0331 10.0735 18.8192L15.0735 15.3192C15.3408 15.1321 15.5 14.8263 15.5 14.5C15.5 14.1737 15.3408 13.8679 15.0735 13.6808L10.0735 10.1808Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24"
                                        height="24" fill="currentColor" id="instagram-reel">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M1 6.5A5.5 5.5 0 0 1 6.5 1h11A5.5 5.5 0 0 1 23 6.5v11a5.5 5.5 0 0 1-5.5 5.5h-11A5.5 5.5 0 0 1 1 17.5v-11ZM6.5 3A3.5 3.5 0 0 0 3 6.5v11A3.5 3.5 0 0 0 6.5 21h11a3.5 3.5 0 0 0 3.5-3.5v-11A3.5 3.5 0 0 0 17.5 3h-11Z"
                                            clip-rule="evenodd"></path>
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M9.038 10.113a1 1 0 0 1 1.035.068l5 3.5a1 1 0 0 1 0 1.638l-5 3.5A1 1 0 0 1 8.5 18v-7a1 1 0 0 1 .538-.887zm1.462 2.808v3.158l2.256-1.579-2.256-1.58zM1 8a1 1 0 0 1 1-1h20a1 1 0 1 1 0 2H2a1 1 0 0 1-1-1z"
                                            clip-rule="evenodd"></path>
                                        <path fill="#000" fill-rule="evenodd"
                                            d="M7.684 1.051a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265zm6 0a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </span>
                            <h4 class=" text-lg  {{ request()->routeIs('reels') ? 'font-bold' : 'font-medium' }}">Reel
                            </h4>
                        </a>
                    </li>

                    <!-- Messages -->
                    <li>
                        <a href="#"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 32" id="messenger">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M14.268,2.112A13,13,0,0,0,6,23.3v3.661A1.258,1.258,0,0,0,7.82,28.09l2.663-1.332a12.9,12.9,0,0,0,7.25,1.126A13,13,0,1,0,14.268,2.112Z">
                                    </path>
                                    <path
                                        d="M9.049,18.163,13.64,11.63a.64.64,0,0,1,.94-.2l3.075,2.307a.641.641,0,0,0,.714.036l3.745-2.646a.64.64,0,0,1,.9.835l-3.707,6.414a.64.64,0,0,1-.9.263L14.3,16.181a.638.638,0,0,0-.615-.024l-3.794,2.9A.641.641,0,0,1,9.049,18.163Z">
                                    </path>
                                </svg>
                            </span>
                            <h4 class=" text-lg font-medium">Messages</h4>
                        </a>
                    </li>

                    <!-- Notifications -->
                    <li>
                        <a href="#"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </span>
                            <h4 class=" text-lg font-medium">Notifications</h4>
                        </a>
                    </li>

                    <!-- Create Post -->
                    <li>
                        <div onclick="Livewire.dispatch('openModal', { component: 'post.create' })"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span class="border border-gray-600  rounded-lg p-px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.9" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </span>
                            <h4 class=" text-lg font-medium">Create</h4>
                            </a>
                    </li>



                    <!-- Profile -->
                    <li>
                        <a href="{{ route('profile.show', $user->id) }}"
                            class="flex items-center gap-3 text-decoration-none px-4 py-3 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-6 h-6">
                                    <path
                                        d="M12 2c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 2a7 7 0 017 7c0 3.866-3.134 7-7 7s-7-3.134-7-7a7 7 0 017-7zm0 10a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                </svg>


                            </span>
                            <h4
                                class=" text-lg  {{ request()->routeIs('profile.home') ? 'font-bold' : 'font-medium' }} ">
                                Profile</h4>
                        </a>
                    </li>


                </ul>
            </div>

            <!-- Footer -->
            <footer class="more-section sticky bottom-0 mt-auto w-full grid px-3 z-50 bg-white">
                <div class="dropdown dropdown-top">
                    <label for="menu-toggle" tabindex="0"
                        class="cursor-pointer bg-white flex items-center w-full gap-3 m-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M3 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 5.25zm0 4.5A.75.75 0 013.75 9h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 9.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-medium">More</h3>
                    </label>
                    <!-- Use a checkbox input as a toggle -->
                    <input type="checkbox" id="menu-toggle" class="hidden" />
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-right" id="dropdown-menu">
                        <li><a class="flex items-center gap-5 dropdown-item flex" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                                Saved
                            </a></li>
                        <hr>
                        <li><a class="flex items-center gap-5 dropdown-item" href="#">Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>

        {{-- End Of Sidebar --}}


        <div class="profile_container">

            <div class="profile_info">
                <div class="cart">

                    {{-- user Image --}}
                    <div class="img">
                        <a href="#" id="profileImageLink">
                            @if (!$user->image)
                                <img src="{{ asset('assets/images/avatar.jpeg') }}" alt="Avatar" id="profileImage"
                                    class="circle-image rounded-circle">
                            @else
                                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Photo"
                                    id="profileImage" class="circle-image rounded-circle">
                            @endif
                        </a>
                    </div>



                    <!-- Modal For Removing And Updating Photo -->
                    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="photoModalLabel">Change Profile Photo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex flex-column align-items-center px-0"
                                    style="height: 15vh;">
                                    <form id="updatePhotoForm" action="{{ route('profileEdit.edit', $user->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="profilePhotoInput" class="text-primary cursor-pointer">Upload
                                                Photo</label>
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
                                            <label for="removePhotoCheckbox" class="text-danger cursor-pointer"
                                                onclick="document.getElementById('removePhotoForm').submit();">Remove
                                                Profile Photo</label>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of Modal --}}




                    {{-- user account details --}}
                    <div class="info">
                        <p class="name">
                            {{ $user->name }}
                            <a href="{{ route('profileEdit.edit', $user->id) }}"
                                class="btn btn-secondary edit_profile">Edit
                                Profile</a>
                        </p>
                        <div class="general_info">
                            <p><span>{{ $user->postsCount() }} </span>posts</p>
                            <a href="{{ route('profileFollowers.followers', $user->id) }}"
                                class="btn btn-link text-decoration-none text-dark w-50" data-bs-toggle="modal"
                                data-bs-target="#followersModal">
                                <p><span> {{ $user->followersCount() }} </span>followers</p>
                            </a>
                            <a href="{{ route('profileFollowers.followings', $user->id) }}"
                                class="btn btn-link text-decoration-none text-dark w-50" data-bs-toggle="modal"
                                data-bs-target="#followingsModal">
                               <p><span> {{ $user->followingCount() }} </span>followings</p>
                            </a>
                        </div>

                        <p class="nick_name">{{ $user->name }}</p>
                        <p class="desc">
                            {{ $user->bio }}
                            <br>
                        </p>
                        <p class="desc">
                            <a href="{{ $user->website }}" target="_blank"
                                style="text-decoration: none; color: blue;">{{ $user->website }}</a>
                            <br>
                            <br>
                        </p>

                        <!-- Followers Modal -->
                        <div class="modal fade" id="followersModal" tabindex="-1"
                            aria-labelledby="followersModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                style="max-width: 400px; width: 100%;">
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
                                                <li class="follower-container">
                                                    <span>{{ $follower->name }}</span>
                                                    @if (auth()->user()->isFollowing($follower))
                                                        <form action="{{ route('unfollow', $follower->id) }}"
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
                                                </li>
                                            @endforeach
                                        </ul>
                                        <p id="noResultsMessageFollowers" class="text-center" style="display: none;">
                                            No
                                            results found.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- #endOfModal --}}


                        {{-- Followings modal --}}
                        <div class="modal fade" id="followingsModal" tabindex="-1"
                            aria-labelledby="followingsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                style="max-width: 400px; width: 100%;">
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
                                                <li class="following-container ">
                                                    <span>{{ $followedUser->name }}</span>
                                                    @if (auth()->user()->isFollowing($followedUser))
                                                        <form action="{{ route('unfollow', $followedUser->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Unfollow</button>
                                                        </form>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                        <p id="noResultsMessageFollowings" class="text-center"
                                            style="display: none;">No
                                            results found.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <ul class="nav-pills w-100 d-flex justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item mx-2 " role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">
                                <img src="{{ asset('assets/images/feed.png') }}" alt="posts">
                                POSTS
                            </button>
                        </li>
                        <li class="nav-item mx-2" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">
                                <img src="{{ asset('assets/images/save-instagram.png') }}" alt="saved posts">
                                SAVED
                            </button>
                        </li>
                        <li class="nav-item mx-2" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">

                                <img src="{{ asset('assets/images/tagged.png') }}" alt="tagged posts">
                                TAGGED
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="profile-posts tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <!-- Livewire component to display user posts -->
                            @livewire('profile.posts', ['userId' => $user->id])
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <!-- Livewire component to display user favorites -->
                            @livewire('profile.favorites', ['userId' => $user->id])
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div id="tagged" class="post">

                                <div class="item">
                                    <img class="img-fluid item_img" src="https://i.ibb.co/Zhc5hHp/account4.jpg"
                                        alt="">
                                </div>
                                <div class="item">
                                    <img class="img-fluid item_img" src="https://i.ibb.co/SPTNbJL/account5.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/showProfile.js') }}" defer></script>
</x-app-layout>
