<x-app-layout>
    <x-slot name="header">
    </x-slot>
        <div class="profile_container">
            <div class="profile_info">
                <div class="cart">

                    {{-- user Image --}}
                    <div class="img">
                            @if(!$user->image)
                                <img src="{{ asset('assets/images/avatar.jpeg') }}" alt="Avatar" class="circle-image rounded-circle">
                            @else
                                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Photo" class="circle-image rounded-circle">
                            @endif
                        </div>

                        {{-- user account details --}}
                    <div class="info">
                        <p class="name">
                            {{$user -> name}}
                            <a href="{{ route('profileEdit.edit', $user->id) }}" class="btn btn-secondary edit_profile">Edit Profile</a>
                        </p>
                        <div class="general_info">
                            <p><span>1 </span>posts</p>
                             <a href="{{ route('profileFollowers.followers', $user -> id) }}" class="btn btn-link text-decoration-none text-dark w-50" data-bs-toggle="modal" data-bs-target="#followersModal">
                                {{ $user->followersCount() }} Followers
                            </a>
                            <a href="{{ route('profileFollowers.followings', $user -> id) }}" class="btn btn-link text-decoration-none text-dark w-50" data-bs-toggle="modal" data-bs-target="#followingsModal">
                                {{ $user->followingCount() }} Followings
                            </a>
                    </div>
                    
                    <p class="nick_name">{{$user -> name}}</p>
                    <p class="desc">
                        {{$user->bio}} 
                        <br>
                        </p>
                            <p class="desc">
                                <a href="{{ $user->website }}" target="_blank" style="text-decoration: none; color: blue;">{{ $user->website }}</a>
                                <br>
                                <br>
                            </p>

                    <!-- Followers Modal -->
                    <div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 400px; width: 100%;">
                            <div class="modal-content" style="height: 400px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="followersModalLabel">Followers</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
             
                                <form id="searchFormFollowers"  method="GET">
                                <div class="search-container">
                                    <input type="text" id="queryFollowers" name="queryFollowers" class="form-control search-input" placeholder="Search">
                                </div>
                                </form>

                                    <ul id="followersList">
                                        @foreach($user->followers as $follower)
                                        <li class="follower-container">
                                            <span>{{ $follower->name }}</span>
                                                @if(auth()->user()->isFollowing($follower))
                                                    <form action="{{ route('unfollow', $follower->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('follow', $follower->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Follow</button>
                                                    </form>
                                                @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                <p id="noResultsMessageFollowers" class="text-center" style="display: none;">No results found.</p>
                            </div>
                        </div>
                    </div>   

                </div>
                    {{-- #endOfModal --}}


           {{-- Followings modal --}}
           <div class="modal fade" id="followingsModal" tabindex="-1" aria-labelledby="followingsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 400px; width: 100%;">
                            <div class="modal-content" style="height: 400px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="followingsModalLabel">Followings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">

                                    <form id="searchFormFollowings"  method="GET">
                                        <div class="search-container">
                                            <input type="text" id="queryFollowings" name="queryFollowings" class="form-control search-input" placeholder="Search">
                                        </div>
                                        </form>

                                    <ul class="followingsList">
                                        @foreach($user->following as $followedUser)
                                        <li class="following-container ">
                                            <span>{{ $followedUser->name }}</span>
                                            @if(auth()->user()->isFollowing($followedUser))
                                            <form action="{{ route('unfollow', $followedUser->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Unfollow</button>
                                            </form>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    <p id="noResultsMessageFollowings" class="text-center" style="display: none;">No results found.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- #endOfModal --}}
             
                </div>
            </div>

            {{-- Stories region --}}
            <div class="highlights">
                <div class="highlight">
                    <div class="img">
                        <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image" class="highlighted-image rounded-circle">
                    </div>
                    <p>conseils</p>
                </div>
                <div class="highlight highlight_add">
                    <div class="img">
                        <img src="{{ asset('assets/images/plus.png') }}" class="highlighted-image" alt="">
                    </div>
                    <p>New</p>
                </div>
            </div>
            <hr>

            {{-- Posts - Saved - Reels Region  --}}
            <div class="posts_profile">
                <ul class="nav-pills w-100 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item mx-2" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <img src="{{ asset('assets/images/feed.png') }}" alt="posts">
                            POSTS
                        </button>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <img src="{{ asset('assets/images/save-instagram.png') }}" alt="saved posts">
                        SAVED
                      </button>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <img src="{{ asset('assets/images/tagged.png') }}" alt="tagged posts">
                        TAGGED
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div id="posts_sec" class="post">
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/Jqh3rHv/img1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/2ZxBFVp/img2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/5vQt677/img3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/pJ8thst/account13.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/j8L7FPY/account10.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div id="saved_sec" class="post">
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/6WvdZS9/account12.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/pJ8thst/account13.jpg" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div id="tagged" class="post">
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/Zhc5hHp/account4.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/SPTNbJL/account5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        


    <script>

   /* to filter the followers according to the search input */
    function filterFollowers() {
        var query = document.getElementById('queryFollowers').value.toLowerCase();
        var followers = document.querySelectorAll('#followersList .follower-container');
        var noResultsMessageFollowers = document.getElementById('noResultsMessageFollowers');
        var foundResults = false;

        followers.forEach(function(follower) {
            var name = follower.querySelector('span').textContent.toLowerCase();
            if (name.startsWith(query)) {
                follower.style.display = 'flex';
                foundResults = true;
            } else {
                follower.style.display = 'none';
            }
        });

        if (!foundResults) {
            noResultsMessageFollowers.style.display = 'flex';
        } else {
            noResultsMessageFollowers.style.display = 'none';
        }
    }

    /* to filter the followings according to the search input */
    function filterFollowings() {
        var query = document.getElementById('queryFollowings').value.toLowerCase();
        var followings = document.querySelectorAll('.followingsList .following-container');
        var noResultsMessageFollowings = document.getElementById('noResultsMessageFollowings');
        var foundResults = false;

        followings.forEach(function(following) {
            var name = following.querySelector('span').textContent.toLowerCase();
            if (name.startsWith(query)) {
                following.style.display = 'flex';
                foundResults = true;
            } else {
                following.style.display = 'none';
            }
        });

        if (!foundResults) {
            noResultsMessageFollowings.style.display = 'flex';
        } else {
            noResultsMessageFollowings.style.display = 'none';
        }
    }

    document.getElementById('searchFormFollowers').addEventListener('submit', function(event) {
        event.preventDefault();
    });

    document.getElementById('searchFormFollowings').addEventListener('submit', function(event) {
        event.preventDefault();
    });

    document.getElementById('queryFollowers').addEventListener('input', function() {
        filterFollowers();
    });

    document.getElementById('queryFollowings').addEventListener('input', function() {
        filterFollowings();
    });
    </script>

</x-app-layout>