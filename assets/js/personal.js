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
                $('#dob').val(response.data.dob);
                $('#guardian-name').val(response.data.guardian);
                $('#father-occupation').val(response.data.father_occupation);
                $('#mother-occupation').val(response.data.mother_occupation);
                $('#mother-tongue').val(response.data.mother_tongue);
                $('#nationality').val(response.data.nationality);
                $('#religion').val(response.data.religion);
                $('#community').val(response.data.community);
                $('#aadhar').val(response.data.aadhar);
                $('#abc').val(response.data.abc);
                $('#telephone').val(response.data.telephone);
                $('#communication-address-1').val(response.data.communication_address_1);
                $('#communication-address-2').val(response.data.communication_address_2);
                $('#communication-address-3').val(response.data.communication_address_3);
                $('#Communication-country').val(response.data.Communication_country);
                $('#Communication-state').val(response.data.Communication_state);
                $('#communication-district').val(response.data.communication_district);
                $('#communication-pincode').val(response.data.communication_pincode);
                $('#permanent-address-1').val(response.data.permanent_address_1);
                $('#permanent-address-2').val(response.data.permanent_address_2);
                $('#permanent-address-3').val(response.data.permanent_address_3);
                $('#same-as-communication-address').prop('checked', response.data.same_as_communication_address);
                $('#permanent-country').val(response.data.permanent_country);
                $('#permanent-state').val(response.data.permanent_state);
                $('#permanent-district').val(response.data.permanent_district);
                $('#permanent-pincode').val(response.data.permanent_pincode);
                $('#ex_servicemen').val(response.data.ex_servicemen);
                $('#differently-abled').val(response.data.differently_abled);
                $('#percentage-disability').val(response.data.percentage_disability);
                $('#sportsquota').val(response.data.sportsquota);
                $('#others').val(response.data.others );

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
                          timerProgressBar: true, 
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
                          timerProgressBar: true, // Enable timer progress bar
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
      
        $('#permanent-state').prop('disabled', false);
        $('#permanent-district').prop('disabled', false);
        $('#Communication-state').prop('disabled', false);
        $('#communication-district').prop('disabled', false);
    } else {
       
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
    
    
    $('#Communication-state').change(function() {
    if ($(this).val() === 'Tamil Nadu') {
       
        $('#communication-district').prop('disabled', false);
    } else {
        $('#communication-district').prop('disabled', true);
    }
    });
});

$(document).ready(function() {
    $('#father-name,#mother-name,#mother-occupation,#father-occupation,#guardian-name,#Communication-country,#permanent-country').on('input', function() {
        var inputVal = $(this).val();
        // Remove numbers and convert to uppercase
        var filteredVal = inputVal.replace(/[0-9]/g, '');
        // Update the input field with the filtered uppercase value
        $(this).val(filteredVal);
    });
    
    $('#aadhar,#abc,#telephone,#communication-pincode,#permanent-pincode').on('input', function() {
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
    // Get today's date
    var today = new Date();
    var day = ("0" + today.getDate()).slice(-2);
    var month = ("0" + (today.getMonth() + 1)).slice(-2);
    var todayDate = today.getFullYear() + '-' + month + '-' + day;

    // Set the max attribute of the date input to today
    $("#dob").attr("max", todayDate);
});