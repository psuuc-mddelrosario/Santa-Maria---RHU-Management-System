<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free General Consultations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css"> <!-- Assuming you have a separate CSS file for styling -->
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            max-width: 1000px; /* Adjust as needed */
            margin: auto;
            padding: 0 1rem;
        }

        /* Section styles */
        section {
            margin-bottom: 2rem;
        }

        /* Service styles */
        .service {
            background-color: #f1f1f1; /* Light gray background */
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
        }

        .service h4 {
            margin-bottom: 0.5rem;
            color: #333; /* Dark gray text color */
        }

        .service p {
            color: #666; /* Medium gray text color */
        }

        /* Icon styles */
        .fa-icon {
            margin-right: 10px;
        }

        /* Colors for services */
        .service:nth-child(odd) {
            background-color: #e9f7ef; /* Light green background */
        }

        .service:nth-child(even) {
            background-color: #f8e9e9; /* Light red background */
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
        <section>
            <h2 class="text-center mb-4 " id="underline">Free General Consultations <span><small>includes</small></span></h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-thermometer fa-icon"></i>Temperature Taking</h4>
                        <p>Checking body temperature to monitor for fever.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-tachometer-alt fa-icon"></i>Blood Pressure Taking</h4>
                        <p>Measuring blood pressure to assess cardiovascular health.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-weight fa-icon"></i>Weight and Height Check</h4>
                        <p>Measuring weight and height for general health assessment.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-vial fa-icon"></i>Basic Laboratory Test</h4>
                        <p>Performing basic lab tests to assess various health parameters.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-stethoscope fa-icon"></i>General Consultation</h4>
                        <p>Consulting with healthcare professionals for general health concerns.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h4><i class="fas fa-user-graduate fa-icon"></i>Patient Health Teachings</h4>
                        <p>Providing education on maintaining good health and managing illnesses.</p>
                    </div>
                </div>
                <div class="container">
                <div class="col-md-12">
                    <div class="service">
                        <h4 class="text-center"><i class="fas fa-hospital-user fa-icon"></i>Referral to Secondary/Tertiary Hospital</h4>
                        <p class="text-center">Referring patients to higher-level hospitals for specialized care.</p>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>

     <!-- Footer -->
     <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Sta. Maria Pangasinan Rural Health Unit. All rights reserved.</p>
        </div>
    </footer>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
