<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container mt-5 d-flex align-items-center justify-content-center">
        <div>
            <div class="col-12">
                <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image" class="circle-image rounded-circle">
            </div>
        </div>

        <div class="ml-5">
            <div class="row ">
                <div class="col-3">
                    <p>{{$user->name}}</p>
                </div>
                <div class="col-8 ml-5 pl-5 ">
                    <a href="{{ route('profileEdit.edit', $user->id) }}" class="btn btn-secondary">Edit Profile</a>
                </div>
            </div>
            <div class="row mt-2 justify-content-between">
                <div class="col-3 mt-2">
                    <p>36 Posts</p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link text-decoration-none text-dark w-50">{{$user->followersCount()}} Followers</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-link text-decoration-none text-dark w-50">{{$user->followingCount()}} Following </button>
                </div>
            </div>
            <div class="row  mt-2">
                <div class="col-12">   
                      <p> {{$user->bio}}</p>       
                </div>
            </div>
        </div>
    </div>
   
{{-- posts tags saved --}}
<div class="mt-5"> 
    <div class="tableContainer" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#reels" data-toggle="tab" onclick="toggleTab('reels')">Reels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#posts" data-toggle="tab" onclick="toggleTab('posts')">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tags" data-toggle="tab" onclick="toggleTab('tags')">Tags</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="reels">
                        <!-- Reels content goes here -->
        
                    </div>
                    <div class="tab-pane fade" id="posts">
                        <!-- Posts content goes here -->
                
                    </div>
                    <div class="tab-pane fade" id="tags">
                        <!-- Tags content goes here -->
                     
                    </div>
                </div>
            </div>
        </div>
  
    </div>


    {{-- Posts --}}
    <div class="container mt-4 postsContainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex flex-wrap">
                    <div class="col-4 mb-3">
                        <div class="card mb-4">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" class="card-img-top" alt="Post 1 Image">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-4">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" class="card-img-top" alt="Post 2 Image">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-4">
                            <img src="{{ asset('assets/images/newSunset.jpg') }}" class="card-img-top" alt="Post 3 Image">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</x-app-layout>
