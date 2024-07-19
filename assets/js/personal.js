$(document).ready(function() {
    var communicationAddressFields = [
        $('#communication-address-1'),
        $('#communication-address-2'),
        $('#communication-address-3')
    ];
    var permanentAddressFields = [
        $('#permanent-address-1'),
        $('#permanent-address-2'),
        $('#permanent-address-3')
    ];

    function updatePermanentAddress() {
        if ($('#same-as-communication-address').is(':checked')) {
            permanentAddressFields.forEach(function(field, index) {
                field.val(communicationAddressFields[index].val());
                field.prop('disabled', true);
            });
        } else {
            permanentAddressFields.forEach(function(field) {
                field.val('');
                field.prop('disabled', false);
            });
        }
    }

    // Update permanent address fields when the checkbox is clicked
    $('#same-as-communication-address').on('click', function() {
        updatePermanentAddress();
    });

    // Update permanent address fields whenever the communication address fields change
    communicationAddressFields.forEach(function(field) {
        field.on('input', function() {
            updatePermanentAddress();
        });
    });
});


$(document).ready(function(){
    $("#header").load("./header.html");
    $("#navigation").load("navigation.html")
});

$(document).ready(function() {
// Retrieve user data on page load
$.ajax({
    type: 'GET',
    url: 'php/retrieve.php',
    success: function(response) {
        if (response.success) {
            $('#applicant_name').val(response.data.applicant_name).attr('disabled', true);
            $('#email').val(response.data.e_mail).attr('disabled', true);
            $('#mobile').val(response.data.mobile).attr('disabled', true);
            
        } else {
            alert(response.message);
            window.location.href = 'login.html';
        }
    },
    error: function() {
        alert('An error occurred. Please try again.');
    }
});
});
$(document).ready(function() {
    // Retrieve user data on page load
    $.ajax({
        type: 'POST',
        url: 'php/personal_retrieve.php',
        success: function(response) {
            if (response.success) {
                $('#father-name').val(response.data.father_name);
                $('#mother-name').val(response.data.mother_name);
            
                $('#gender').val(response.data.gender);
                $('#guardian-name').val(response.data.guardian);
                $('#father-occupation').val(response.data.father_occupation);
                $('#mother-occupation').val(response.data.mother_occupation);
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('An error occurred. Please try again.');
        }
    });
    });

    $(document).ready(function() {
        $('#personal_info').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
    
            $.ajax({
                type: 'POST',
                url: 'php/personal_update.php',
                data: $(this).serialize(), // Serialize the form data
                dataType: 'json', // Expect a JSON response from the server
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                          toast: true,
                          position: 'top-end',
                          title: 'Personal Information',
                          text: 'You have been successfully submitted.',
                          icon: 'success',
                          timer: 3000, // Automatically close after 3 seconds
                          showConfirmButton: false, // Remove the confirm button
                        }).then(() => {
                          window.location.href = 'education.html';
                        });
                      } else {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: response.message,
                          timer: 5000, // Automatically close after 5 seconds (adjust as needed)
                          showConfirmButton: false, // Remove the confirm button
                        });
                      }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error: ' + textStatus + ': ' + errorThrown); // Log error to console
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
    
$(document).ready(function() {
$('#nationality').change(function() {
    if ($(this).val() === 'INDIA') {
        $('#native-state').prop('disabled', false);
        $('#native-district').prop('disabled', false);
        $('#permanent-state').prop('disabled', false);
        $('#permanent-district').prop('disabled', false);
        $('#Communication-state').prop('disabled', false);
        $('#communication-district').prop('disabled', false);
    } else {
        $('#native-state').prop('disabled', true);
        $('#native-district').prop('disabled', true);
        $('#permanent-state').prop('disabled', true);
        $('#permanent-district').prop('disabled', true);
        $('#Communication-state').prop('disabled', true);
        $('#communication-district').prop('disabled', true);
    }
});

$('#permanent-state').change(function() {
    if ($(this).val() === 'Tamil Nadu') {
       
        $('#permanent-district').prop('disabled', false);
    } else {
        $('#permanent-district').prop('disabled', true);
    }
    });
    
    $('#native-state').change(function() {
    if ($(this).val() === 'Tamil Nadu') {
       
        $('#native-district').prop('disabled', false);
    } else {
        $('#native-district').prop('disabled', true);
    }
    });
    
    $('#Communication-state').change(function() {
    if ($(this).val() === 'Tamil Nadu') {
       
        $('#communication-district').prop('disabled', false);
    } else {
        $('#communication-district').prop('disabled', true);
    }
    });
});