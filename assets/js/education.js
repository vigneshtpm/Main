$(document).ready(function(){
    $("#header").load("header.html");
    $("#navigation").load("navigation.html")
});

$(document).ready(function() {
    // Get current year
    const currentYear = (new Date()).getFullYear();

    // Function to populate year dropdown
    function populateYearDropdown(yearDropdown) {
        // Clear any existing options
        yearDropdown.empty();

        // Populate year dropdown
        yearDropdown.append($('<option>', {
            value: "",
            text: "Select Year"
        }));
        for (let i = currentYear - 10; i <= currentYear; i++) {
            yearDropdown.append($('<option>', {
                value: i,
                text: i
            }));
        }

        
    }

    // Call the function for each set of dropdowns
    $('.dropdown-container').each(function() {
        populateYearDropdown($(this).find('.year'));
    });
});


// Function to generate semester tables based on the selected number of semesters
function generateSemesterTables(numSemesters) {
    var storedData = {}; // Initialize stored data object

    // Clear existing tables
    $('#tables_container').empty();

    // Generate tables for each semester
    for (var i = 1; i <= numSemesters; i++) {
        generateSemesterTable(i, 1, storedData); // Generate table for each semester with default of 1 subject
    }
}

// Function to generate semester table with specified ID and number of subjects
function generateSemesterTable(semesterId, numSubjects, storedData) {
    var tableHTML = `
        <div class="table-responsive">
            <h2>Semester ${semesterId}</h2>
            <div class="form-group">
                <label for="no-of-subjects-sem${semesterId}" style="display: none; margin-right: 10px;">Number of Subjects:</label>
                <select class="select2me form-control form-control no-of-subjects-select" id="no-of-subjects-sem${semesterId}" name="no-of-subjects-sem${semesterId}" data-semester-id="${semesterId}" style="display: none; width:200px;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <table class="table table-bordered" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>Subject / Course Name</th>
                        <th>Category</th>
                        <th>Maximum Marks</th>
                        <th>Obtained Marks</th>
                        <th>Month & Year of Passing</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
    
        </div>
        <br>
    `;

    $('#tables_container').append(tableHTML);

    // Set the selected value for number of subjects if data exists
    if (storedData && storedData[`no_of_subjects_sem${semesterId}`]) {
        $(`#no-of-subjects-sem${semesterId}`).val(storedData[`no_of_subjects_sem${semesterId}`]);
    }

    // Generate rows based on the number of subjects
    generateRows(semesterId, numSubjects, storedData);

    // Event listener for changes in the number of subjects dropdown
    $(`#no-of-subjects-sem${semesterId}`).on('change',function(){
        var numSubjects = parseInt($(this).val());
        var semesterId = $(this).data('semester-id');
        generateRows(semesterId, numSubjects, storedData);
        storeTableData(); // Store the data whenever there's a change
    });
}

