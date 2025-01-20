<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Register New Employee</h1>
            <form id="employeeForm" method="POST" class="employee-form">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter full name">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter email address">
                
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number" pattern="\d{10}" title="Phone number should be 10 digits">
                
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" placeholder="Enter job position">
                
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" placeholder="Enter department">
                
                <label for="salary">Salary:</label>
                <input type="number" id="salary" name="salary" step="0.01" placeholder="Enter salary">
                
                <div class="button-container">
                    <button class="back-btn" onclick="window.history.back()">Back</button>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>

        </div>
            </form>
        </div>
    </div>

    <div id="successMessage" class="success-message" style="display:none;">
        Employee Registered Successfully!
    </div>

    <script>
    // AJAX form submission
    $('#employeeForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
            url: 'employee_process.php', // PHP script to handle form submission
            type: 'POST',
            data: $(this).serialize(), // Send form data
            success: function(response) {
                console.log(response); 
                try {
                    const result = JSON.parse(response); // Parse JSON response
                    if (result.status === 'success') {
                        // Show success message without page reload
                        $('#successMessage').fadeIn().delay(3000).fadeOut(1000);

                        // Optionally redirect to another page after success message
                        window.location.href = 'index.php'; // Redirect to index page
                    } else {
                        alert(result.message || 'Error occurred!');
                    }
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                    alert('An unexpected error occurred. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred while submitting the form. Please try again.');
            }
        });
    });
</script>


</body>
</html>
