<x-app-layout>
    <div class="m-10">
        <x-slot name="header">
        </x-slot>
        <div>
            <div class="container-fluid mt-5 ml-5 mb-5">
                <h1 class="font-semibold text-gray-800" style="font-size: 2rem;">Edit Profile</h1>
            </div>
        </div>

        <!-- Modal For Removing And Updating Photo -->
        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabel">Change Profile Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center px-0" style="height: 15vh;">
                        <form id="updatePhotoForm" action="{{ route('profileEdit.edit', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="profilePhotoInput" class="text-primary cursor-pointer">Upload Photo</label>
                                <input id="profilePhotoInput" name="image" type="file" accept="image/*"
                                    style="display: none;"
                                    onchange="document.getElementById('updatePhotoForm').submit();">
                            </div>
                        </form>
                        @if ($user->image)
                            <hr class="w-100 mb-3">
                            <form id="removePhotoForm" action="{{ route('editPhoto.destroy', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="remove_photo" value="true">
                                <label for="removePhotoCheckbox" class="text-danger cursor-pointer"
                                    onclick="document.getElementById('removePhotoForm').submit();">Remove Profile
                                    Photo</label>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- End of Modal --}}


        {{-- Form for updating user info  --}}
        <div class="form container mt-4 mr-5">
            <form action="{{ route('profileUpdate.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex mb-5 items-center">
                    <div class="flex items-center">
                        <div class="w-20 h-20 mr-5">
                            @if ($user->image)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" class=" w-7 h-7 shrink-0 x" style="border-radius: 50%;width: 100%;
                                height: 100%;" />


                            @else
                                <img id="profileImage" src="{{ asset('assets/images/avatar.jpeg') }}"
                                    alt="Profile Photo" class="highlighted-image rounded-full">
                            @endif
                        </div>
                    </div>

                    {{-- Change Profile Photo Link --}}
                    <div>
                        <h1 class="text-2xl font-semibold ml-5">{{ $user->name }}</h1>
                        <label for="profilePhotoInput" class="text-blue-500 cursor-pointer  ml-5">Change Profile
                            Photo</label>
                        <input id="profilePhotoInput" name="image" type="file" accept="image/*"
                            style="display: none;" onchange="displaySelectedPhoto()">
                    </div>
                </div>


                {{-- Website Region --}}
                <div class="mb-6">
                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                    <input type="text" name="website" id="website" placeholder="Website"
                        value="{{ $user->website }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full">
                    <p class="text-sm text-gray-500 mt-1">Editing your links is only available on mobile. Visit the
                        Instagram app and edit your profile to change the websites in your bio.</p>
                </div>

                {{-- Bio Region --}}
                <div class="mb-6">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea name="bio" id="bio" class="mt-1 p-2 rounded-md border border-gray-300 w-full" rows="3">{{ $user->bio }}</textarea>
                </div>

                {{-- Gender Region --}}
                <div class="mb-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <input type="text" name="gender" id="genderButton" readonly onclick="showGendermodal()"
                        placeholder="Select Gender" value="{{ $user->gender }}"
                        class="mt-1 p-2 rounded-md border border-gray-300 w-full">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        {{-- Gender Modal --}}
     

        {{-- <dialog class="modal hidden" id="genderModal">
            <div class="modal-box">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="genderModalLabel">Gender</h5>
                        <button type="button" class="btn-close" aria-label="Close" onclick="hideGenderModal()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input colored-background" type="radio" name="gender" id="female" value="Female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input colored-background" type="radio" name="gender" id="male" value="Male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="test" class="btn btn-primary w-full" onclick="saveGender()">Done</button>
                    </div>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog> --}}
        
        <div id="genderModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="modal-content py-4 text-left px-6">
        
                        <!--Title-->
                        <div class="modal-header flex justify-between items-center pb-3">
                            <h5 class="text-2xl font-bold" id="genderModalLabel">Gender</h5>
                            <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" aria-label="Close" onclick="hideGenderModal()">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z"/>
                                </svg>
                            </button>
                        </div>
        
                        <!--Body-->
                        <div class="modal-body">
                            <div class="form-check">
                                <input class="form-check-input colored-background" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input colored-background" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                        </div>
        
                        <!--Footer-->
                        <div class="modal-footer mt-4">
                            <button type="button" id="test" class="btn btn-primary w-full" onclick="saveGender()">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script src="{{ asset('assets/js/editProfile.js') }}" defer></script>
    </div>
</x-app-layout>
