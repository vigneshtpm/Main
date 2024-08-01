$(document).ready(function(){
    $("#header").load("header.html");
    $("#navigation").load("navigation.html");

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
        <div class="box title-box">
            <h2>Semester ${semesterId}</h2>
            </div>
            <div class="box content-box">
            <div class="form-group">
                <label for="no-of-subjects-sem${semesterId}" style="display: none; margin-right: 10px;">Number of Subjects:</label>
                <select class="select2me form-control form-control no-of-subjects-select" id="no-of-subjects-sem${semesterId}" name="no-of-subjects-sem${semesterId}" data-semester-id="${semesterId}" style="display: none; width:200px;">
                  
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
       

        tbody.append(`
            <tr>
                <td><input type="text" class="form-control" name="Sub_${semesterId}_${j}"  id="Sub_${semesterId}_${j}" disabled /></td>
                <td><input type="text" class="form-control" name="Cat_${semesterId}_${j}" id="Cat_${semesterId}_${j}" disabled /></td>
                
                <td><input type="text" class="form-control" name="Maxi_${semesterId}_${j}" id="Maxi_${semesterId}_${j}"disabled /></td>
                <td><input type="text" class="form-control" name="Obt_${semesterId}_${j}" id="Obt_${semesterId}_${j}" disabled /></td>
              
                <td><input type="text" class="form-control" name="Mon_${semesterId}_${j}"  id="Mon_${semesterId}_${j}"  disabled />
               
                    
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


    // Retrieve user data on page load
    $.ajax({
        type: 'GET',
        url: 'php/preview_retrive.php',
        success: function(response) {
        
            if (response.success) {
                $('#applicant_name').val(response.data.applicant_name);
                $('#email').val(response.data.e_mail);
                $('#mobile').val(response.data.mobile);
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
                $('#sslc_ins').val(response.data.sslc_inst);
                $('#sslc_board').val(response.data.sslc_board);
                $('#sslc_sub').val(response.data.sslc_sub);
                $('#sslc_reg_no').val(response.data.sslc_reg);
                $('#sslc_perc').val(response.data.sslc_per);
                var month = response.data.sslc_month;
                var year = response.data.sslc_year;
                var value = month + ' ' + year; 
                $('#sslc_month').val(value);
                
                $('#sslc_mode').val(response.data.sslc_mode);
                $('#hsc_course').val(response.data.hsc_course);
                $('#hsc_ins').val(response.data.hsc_inst);
                $('#hsc_board').val(response.data.hsc_board);
                $('#hsc_sub').val(response.data.hsc_sub);
                $('#hsc_reg_no').val(response.data.hsc_reg);
                $('#hsc_perc').val(response.data.hsc_per);
                var month = response.data.hsc_month;
                var year = response.data.hsc_year;
                var value = month + ' ' + year; 
               
                $('#hsc_month').val(value);
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

                //$('#awaiting_for_marksheet').val(response.data.awaiting_for_marksheet);
                //var value = response.data.awaiting_for_marksheet;
                //$('input[name=awaiting_for_marksheet][value=' + value + ']').prop('checked', true);
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
                    // Concatenate month and year into a single string
                    var month = response.data['mon_'+j+'_' + i];
                    var year = response.data['year_'+j+'_' + i];
                    var value = month + ' ' + year; // Adjust the separator if needed

                    // Set the concatenated value to the input field
                    $('#Mon_'+j+'_' + i).val(value);
                 
                
                  
                }
                $('#max_mark_disp').val(response.data.max_mark_disp);  
                $('#mark_obt_disp').val(response.data.mark_obt_disp);  
                $('#perc_mark_disp').val(response.data.perc_mark_disp);
                $('#cls_obt').val(response.data.cls_obt);
                $('#cgpa').val(response.data.cgpa);
                $('#grade').val(response.data.grade);   
            }
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('An error occurred. Please try again.');
        }
    });

    
});