// Function to generate rows within a table
function generateRows(semesterId, numSubjects, storedData) {
    var tbody = $(`#no-of-subjects-sem${semesterId}`).closest('div').next('table').find('tbody');
   

    // Generate rows based on the number of subjects
    for (var j = 1; j <= 10; j++) {
        var rowData = storedData[`Row_${semesterId}_${j - 1}`] || {};
        var currentYear = new Date().getFullYear();
        var yearOptions = ''; 
        yearOptions += '<option value="">Select Year</option>';
        for (var year = currentYear; year >= currentYear - 20; year--) {
            yearOptions += `<option value="${year}" ${rowData.year === year ? 'selected' : ''}>${year}</option>`;
        }

        tbody.append(`
            <tr>
                <td><input type="text" class="form-control" name="Sub_${semesterId}_${j}"  id="Sub_${semesterId}_${j}" value="${rowData.subject || ''}" /></td>
                <td>
                    <select class="form-control" id="Cat_${semesterId}_${j}" name="Cat_${semesterId}_${j}">
                        <option value="">Select Category</option>
                        <option value="Part I" ${rowData.category === 'Part I' ? 'selected' : ''}>Part I</option>
                        <option value="Part II" ${rowData.category === 'Part II' ? 'selected' : ''}>Part II</option>
                        <option value="Part III" ${rowData.category === 'Part III' ? 'selected' : ''}>Part III</option>
                        <option value="Part IV" ${rowData.category === 'Part IV' ? 'selected' : ''}>Part IV</option>
                        <option value="Part V" ${rowData.category === 'Part V' ? 'selected' : ''}>Part V</option>
                    </select>
                </td>
                <td><input type="number" class="form-control" name="Maxi_${semesterId}_${j}" id="Maxi_${semesterId}_${j}" value="${rowData.maximumMarks || ''}" /></td>
                <td><input type="number" class="form-control" name="Obt_${semesterId}_${j}" id="Obt_${semesterId}_${j}" value="${rowData.obtainedMarks || ''}" /></td>
                <td><div class="dropdown-container">
                        <select class="select2me form-control month" id="Mon_${semesterId}_${j}"  name="Mon_${semesterId}_${j}" >
                            <option value="">Select Month</option>
                            <option value="January" ${rowData.month === 1 ? 'selected' : ''}>January</option>
                            <option value="February" ${rowData.month === 2 ? 'selected' : ''}>February</option>
                            <option value="March" ${rowData.month === 3 ? 'selected' : ''}>March</option>
                            <option value="April" ${rowData.month === 4 ? 'selected' : ''}>April</option>
                            <option value="May" ${rowData.month === 5 ? 'selected' : ''}>May</option>
                            <option value="June" ${rowData.month === 6 ? 'selected' : ''}>June</option>
                            <option value="July" ${rowData.month === 7 ? 'selected' : ''}>July</option>
                            <option value="August" ${rowData.month === 8 ? 'selected' : ''}>August</option>
                            <option value="September" ${rowData.month === 9 ? 'selected' : ''}>September</option>
                            <option value="October" ${rowData.month === 10 ? 'selected' : ''}>October</option>
                            <option value="November" ${rowData.month === 11 ? 'selected' : ''}>November</option>
                            <option value="December" ${rowData.month === 12 ? 'selected' : ''}>December</option>
                        </select>
                        <select class="select2me form-control year" name="Year_${semesterId}_${j}" id="Year_${semesterId}_${j}"  >
                            ${yearOptions}
                        </select>
                    </div></td>
            </tr>
        `);
    }
}

// Event listener for changes in the number of semesters dropdown
$('#no-of-sem').on('change', function() {
    var numSemesters = parseInt($(this).val());
    generateSemesterTables(numSemesters);
});

// Function to store the data of each row
function storeTableData() {
    var storedData = {};

    // Loop through each semester table
    $('#tables_container').find('div').each(function() {
        var semesterId = $(this).find('.no-of-subjects-select').data('semester-id');
        storedData[`no_of_subjects_sem${semesterId}`] = $(this).find('.no-of-subjects-select').val();

        // Loop through each row in the semester table
        $(this).find('tbody tr').each(function(index) {
            var rowData = {
                subject: $(this).find('input[name^="Sub"]').val(),
                category: $(this).find('select[name^="Cat"]').val(),
                maximumMarks: $(this).find('input[name^="Maxi"]').val(),
                obtainedMarks: $(this).find('input[name^="Obt"]').val(),
                month: parseInt($(this).find('.month').val()),
                year: parseInt($(this).find('.year').val())
            };
            storedData[`Row_${semesterId}_${index}`] = rowData;
        });
    });

    // Return the stored data
    return storedData;
}

// Retrieve stored data when the page loads
$(document).ready(function() {
    var storedData = JSON.parse(localStorage.getItem('storedData')) || {}; // Retrieve stored data from local storage
    var numSemesters = parseInt($('#no-of-sem').val()); // Get the initial number of semesters
    generateSemesterTables(numSemesters); // Generate tables based on the initial number of semesters
    $('#no-of-sem').trigger('change'); // Trigger the change event to generate rows for initial semesters

    // Event listener for changes in the number of semesters dropdown
    $('#no-of-sem').on('change', function() {
        var numSemesters = parseInt($(this).val());
        generateSemesterTables(numSemesters); // Generate tables based on the selected number of semesters
        storeTableData(); // Store the data whenever there's a change in the number of semesters
    });

    // Event listener for changes in the number of subjects dropdown
    $(document).on('change', '.no-of-subjects-select', function() {
        storeTableData(); // Store the data whenever there's a change in the number of subjects
    });

    // Store the data whenever the user leaves the page
    $(window).on('beforeunload', function() {
        var storedData = storeTableData(); // Store the data
        localStorage.setItem('storedData', JSON.stringify(storedData)); // Save the data to local storage
    });
});

