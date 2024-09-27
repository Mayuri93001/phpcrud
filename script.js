document.getElementById("userForm").addEventListener("submit", function(event) {
    if (!this.checkValidity()) {
        event.preventDefault(); // Prevent form submission
        alert("Please fill in all required fields."); // Custom message
    }
});
