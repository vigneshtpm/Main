$(document).ready(function() {
    $("#header").load("header.html");
});

$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: formData,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        toast:true,
                        position: 'top-end',
                        title: 'Login Successful!',
                        text: 'You have been successfully Login.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                       window.location.href = 'Personal.html';
                            
                    });
                    
                   
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred. Please try again.',
                });
            }
        });
    });
});