// 1. Select the form using its class name
const contactForm = document.querySelector('.contact-form');

// 2. Listen for the 'submit' event (not 'click')
contactForm.addEventListener('submit', function (event) {
    
    // 3. HTML "required" attributes
    if (!contactForm.checkValidity()) {
        // If the form is NOT valid, do nothing and let the browser show its errors
        return; 
    }

    // 4.the form is valid
    alert("Thank you for your message! We will get back to you soon.");
    
});