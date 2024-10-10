// Function to switch to Sign In view
function switchToSignIn() {
    document.getElementById("id").style.display = "none"; // Hide ID field
    document.getElementById("title").innerHTML = "Sign In"; // Change title
    document.getElementById("SignupBtn").classList.add("disable"); // Disable signup button
    document.getElementById("SigninBtn").classList.remove("disable"); // Enable sign-in button
}

// Function to switch to Sign Up view
function switchToSignUp() {
    document.getElementById("id").style.display = "block"; // Show ID field
    document.getElementById("title").innerHTML = "Sign Up"; // Change title
    document.getElementById("SignupBtn").classList.remove("disable"); // Enable signup button
    document.getElementById("SigninBtn").classList.add("disable"); // Disable sign-in button
}

// Event listeners for button clicks
document.getElementById("SigninBtn").addEventListener("click", switchToSignIn);
document.getElementById("SignupBtn").addEventListener("click", switchToSignUp);

// Form validation function
function validateForm() {
    const inputs = document.querySelectorAll('input[required]');
    let valid = true;

    inputs.forEach(input => {
        if (!input.value) {
            valid = false;
            input.classList.add('error'); // Add error class if input is invalid
        } else {
            input.classList.remove('error'); // Remove error class if input is valid
        }
    });

    if (!valid) {
        alert("Please fill out all required fields."); // Alert user
    }

    return valid; // Return the validity of the form
}

// Hook the validation function to the form submission
document.querySelector('form[name="userForm"]').onsubmit = validateForm;



