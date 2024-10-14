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

function validateForm() {
    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(function(element) {
        element.innerText = '';
        element.style.display = 'none';
    });

    let valid = true;

    // Check First Name
    const firstName = document.userForm.first_name.value.trim();
    if (!firstName) {
        document.getElementById('first_name_error').innerText = 'Please enter your first name.';
        document.getElementById('first_name_error').style.display = 'block';
        valid = false;
    }

    // Check Last Name
    const lastName = document.userForm.last_name.value.trim();
    if (!lastName) {
        document.getElementById('last_name_error').innerText = 'Please enter your last name.';
        document.getElementById('last_name_error').style.display = 'block';
        valid = false;
    }

    // Check Email
    const email = document.userForm.email.value.trim();
    if (!email) {
        document.getElementById('email_error').innerText = 'Please enter your email.';
        document.getElementById('email_error').style.display = 'block';
        valid = false;
    }

    // Check Password
    const password = document.userForm.password.value.trim();
    if (!password) {
        document.getElementById('password_error').innerText = 'Please enter your password.';
        document.getElementById('password_error').style.display = 'block';
        valid = false;
    }

    // Check Address
    const address = document.userForm.address.value.trim();
    if (!address) {
        document.getElementById('address_error').innerText = 'Please enter your address.';
        document.getElementById('address_error').style.display = 'block';
        valid = false;
    }

    return valid; // If all fields are valid, the form will be submitted
}



document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    // Clear previous error messages
    document.getElementById('first_name_error').textContent = '';

    const firstName = document.querySelector('input[name="first_name"]').value;

    // Basic validation example
    if (!firstName) {
        document.getElementById('first_name_error').textContent = 'First name is required.';
        return; // Stop further processing
    }

    // Continue with form submission or AJAX request
    const formData = new FormData(this);

    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerHTML = data; // Display the response
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


