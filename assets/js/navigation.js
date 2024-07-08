document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    Swal.fire({
       
        title: 'Are you sure?',
        text: "Do you really want to logout?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'No, stay'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'login.html'; // Redirect to the login page
        }
    });
});