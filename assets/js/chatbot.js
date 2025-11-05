// assets/js/chatbot.js

// Chat functionality
document.addEventListener('DOMContentLoaded', function() {
    const chatFloatIcon = document.getElementById('chatFloatIcon');
    
    // Toggle Tawk.to chat when clicking the floating icon
    if (chatFloatIcon) {
        chatFloatIcon.addEventListener('click', function() {
            // Trigger Tawk.to chat
            if (typeof Tawk_API !== 'undefined' && Tawk_API.toggle) {
                Tawk_API.toggle();
            }
        });
    }
    
    // Form validation for all forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let valid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            } else {
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...';
                submitBtn.disabled = true;
                
                // Re-enable after 5 seconds if still on page
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    });
});

// Tawk.to Integration - YOUR ACTUAL CODE
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/690b4a5f0832d91957879148/1j9a1l29h';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();