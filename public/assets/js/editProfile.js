// on clicking on gender
function showGenderModal() {
    var myModal = new bootstrap.Modal(document.getElementById("genderModal"), {
        keyboard: false,
    });
    myModal.show();
}

// Show Remove And Update Photo Modal
$(document).ready(function () {
    $("#profileImage").on("click", function () {
        $("#photoModal").modal("show");
    });
});

function saveGender() {
    var selectedGender = document.querySelector(
        'input[name="gender"]:checked'
    ).value;
    document.getElementById("genderButton").value = selectedGender;
    $("#genderModal").modal("hide");
}

function displaySelectedPhoto() {
    const fileInput = document.getElementById("profilePhotoInput");
    const profileImage = document.getElementById("profileImage");

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function redirectToEditProfile() {
    window.location.href = "{{ route('profileEdit.edit', $user->id) }}";
}
