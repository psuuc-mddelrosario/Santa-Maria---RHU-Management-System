<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['birthdate'], $_POST['contactnumber'], $_POST['emailaddress'], $_POST['password'])) {
        $firstname = $_POST['firstname'];
        $middlename = isset($_POST['middlename']) ? $_POST['middlename'] : '';
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
        $contactnumber = $_POST['contactnumber'];
        $emailaddress = $_POST['emailaddress'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("INSERT INTO userlogin (firstname, middlename, lastname, address, birthdate, contactnumber, emailaddress, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $firstname, $middlename, $lastname, $address, $birthdate, $contactnumber, $emailaddress, $password);
        
        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('images/stamaria.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh; 
            color: white;
        }
        .styled-container {
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }
        #registrationMessage {
        color: black;
        }
        .modal-title {
        color: black;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="styled-container">
                    <h2 class="mb-4 text-center">Register</h2>
                    <form id="registerForm" method="POST" action="">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="contactnumber">Contact Number</label>
                            <input type="text" class="form-control" id="contactnumber" name="contactnumber" required>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Email Address</label>
                            <input type="email" class="form-control" id="emailaddress" name="emailaddress" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-block" style="background-color: antiquewhite;"><strong>Register</strong></button>
                    </form>
                    <br>
                    <p>Go back to Login page? <a href="login.php">Click Here</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Registration Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="registrationMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
 $(document).ready(function() {
    $('#registerForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: formData,
            success: function(response) {
                if (response.includes('successful')) {
                    $('#registrationMessage').text('Successfully Registered');
                } else {
                    $('#registrationMessage').text('Failed');
                }
                $('#registrationModal').modal('show');
                if (response.includes('successful')) {
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000); 
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>
