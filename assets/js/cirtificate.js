$(document).ready(function() {
    // Function to preview file
    function previewFile(input, previewElement) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileExtension = input.files[0].name.split('.').pop().toLowerCase();
                var fileName = input.files[0].name;
                var fileInfo = "<div class='file-info'>" + fileName + "</div>";
                if (fileExtension === 'pdf') {
                    $(previewElement).html(fileInfo + "<iframe src='" + e.target.result + "' style='width:100%;height:300px;' frameborder='0'></iframe>");
                } else {
                    $(previewElement).html(fileInfo + "<img src='" + e.target.result + "' alt='File Preview' style='max-width:100%;max-height:300px;'>");
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview file on change event
    $('#photoFile').change(function() {
        $('#photoViewButton').show();
        $('#photoFileError').text('');
    });

    $('#photoViewButton').click(function() {
            previewFile(document.getElementById('photoFile'), '#photoPreview');
            $('#photoPreview').toggle();
        });

    $('#signatureFile').change(function() {
        $('#signatureViewButton').show();
        $('#signatureFileError').text('');
    });

    $('#signatureViewButton').click(function() {
            previewFile(document.getElementById('signatureFile'), '#signaturePreview');
            $('#signaturePreview').toggle();
        });// Parent Signature File
    $('#parentSignatureFile').change(function() {
        $('#parentSignatureViewButton').show();
        $('#parentSignatureFileError').text('');
    });

    $('#parentSignatureViewButton').click(function() {
         previewFile(document.getElementById('parentSignatureFile'), '#parentSignaturePreview');
        $('#parentSignaturePreview').toggle();
    });

    // Community Certificate File
    $('#communityCertificateFile').change(function() {
      $('#communityCertificateViewButton').show();
      $('#communityCertificateFileError').text('');
    });

    $('#communityCertificateViewButton').click(function() {
         previewFile(document.getElementById('communityCertificateFile'), '#communityCertificatePreview');
        $('#communityCertificatePreview').toggle();
    });

    // Income Certificate File
    $('#incomeCertificateFile').change(function() {
         $('#incomeCertificateViewButton').show();
         $('#incomeCertificateFileError').text('');
    });

    $('#incomeCertificateViewButton').click(function() {
          previewFile(document.getElementById('incomeCertificateFile'), '#incomeCertificatePreview');
         $('#incomeCertificatePreview').toggle();
    });

    // Aadhaar Card File
    $('#aadhaarCardFile').change(function() {
      $('#aadhaarCardViewButton').show();
      $('#aadhaarCardFileError').text('');
    });

    $('#aadhaarCardViewButton').click(function() {
        previewFile(document.getElementById('aadhaarCardFile'), '#aadhaarCardPreview');
        $('#aadhaarCardPreview').toggle();
    });

    $('#10marksheetFile').change(function() {
      $('#10marksheetViewButton').show();
      $('#10marksheetFileError').text('');
    });

    $('#10marksheetViewButton').click(function() {
        previewFile(document.getElementById('10marksheetFile'), '#10marksheetPreview');
        $('#10marksheetPreview').toggle();
    });

    $('#12marksheetFile').change(function() {
      $('#12marksheetViewButton').show();
      $('#12marksheetFileError').text('');
    });

    $('#12marksheetViewButton').click(function() {
        previewFile(document.getElementById('12marksheetFile'), '#12marksheetPreview');
        $('#12marksheetPreview').toggle();
    });

    $('#ugmarksheetFile').change(function() {
      $('#ugmarksheetViewButton').show();
      $('#ugmarksheetFileError').text('');
    });

    $('#ugmarksheetViewButton').click(function() {
        previewFile(document.getElementById('ugmarksheetFile'), '#ugmarksheetPreview');
        $('#ugmarksheetPreview').toggle();
    });

    // Ex-Servicemen File
    $('#exServicemenFile').change(function() {
         $('#exServicemenViewButton').show();
         $('#exServicemenFileError').text('');
    });

    $('#exServicemenViewButton').click(function() {
         previewFile(document.getElementById('exServicemenFile'), '#exServicemenPreview');
         $('#exServicemenPreview').toggle();
    });

    // Differently Abled File
    $('#differentlyAbledFile').change(function() {
         $('#differentlyAbledViewButton').show();
         $('#differentlyAbledFileError').text('');
    });

    $('#differentlyAbledViewButton').click(function() {
          previewFile(document.getElementById('differentlyAbledFile'), '#differentlyAbledPreview');
          $('#differentlyAbledPreview').toggle();
    });
/*
    // Percentage of Disability File
    $('#percentageOfDisabilityFile').change(function() {
         $('#percentageOfDisabilityViewButton').show();
         $('#percentageOfDisabilityFileError').text('');
    });

    $('#percentageOfDisabilityViewButton').click(function() {
        previewFile(document.getElementById('percentageOfDisabilityFile'), '#percentageOfDisabilityPreview');
        $('#percentageOfDisabilityPreview').toggle();
    });
    */
    // Sports Quota File
    $('#sportsQuotaFile').change(function() {
        $('#sportsQuotaViewButton').show();
        $('#sportsQuotaFileError').text('');
    });

    $('#sportsQuotaViewButton').click(function() {
        previewFile(document.getElementById('sportsQuotaFile'), '#sportsQuotaPreview');
        $('#sportsQuotaPreview').toggle();
    });
    
    // Others File
        $('#othersFile').change(function() {
        $('#othersViewButton').show();
    });

    $('#othersViewButton').click(function() {
        previewFile(document.getElementById('othersFile'), '#othersPreview');
        $('#othersPreview').toggle();
    });
/*
    // Others (if there are more) File
    $('#others2File').change(function() {
        $('#others2ViewButton').show();
    });

    $('#others2ViewButton').click(function() {
        previewFile(document.getElementById('others2File'), '#others2Preview');
        $('#others2Preview').toggle();
    });
    */


    // Form submission
   // Form submission
// Form submission
// Form submission
$('#uploadForm').submit(function(event) {
    event.preventDefault();

    $.ajax({
        url: 'php/cirtificate_upload.php',
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
            console.log('Server Response:', response); // Log the response
            $('.error-message').text(''); // Clear all previous error messages

            let allUploaded = true;

            $.each(response, function(key, value) {
                if (value !== 'uploaded successfully and database updated') {
                    $('#' + key + 'Error').text(value);
                    allUploaded = false;
                } else {
                    $('#' + key + 'Error').text(''); // Clear specific error message if uploaded successfully
                }
            });
            if (allUploaded) {
                Swal.fire({
                  toast: true,
                  position: 'top-end',
                  title: 'Cirtificate Uploaded',
                  text: 'You have been successfully Uploaded.',
                  icon: 'success',
                  timer: 2000, // Automatically close after 3 seconds
                  showConfirmButton: false, // Remove the confirm button
                  timerProgressBar: true, 
                }).then(() => {
                  window.location.href = 'preview.html';
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
            // Handle error
            console.error('AJAX Error:', textStatus, errorThrown);
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'AJAX request failed',
                text: 'Please try again later.',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });

    return false;
});
});
$(document).ready(function(){
    $("#header").load("header.html");
    $("#navigation").load("navigation.html")
});
