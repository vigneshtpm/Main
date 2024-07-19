<?php
include 'db.php';

$sql = "SELECT * FROM applicants WHERE id = 1"; // Adjust the query as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Applicant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <main class="col-md-8 ms-sm-auto col-xxl-10 col-lg-9 px-md-4">
        <div class="pt-3" style="margin-bottom: 10%;">
            <h2 class="text-color text-center" style="color: #000064;">Preview Applicant</h2><br>
            <div class="row">
                <div class="col-sm-12 col-lg-5 col-md-12 mb-3">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-xs-4">
                            <label for="applicant_name">Name of Applicant:<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-sm-8 col-md-8 col-xs-8 mb-3">
                            <input type="text" id="applicant_name" name="applicant_name" class="form-control" value="<?php echo $row['applicant_name']; ?>" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                            <label for="father-name">Name of Father:<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-sm-8 col-md-8 col-xs-8 mb-3">
                            <input type="text" id="father-name" name="father-name" class="form-control" value="<?php echo $row['father_name']; ?>" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="father-occupation">Father's Occupation:<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" id="father-occupation" name="father-occupation" class="form-control" value="<?php echo $row['father_occupation']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5 col-md-12 mb-3">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <label for="dob">Date of Birth:<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-sm-8 col-md-8 mb-3">
                            <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']; ?>" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="mother-name">Name of Mother:<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-sm-8 col-md-8 mb-3">
                            <input type="text" id="mother-name" name="mother-name" class="form-control" value="<?php echo $row['mother_name']; ?>" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                            <label for="guardian-name">Name of Guardian:</label>
                        </div>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" id="guardian-name" name="guardian-name" class="form-control" value="<?php echo $row['guardian_name']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-2 col-md-12 center-content">
                    <div class="text-center">
                        <img src="assets/images/Periyar_University_logo.png" class="applicant_image" alt="Applicant image" style="border: 5px solid #555;">
                    </div>      
                </div>
            </div>
            <div class="text-center">
                <button id="edit-btn" class="btn btn-primary">Edit</button>
                <button id="save-btn" class="btn btn-success" style="display:none;">Save</button>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function(){
            $('#edit-btn').click(function(){
                $('input').prop('readonly', false);
                $('#edit-btn').hide();
                $('#save-btn').show();
            });

            $('#save-btn').click(function(){
                var applicantData = {
                    applicant_name: $('#applicant_name').val(),
                    father_name: $('#father-name').val(),
                    father_occupation: $('#father-occupation').val(),
                    dob: $('#dob').val(),
                    mother_name: $('#mother-name').val(),
                    guardian_name: $('#guardian-name').val(),
                };

                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    data: applicantData,
                    success: function(response){
                        alert(response);
                        $('input').prop('readonly', true);
                        $('#save-btn').hide();
                        $('#edit-btn').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
