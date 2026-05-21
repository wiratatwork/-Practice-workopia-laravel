console.log('Static JS loaded from public/js/script.js');

document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('#hamburger');
    const mobileMenu = document.querySelector('#mobile-menu');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
