<?php
require_once '../conn.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $required_fields = array('fullName', 'email', 'message');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . " is required";
        }
    }

    // If there are no validation errors, proceed to database insertion
    if (empty($errors)) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare and execute SQL statement to insert data into contactus table
        $stmt = $conn->prepare("INSERT INTO contactus (fullname, emailaddress, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullName, $email, $message);

        // Check if the statement executed successfully
        if ($stmt->execute()) {
            $response = 'Your message has been sent successfully!';
        } else {
            $response = 'An error occurred while sending your message. Please try again later.';
        }

        // Close statement
        $stmt->close();
    } else {
        // If there are validation errors, concatenate them into a single string
        $errorMessages = "";
        foreach ($errors as $error) {
            $errorMessages .= $error . "<br>";
        }
        $response = $errorMessages;
    }

    // Check if it's an AJAX request and if the AJAX flag is present
    if (!empty($_POST['ajax']) && $_POST['ajax'] == 'true') {
        // Return the response without HTML markup
        echo $response;
        exit; // Terminate the script after echoing the response
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rural Health Unit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css">

    <style>
        /* Add this CSS for button styling */
    .btn-contact {
        background-color:  #6c1515; /* Dark red background color */
        border-color: #390606; /* Dark red border color */
    }
   

    .btn-contact:hover {
        background-color: #390606; /* Dark red background color on hover */
        border-color: #6c1515; /* Dark red border color on hover */
    }
    .card {
    border: none; /* Remove default card border */
}

.card-img {
    opacity: 0.5; /* Set opacity for the image */
}

    </style>
</head>
<body class="bg-light">
  
     
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark p" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container-fluid">
        <img src="../images/bagong-pilipinas.png" alt="Sta. Maria Seal" style="width: 100px; height: 90px; margin: 0 auto;">
            <img src="../images/logo.png" alt="Sta. Maria Seal" style="width: 300px; height: 80px; margin: 0 auto;">
            <a class="navbar-brand" href="#" style="color: white;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../services/vaccination-for-infants.php">Vaccination for Infants/Children</a>
                            <a class="dropdown-item" href="../services/maternal-services.php">Maternal and Child Health Services</a>
                            <a class="dropdown-item" href="../services/general-consultation.php">Free General Consultation</a>
                            <a class="dropdown-item" href="../services/general-consultation.php">Dental Care</a>
                            <a class="dropdown-item" href="../services/medics-toschool-clinics.php">Medical/Nutritional services to school clinics</a>
                            <a class="dropdown-item" href="../services/medical-certificate.php">Request of Medical Certificate</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../appointment/booking.php" style="color: white;">Book Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../medicines/medicines.php" style="color: white;">Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../announcements/events.php" style="color: white;">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contact.php" style="color: white;">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Contact Us</h2>
            <form id="contactForm" method="post">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
                </div>
                <button type="submit" class="btn btn-contact text-white">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <img src="../images/contact-bg.jpg" class="card-img" alt="Contact Image" style="opacity: 0.8;">
    </div>
</div>

            </div>
        </div>
    </div>
</section>

<!-- Add a modal for displaying messages -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="messageText"></p>
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Sta. Maria Pangasinan Rural Health Unit. All rights reserved.</p>
        </div>
    </footer>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->
<script>
$(document).ready(function() {
    $('#contactForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize() + '&ajax=true'; // Add a flag to indicate AJAX request
        $.ajax({
            type: 'POST',
            url: 'contact.php',
            data: formData,
            success: function(response) {
                $('#messageText').html(response);
                $('#messageModal').modal('show');
                if (response.includes('successfully')) {
                    $('#contactForm')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                var errorMessage = 'An error occurred while processing your request. Please try again later.';
                $('#messageText').html(errorMessage);
                $('#messageModal').modal('show');
            }
        });
    });
});
</script>


</body>
</html>

