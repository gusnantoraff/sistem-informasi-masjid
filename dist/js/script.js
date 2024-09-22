document.addEventListener('DOMContentLoaded', function () {
    const profilePic = document.querySelector('.profile-pic');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle dropdown visibility when clicking the profile picture or icon
    profilePic.addEventListener('click', function () {
        dropdownMenu.classList.toggle('show'); // Toggle 'show' class
    });

    // Close the dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!profilePic.contains(event.target)) {
            dropdownMenu.classList.remove('show'); // Hide dropdown if clicked outside
        }
    });
});
