<?php
require_once '../conn.php';

function calculateRemainingBookings($conn, $selectedDate) {
    $sql = "SELECT COUNT(*) AS totalBookings FROM appointment WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    $totalBookings = ($row['totalBookings'] !== null) ? $row['totalBookings'] : 0;
    $remainingBookings = 1 - $totalBookings;
    
    return $remainingBookings;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array(); 

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK){
        $firstName = $_POST['firstName'];
        $middleName = isset($_POST['middleName']) ? $_POST['middleName'] : null;
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sex = $_POST['sex'];
        $service = $_POST['service'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $newFileName = $_FILES["image"]["name"];

        // Directory where the image will be saved
        $targetDirectory = "verif/";

        // Check if the directory exists, if not, create it
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Path of the image file
        $targetFilePath = $targetDirectory . basename($newFileName);

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $remainingBookings = calculateRemainingBookings($conn, $date);

        if ($remainingBookings > 0) {
            $sql = "INSERT INTO appointment (firstname, middlename, lastname, email, phonenumber, sex, service, date, message, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssss", $firstName, $middleName, $lastName, $email, $phone, $sex, $service, $date, $message, $newFileName);

            if ($stmt->execute()) {
                $totalBookings = calculateRemainingBookings($conn, $date);
                $totalBookings++;

                $updateSql = "UPDATE appointment SET totalBookings = ? WHERE date = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("is", $totalBookings, $date);
                $updateStmt->execute();
                $updateStmt->close();

                echo "Booking successful! Bookings for $date: $totalBookings";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, no more bookings available for the selected date.";
        }
    } else {
        $errors[] = "No file uploaded.";
    }

    // Ensure no further output is sent
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Rural Health Unit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../home.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-bg {
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }

    .btn-submit {
        background-color:  #6c1515;
        border-color: #390606;
    }

    .btn-submit:hover {
        background-color: #390606;
        border-color: #6c1515;
    }
    </style>
</head>
<body> <!-- Navigation -->
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
    <section id="appointment" class="py-5">
    <div class="container mt-3">
        <h2 class="text-left mb-4">| Book an Appointment</h2>
        <div class="card-form card-bg">
            <div class="card-body">
                <form id="appointmentForm" method="post" enctype="multipart/form-data">
                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <label for="image">Proof of Residency: Government Id's, Certificates, etc.</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middleName">Middle Name  <span> <small> * Optional</small></span></label>
                            <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter your middle name (optional)">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" id="sex" name="sex">
                            <option>Select sex</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Select Service</label>
                        <select class="form-control" id="service" name="service">
                            <option>Select a service</option>
                            <option>Child Birth Consultation <span><small>(includes: Newborn Screening, Hearing Test, Height and Weight, Vaccination, Monitoring, Vitamin Supplementation)</small></span></option>
                            <option>General Consultation <span><small>(includes: Temperature Taking, Blood Pressure Taking, Weight and Height Check, Basic Laboratory Test and Patient Health teaching)</small></span></option>
                            <option>Oral Check-up</option>
                            <option>Oral Cleaning/ prophylaxis</option>
                            <option>Pre-natal Consultation</option>
                            <option>Request for Medical Certificate</option>
                            <option>Tooth Extraction</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Preferred Date   <span> 
                            <small>   * (Closed every Sunday) </small>
                        </span></label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Closed every Sunday" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Additional Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter any additional message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 Sta. Maria Pangasinan Rural Health Unit. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#appointmentForm').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        submitForm(formData);
    });
});

function submitForm(formData) {
    $.ajax({
        type: 'POST',
        url: 'booking.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#modalMessage').html(response);
            $('#appointmentModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#modalMessage').text("An error occurred. Please try again.");
            $('#appointmentModal').modal('show');
        }
    });
}
</script>

</body>
</html>