// Function to calculate and update the total marks and percentage
function calculateMarks() {
    var totalMaxMarks = 0;
    var totalObtMarks = 0;
    var totalMaxMarksPartIII = 0;
    var totalObtMarksPartIII = 0;
    var totalSubjectsPartIII = 0;

    // Loop through each semester table
    $('#tables_container').find('div').each(function() {
        $(this).find('tbody tr').each(function() {
            var maxMarks = parseInt($(this).find('input[name^="Maxi"]').val()) || 0;
            var obtMarks = parseInt($(this).find('input[name^="Obt"]').val()) || 0;
            var category = $(this).find('select[name^="Cat"]').val() || '';

            // Calculate total maximum and obtained marks
            totalMaxMarks += maxMarks;
            totalObtMarks += obtMarks;

            // Calculate total maximum and obtained marks for Part III
            if (category === 'Part III') {
                totalMaxMarksPartIII += maxMarks;
                totalObtMarksPartIII += obtMarks;
                totalSubjectsPartIII++;
            }
        });
    });

    // Update the input fields with the calculated values
    $('#max_mark_disp').val(totalMaxMarks);
    $('#max_mark').val(totalMaxMarks);

    $('#mark_obt_disp').val(totalObtMarks);
    $('#mark_obt').val(totalObtMarks);

    // Calculate percentage of marks for Part III
    var percMarksPartIII = (totalObtMarksPartIII / totalMaxMarksPartIII) * 100 || 0;
    $('#perc_mark_disp').val(percMarksPartIII.toFixed(3));
    $('#perc_mark').val(percMarksPartIII.toFixed(3));
}

// Call the calculateMarks function initially and whenever there's a change in the marks
$(document).ready(function() {
    calculateMarks(); // Initial calculation

    // Event listener for changes in the marks
    $('#tables_container, #no-of-sem').on('change', function() {
        calculateMarks(); // Recalculate marks whenever there's a change
    });
});


