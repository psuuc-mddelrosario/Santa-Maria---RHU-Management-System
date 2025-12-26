<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Dental / Oral Hygiene</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
    <link rel="stylesheet" href="../home.css"> 
  
    <style>
    .accordion-item {
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        margin-bottom: 10px;
    }

    .accordion-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 15px;
        cursor: pointer;
    }

    .accordion-header:hover {
        background-color: #e2e6ea;
    }

    .accordion-header i {
        margin-right: 10px;
    }

    .accordion-body {
        padding: 15px;
      
    }

   
</style>

</head>
<body> <!-- Navigation -->
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
            <h2 class="text-center mb-4 " id="underline">Basic Dental and Oral Hygiene</h2>
            <p>Oral Hygiene is the practice of keeping the mouth, teeth and gums healthy to prevent oral diseases like plaque, tooth carries, etc.</p>
            <div id="accordion">
    <div class="accordion-item">
        <div class="accordion-header" id="headingOne">
            <h5 class="mb-0">
                <i class="fa-solid fa-tooth"></i>
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Tooth Extraction
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="accordion-body">
                Removing a tooth from the mouth due to disease, trauma, or crowding.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-header" id="headingTwo">
            <h5 class="mb-0">
                <i class="fa-solid fa-hospital"></i>
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Oral Cleaning / Prophylaxis
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="accordion-body">
                Professional cleaning of the teeth to remove plaque, tartar, and stains.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-header" id="headingThree">
            <h5 class="mb-0">
                <i class="fa-solid fa-stethoscope"></i>
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Oral Check-up
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="accordion-body">
                Examination of the oral cavity to assess oral health status and detect any problems.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-header" id="headingFour">
            <h5 class="mb-0">
                <i class="fa-solid fa-graduation-cap"></i>
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Health Teachings
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="accordion-body">
                Providing education on maintaining oral health and preventing oral diseases.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-header" id="headingFive">
            <h5 class="mb-0">
                <i class="fa-solid fa-hospital"></i>
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Referral
                </button>
            </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="accordion-body">
                Referring patients to specialist dental services or higher-level facilities for advanced treatment.
            </div>
        </div>
    </div>
</div>

        </section>
    </div>
     <!-- Footer -->
     <footer class="text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Sta. Maria Pangasinan Rural Health Unit. All rights reserved.</p>
        </div>
    </footer>


    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
