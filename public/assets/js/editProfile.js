// on clicking on gender
// function showGendermodal() {
//     // var myModal = new bootstrap.Modal(document.getElementById("genderModal"), {
//     //     keyboard: false,
//     // });
//     // myModal.show();
// console.log("hi");
//     var myModal = document.getElementById("genderModal")
//     myModal.style.display = "block";
//     var modal = document.getElementById('genderModal');
//     modal.classList.remove('hidden');
// }

// Show Remove And Update Photo Modal
$(document).ready(function () {
    $("#profileImage").on("click", function () {
        $("#photoModal").modal("show");
    });
});


// function saveGender(genderModal) {
//     var selectedGender = document.querySelector('input[name="gender"]:checked').value;
//     document.getElementById("genderButton").value = selectedGender;

//     var myModal = document.getElementById("genderModal")
//     myModal.style.display = "none";
//     var modal = document.getElementById('genderModal');
//     modal.classList.add('hidden');
//     // console.log(genderModal)
//     // genderModal.toggle();
// }

function showGendermodal() {
    var modal = document.getElementById('genderModal');
    modal.classList.remove('hidden');
}

function hideGenderModal() {
    var modal = document.getElementById('genderModal');
    modal.classList.add('hidden');
}

function saveGender() {
    var selectedGender = document.querySelector('input[name="gender"]:checked').value;
    document.getElementById("genderButton").value = selectedGender;

    hideGenderModal();
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