$(document).ready(function() {
    $('#education_details').on('submit', function(e) {
        if (!$('#dec_agree').is(':checked')) {
            e.preventDefault(); // Prevent form submission
            $('#error_message').show(); // Show error message
        } else {
            $('#error_message').hide(); // Hide error message
        
        e.preventDefault(); // Prevent the default form submission
        // Basic client-side validation example
        if (!$('#sslc_ins').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields',
                timer: 5000, // Automatically close after 5 seconds
                showConfirmButton: false, // Remove the confirm button
                timerProgressBar: true, // Enable timer progress bar
            });
            return;
        }

        // Add a loading indicator
        let loadingIndicator = Swal.fire({
            toast: true,
            position: 'top-end',
            title: 'Updating...',
            text: 'Please wait...',
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
       
        $.ajax({
            type: 'POST',
            url: 'php/education_update.php',
            data: $(this).serialize()+ '&max_mark_disp=' + $('#max_mark_disp').val() + '&mark_obt_disp=' + $('#mark_obt_disp').val() + 
          '&perc_mark_disp=' + $('#perc_mark_disp').val(),
            dataType: 'json', // Expect a JSON response from the server
            success: function(response) {
                loadingIndicator.close();
                if (response.success) {
                    Swal.fire({
                      toast: true,
                      position: 'top-end',
                      title: 'Personal Information',
                      text: 'You have been successfully submitted.',
                      icon: 'success',
                      timer: 2000, // Automatically close after 3 seconds
                      showConfirmButton: false, // Remove the confirm button
                      timerProgressBar: true, 
                    }).then(() => {
                      window.location.href = 'Certificate.html';
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
                loadingIndicator.close();
            
                console.error('AJAX Error: ' + textStatus + ': ' + errorThrown); // Log error to console
                /*alert('An error occurred. Please try again.');*/
            }
        
        });
    }
    });
});

$(document).ready(function() {
    // Retrieve user data on page load
    $.ajax({
        type: 'POST',
        url: 'php/education_retrieve.php',
        success: function(response) {
            if (response.success) {
                $('#sslc_ins').val(response.data.sslc_inst);
                $('#sslc_board').val(response.data.sslc_board);
                $('#sslc_sub').val(response.data.sslc_sub);
                $('#sslc_reg_no').val(response.data.sslc_reg);
                $('#sslc_perc').val(response.data.sslc_per);
                $('#sslc_month').val(response.data.sslc_month);
                $('#sslc_year').val(response.data.sslc_year);
                $('#sslc_mode').val(response.data.sslc_mode);
                $('#hsc_course').val(response.data.hsc_course);
                $('#hsc_ins').val(response.data.hsc_inst);
                $('#hsc_board').val(response.data.hsc_board);
                $('#hsc_sub').val(response.data.hsc_sub);
                $('#hsc_reg_no').val(response.data.hsc_reg);
                $('#hsc_perc').val(response.data.hsc_per);
                $('#hsc_month').val(response.data.hsc_month);
                $('#hsc_year').val(response.data.hsc_year);
                $('#hsc_mode').val(response.data.hsc_mode);
                $('#collegeName').val(response.data.college_Name);
                $('#universityName').val(response.data.university_Name);
                $('#qualification_type').val(response.data.qualification_type);
                $('#qualificationdegree').val(response.data.qualification_degree);
                $('#month_degree').val(response.data.month_degree);
                $('#year_degree').val(response.data.year_degree);
                $('#semester_type').val(response.data.semester_type);
                var numSemesters = parseInt(response.data.no_of_sem);
                $('#no-of-sem').val(numSemesters);
                generateSemesterTables(numSemesters);
                $('#awaiting_for_marksheet').val(response.data.awaiting_for_marksheet);
                var value = response.data.awaiting_for_marksheet;
                $('input[name=awaiting_for_marksheet][value=' + value + ']').prop('checked', true);
                $('#programme-applied').val(response.data.programme_applied);
                $('#select-programme').val(response.data.selected_programme);
                var value_1=parseInt(response.data.no_of_subjects_sem1);
                $('#no-of-subjects-sem1').val(value_1);
                // Store the data whenever there's a change
                 
                for (var j = 1; j <= 8; j++) {
                    for (var i = 1; i <= 10; i++) {
                    $('#Sub_'+j+'_' + i).val(response.data['sub_'+j+'_' + i]);
                    $('#Cat_'+j+'_' + i).val(response.data['cat_'+j+'_' + i]);
                    $('#Maxi_'+j+'_' + i).val(response.data['maxi_'+j+'_' + i]);
                    $('#Obt_'+j+'_' + i).val(response.data['obt_'+j+'_' + i]);
                    $('#Mon_'+j+'_' + i).val(response.data['mon_'+j+'_' + i]);
                    $('#Year_'+j+'_' + i).val(response.data['year_'+j+'_' + i]);
                }
            }
            $('#max_mark_disp').val(response.data.max_mark_disp);  
            $('#mark_obt_disp').val(response.data.mark_obt_disp);  
            $('#perc_mark_disp').val(response.data.perc_mark_disp);
            $('#cls_obt').val(response.data.cls_obt);
            $('#cgpa').val(response.data.cgpa);
            $('#grade').val(response.data.grade);   
              
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('An error occurred. Please try again.');
        }
    });
    $('#sslc_reg_no,#sslc_perc,#hsc_reg_no,#hsc_perc').on('input', function() {
        // Filter non-numeric characters from input value
        var filteredValue = $(this).val().replace(/\D/g, '');
        // Update input field with filtered value
        $(this).val(filteredValue);
    });
    $('#grade').on('input', function() {
        var inputVal = $(this).val();
        // Remove numbers and convert to uppercase
        var filteredVal = inputVal.replace(/[0-9]/g, '');
        // Update the input field with the filtered uppercase value
        $(this).val(filteredVal);
    });
});