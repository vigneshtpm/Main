$(document).ready(function() {
    $("#header").load("header.html");

    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("confirmPassword");
    var passwordError = document.getElementById("passwordError");
    var confirmMessage = document.getElementById("confirmMessage");

    passwordInput.addEventListener("input", function() {
        var password = passwordInput.value;
        validatePassword(password);
    });

    confirmPasswordInput.addEventListener("input", function() {
        var password = passwordInput.value;
        var confirmPassword = confirmPasswordInput.value;
        validatePasswordMatch(password, confirmPassword);
    });

    function validatePassword(password) {
        var complexityRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (password.length < 8) {
            passwordError.innerHTML = "Password must be at least 8 characters long";
        } else if (!complexityRegex.test(password)) {
            passwordError.innerHTML = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)";
        } else {
            passwordError.innerHTML = "";
        }
    }

    function validatePasswordMatch(password, confirmPassword) {
        if (password !== confirmPassword) {
            confirmMessage.innerHTML = "Passwords do not match";
        } else {
            confirmMessage.innerHTML = "";
        }
    }
});
$(document).ready(function() {
    $('#applicant-name').on('input', function() {
        var inputVal = $(this).val();
        // Remove numbers and convert to uppercase
        var filteredVal = inputVal.replace(/[0-9]/g, '').toUpperCase();
        // Update the input field with the filtered uppercase value
        $(this).val(filteredVal);
    });
    
    $('#mobile-no').on('input', function() {
        // Filter non-numeric characters from input value
        var filteredValue = $(this).val().replace(/\D/g, '');
        // Update input field with filtered value
        $(this).val(filteredValue);
    });

    $('#email-id').on('input', function() {
        var lowercaseValue = $(this).val().toLowerCase();
        $(this).val(lowercaseValue);
    });
});
$(document).ready(function() {
    // Handle form submission
    $("#register").on('submit', function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            type: "POST",
            url: "php/register.php", // Replace with your server-side script URL
            data: formData,
            success: function(response) {
                console.log(response); // Log the response to inspect in the browser console
                response = JSON.parse(response); // Parse the JSON response
                if (response.success) {
                    // Show SweetAlert success message
                    Swal.fire({
                        title: 'Registration Successful!',
                        text: 'You have been successfully registered.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to login page
                            window.location.href = 'login.html';
                        }
                    });
                } else {
                        // Show SweetAlert error message with the provided message
                        Swal.fire({
                        title: 'Registration Failed',
                        text: response.message || 'An error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                // Show SweetAlert error message on request failure
                Swal.fire({
                    title: 'An error occurred!',
                    text: 'Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});