function validateForm() {
    // Validate Name
    const name = document.getElementById('name').value;
    if (name === "") {
        alert("Name is required.");
        return false;
    }
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert("Name should only contain letters and spaces.");
        return false;
    }

    // Validate Password
    const password = document.getElementById('password').value;
    if (password === "") {
        alert("Password is required.");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // Validate Phone Number
    const phone = document.getElementById('phone').value;
    if (phone === "") {
        alert("Phone number is required.");
        return false;
    }
    const phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phone)) {
        alert("Phone number must be 10 digits.");
        return false;
    }

    // Validate Email
    const email = document.getElementById('email').value;
    if (email === "") {
        alert("Email is required.");
        return false;
    }
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate Address
    const address = document.getElementById('address').value;
    if (address === "") {
        alert("Address is required.");
        return false;
    }

    // If all validations passed, return true to submit the form
    alert("Form submitted successfully!");
    return true;
}
