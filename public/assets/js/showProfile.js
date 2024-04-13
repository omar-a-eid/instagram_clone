/* to filter the followers according to the search input */
function filterFollowers() {
    var query = document.getElementById("queryFollowers").value.toLowerCase();
    var followers = document.querySelectorAll(
        "#followersList .follower-container"
    );
    var noResultsMessageFollowers = document.getElementById(
        "noResultsMessageFollowers"
    );
    var foundResults = false;

    followers.forEach(function (follower) {
        var name = follower.querySelector("span").textContent.toLowerCase();
        if (name.startsWith(query)) {
            follower.style.display = "flex";
            foundResults = true;
        } else {
            follower.style.display = "none";
        }
    });

    if (!foundResults) {
        noResultsMessageFollowers.style.display = "flex";
    } else {
        noResultsMessageFollowers.style.display = "none";
    }
}

/* to filter the followings according to the search input  */
function filterFollowings() {
    var query = document.getElementById("queryFollowings").value.toLowerCase();
    var followings = document.querySelectorAll(
        ".followingsList .following-container"
    );
    var noResultsMessageFollowings = document.getElementById(
        "noResultsMessageFollowings"
    );
    var foundResults = false;

    followings.forEach(function (following) {
        var name = following.querySelector("span").textContent.toLowerCase();
        if (name.startsWith(query)) {
            following.style.display = "flex";
            foundResults = true;
        } else {
            following.style.display = "none";
        }
    });

    if (!foundResults) {
        noResultsMessageFollowings.style.display = "flex";
    } else {
        noResultsMessageFollowings.style.display = "none";
    }
}

document
    .getElementById("searchFormFollowers")
    .addEventListener("submit", function (event) {
        event.preventDefault();
    });

document
    .getElementById("searchFormFollowings")
    .addEventListener("submit", function (event) {
        event.preventDefault();
    });

document
    .getElementById("queryFollowers")
    .addEventListener("input", function () {
        filterFollowers();
    });

document
    .getElementById("queryFollowings")
    .addEventListener("input", function () {
        filterFollowings();
    });

// Show Remove And Update Photo Modal
$(document).ready(function () {
    $("#profileImage").on("click", function () {
        $("#photoModal").modal("show");
    });
});


