<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Natal / Post-Natal / Child Birth Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css"> <!-- Assuming you have a separate CSS file for styling -->
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa; /* Light gray background */
        }

        /* Header styles */
        header {
            background: #343a40; /* Dark gray header */
            color: #fff;
            padding: 2rem 0;
            text-align: center;
        }
       

        

        /* Section styles */
        section {
            margin-bottom: 2rem;
        }

        /* Service styles */
        .service {
            background-color: #fff; /* White service background */
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
            transition: transform 0.3s ease-in-out;
        }

        .service:hover {
            transform: translateY(-5px);
        }

        .service h3 {
            margin-bottom: 1rem;
            color: #343a40; /* Dark gray text color */
        }

        .service ul {
            list-style: none;
            padding-left: 0;
        }

        .service ul li {
            margin-bottom: 0.5rem;
            color: #6c757d; /* Medium gray text color */
        }

        .service p {
            color: #6c757d; /* Medium gray text color */
        }
        /* Add this CSS to adjust the card title and icon size */
.card-title {
    font-size: 1rem; /* Adjust the font size as needed */
}

.fa-2x {
    font-size: 2rem; /* Adjust the icon size as needed */
}
footer {
        background-color: #343a40; /* Dark gray background */
        color: #fff; /* White text */
        padding: 1rem 0; /* Adjust top and bottom padding as needed */
        margin-left: -15px;
        margin-right: -15px;
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


<!-- Services Section -->
<section id="services" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5" id="underline">Pre-Natal Services</h2>
        <h4 class="text-left mb-3">History Taking</h4>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card h-200">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title text-center mb-3"><i class="fas fa-calendar-alt fa-2x text-primary"></i>Last Menstrual Period (LMP)</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-200">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title text-center mb-3"><i class="fas fa-calendar-day fa-2x text-danger"></i> Expected Date of Confinement (EDC)</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-200">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title text-center mb-3"><i class="fas fa-baby fa-2x text-success"></i> Age of Pregnancy (AP)</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-300">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title text-center mb-3"><i class="fas fa-hourglass-half fa-2x text-warning"></i> Age of Gestation (AGE)</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <div class="container">
            <div class="service">
                <h3>Vaccination / Supplementation</h3>
                <ul>
                    <li>Tetanus Toxoid</li>
                    <li>Iron and Folic Acid</li>
                    <li>Calcium Carbonate</li>
                </ul>
            </div>
            
            <div class="service">
                <h3>Screening for:</h3>
                <ul>
                    <li>Blood Type and Complete Blood Count (CBC)</li>
                    <li>Urinalysis</li>
                    <li>Fasting Blood Sugar</li>
                    <li>Hepatitis B (HBsAg)</li>
                    <li>HIV</li>
                    <li>Syphilis</li>
                </ul>
                <p>* Depends on availability. Can be done outside laboratory.</p>
            </div>
            <section>
  
      
           

        <!-- POst natal -->
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center mb-4" id="underline">Post-Natal Services</h2>
                <p class="text-center mb-4">Care given to the mother and her newborn baby immediately after the birth of the placenta and for the first 42 days of life. (Source: World Health Organization)</p>
                <div class="card p-4">
                    <ul class="list-unstyled">
                        <li>Latching On / Breastfeeding</li>
                        <li>Newborn Screening </li>
                        <li>Hearing Test </li>
                        <li>Height and Weight</li>
                        <li>Vaccination</li>
                        <li>Monitoring</li>
                        <li>Vitamin Supplementation</li>
                        <li>Doctor Consultation</li>
                    </ul>
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


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
