<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
            <div class="max-w-7xl mt-4 mx-5 py-6 px-5 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-gray-800 leading-tight">
                    Edit Profile
                </h2>
            </div>
        </div>
          <div class="container mt-8">
        <div class="flex justify-between">
            <div class="flex items-center">
                <div class="w-20 h-20 mr-4">
                    @if($user->image)
                        <img id="profileImage" width="200px" src="{{ Storage::disk('public')->url($user->image) }}" alt="Profile Photo" class="highlighted-image rounded-full">
                    @else
                        <img id="profileImage" src="{{ asset('assets/images/newSunset.jpg') }}" alt="Profile Photo" class="highlighted-image rounded-full">
                    @endif
                </div>
                <div>
                    <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
                    <label for="profilePhotoInput" class="text-blue-500 cursor-pointer">Change Profile Photo</label>
                    <input id="profilePhotoInput" name="image" type="file" accept="image/*" class="hidden">
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-8">
        <form action="{{ route('profileUpdate.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" name="website" id="website" placeholder="Website" value="{{ $user->website }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full">
                <p class="text-sm text-gray-500 mt-1">Editing your links is only available on mobile. Visit the Instagram app and edit your profile to change the websites in your bio.</p>
            </div>

            <div class="mb-6">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio" class="mt-1 p-2 rounded-md border border-gray-300 w-full" rows="3">{{ $user->bio }}</textarea>
            </div>

            <div class="mb-6">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <input type="text" name="gender" id="genderButton" readonly onclick="showGenderModal()" placeholder="Select Gender" value="{{ $user->gender }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full">
                <p class="text-sm text-gray-500 mt-1">This won’t be part of your public profile.</p>
            </div>

            <div class="form-group">
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="modal fade" id="genderModal" tabindex="-1" aria-labelledby="genderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="genderModalLabel">Gender</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary w-full" onclick="saveGender()">Done</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showGenderModal() {
            var myModal = new bootstrap.Modal(document.getElementById('genderModal'), {
                keyboard: false
            });
            myModal.show();
        }
        
        function saveGender() {
            var selectedGender = document.querySelector('input[name="gender"]:checked').value;
            document.getElementById('genderButton').value = selectedGender;
            $('#genderModal').modal('hide');
        }
    </script>
</x-app-layout>
