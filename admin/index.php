<?php
require_once 'conn.php';

session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emailaddress"]) && isset($_POST["password"])) {
    $email = $_POST["emailaddress"];
    $password = $_POST["password"];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM userlogin WHERE emailaddress = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the query returned a row
        if ($result->num_rows == 1) {
            // Set session variable to mark user as authenticated
            $_SESSION["authenticated"] = true;
            echo "successful";
        } else {
            echo "failed";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare SQL statement";
    }

    $conn->close();
    exit; // Stop further execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        #loginStatusMessage {
        color: black;
        }
        .modal-title {
        color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="styled-container">
                    <h2 class="mb-4 text-center">Login</h2>
                    <form id="loginForm" method="POST">
                        <div class="form-group">
                            <label for="emailaddress">Email Address</label>
                            <input type="text" class="form-control" id="emailaddress" name="emailaddress" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-block text-white" style="background-color: #4d030c;"><strong>Login</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginStatusModal" tabindex="-1" role="dialog" aria-labelledby="loginStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginStatusModalLabel">Login Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="loginStatusMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'index.php', 
                data: formData,
                success: function(response) {
    if (response.trim() === 'successful') {
        $('#loginStatusMessage').text('Logging you in');
        $('#loginStatusModal').modal('show'); // Show the modal
        setTimeout(function() {
            window.location.href = 'dashboard.php';
        }, 2000); 
    } else {
        $('#loginStatusMessage').text('Login failed');
        $('#loginStatusModal').modal('show');
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