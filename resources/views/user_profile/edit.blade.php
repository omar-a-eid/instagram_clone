<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container mt-5">
        <h1>Edit Profile</h1>
    </div>
    <div class="container ps-5 mt-5 d-flex justify-content-between">
        <div class="row ml-5">
            <div class="col-4">
                <div class="col-12">
                    <img src="{{ asset('assets/images/newSunset.jpg') }}" alt="Example Image" class="circle-image rounded-circle">
                </div>
            </div>
            <div class="col-8 mt-3 mb-5 pb-5">
                <div>{{ $user->name }}</div>
                <a href="#">Change Profile Photo</a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('profileUpdate.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="website">Website</label>
            <input class="ml-5 mb-3 rounded h-50 w-50" type="text" name="website" id="website" placeholder="Website" value="{{ $user->website }}">
            <p class="mb-3">Editing your links is only available on mobile. Visit the Instagram app and edit your profile to change the websites in your bio.</p>

            <div class="d-flex">
                <label for="Bio">Bio</label>
                <textarea class="ml-5 mb-3 rounded w-50" name="bio" id="Bio">{{ $user->bio }}</textarea>
            </div>
            <div>
                <label for="gender">Gender</label>
                <input class="ml-5 mb-3 rounded w-50" type="text" name="gender" id="genderButton" readonly onclick="showGenderModal()" placeholder="Select Gender" value="{{ $user->gender }}">
                <p class="ml-5 pl-5">This won’t be part of your public profile.</p>
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
                        <div class="m-3">
                            <button type="button" class="btn btn-primary w-100" onclick="saveGender()">Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-5">Update</button>
        </form>
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
