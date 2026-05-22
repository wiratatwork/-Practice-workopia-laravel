console.log('Static JS loaded from public/js/script.js');

document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('#hamburger');
    const mobileMenu = document.querySelector('#mobile-menu');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Handle form submission loading state
    document.addEventListener('submit', function(e) {
        const form = e.target;
        const submitButton = form.querySelector('.btn-submit');
        
        if (submitButton) {
            // Disable button to prevent double submission
            submitButton.disabled = true;
            
            // Change content to loader
            submitButton.innerHTML = `
                <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg> 
                Processing...
            `;
        }
    });
});

    }

    // Handle form submission loading state
    document.addEventListener('submit', function(e) {
        const submitButton = e.target.querySelector('.btn-submit');
        if (submitButton) {
            submitButton.disabled = true;
            const originalContent = submitButton.innerHTML;
            submitButton.innerHTML = `
                <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg> 
                Processing...
            `;
        }
    });
});
