<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for Medical Certificate</title>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
        }
        .card {
            background-color: #fff; /* White card background */
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-appointment, .btn-hotline {
            color: #4d030c; /* Text color matches border color */
            border: 2px solid #4d030c;
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-appointment:hover, .btn-hotline:hover {
            background-color: #4d030c;
            color: #fff; /* Text color changes to white on hover */
        }
    </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../images/bagong-pilipinas.png" alt="Sta. Maria Seal" style="width: 100px; height: 90px; margin: 0 auto;">
                <img src="../images/logo.png" alt="Sta. Maria Seal" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../services/vaccination-for-infants.php">Vaccination for Infants/Children</a>
                            <a class="dropdown-item" href="../services/maternal-services.php">Maternal and Child Health Services</a>
                            <a class="dropdown-item" href="../services/general-consultation.php">Free General Consultation</a>
                            <a class="dropdown-item" href="../services/dental-care.php">Dental Care</a>
                            <a class="dropdown-item" href="../services/medics-toschool-clinics.php">Medical/Nutritional services to school clinics</a>
                            <a class="dropdown-item" href="../services/medical-certificate.php">Request of Medical Certificate</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../appointment/booking.php">Book Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../medicines/medicines.php">Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../announcements/events.php">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5">
    <div class="card">
        <h2 class="text-center">Request for Medical Certificate</h2>
        <p>The service for requesting a medical certificate is available for various purposes such as work, school, travel, etc.</p>
        <p>If you need a medical certificate, please follow the steps below:</p>
        <ol>
            <li>Make an appointment through our website to consult with a healthcare provider.</li>
            <li>During your appointment, inform the healthcare provider about the purpose of the medical certificate.</li>
            <li>Once the examination is complete and your eligibility is confirmed, the healthcare provider will issue the medical certificate.</li>
            <li>You will receive the medical certificate either in person or via email, depending on the provider's procedure.</li>
        </ol>
        <p>Keep in mind that medical certificates are issued based on the healthcare provider's assessment of your medical condition and are subject to their professional judgment.</p>

        <!-- Button for making an appointment -->
        <div class="text-center mt-4">
            <a href="../booking.php" class="btn btn-appointment mr-3">Make an Appointment</a>
            <a href="tel:+0755233773" class="btn btn-hotline">Contact RHU Hotline</a>
        </div>
    </div>
</div>

 <!-- Footer -->
 <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="text-white">&copy; 2024 Sta. Maria Pangasinan Rural Health Unit. All rights reserved.</p>
        </div>
    </footer>


<!-- Bootstrap scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
