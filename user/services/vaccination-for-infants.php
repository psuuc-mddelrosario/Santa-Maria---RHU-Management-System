<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination for Infants/Children</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../home.css">
    <style>
        /* Color Palette */
        :root {
            --primary-color: #4d030c; /* Dark red */
            --secondary-color: #9a35e2; /* Light purple */
            --text-color: #ffffff; /* White text */
        }

        /* Navbar */
        .navbar {
            background-color: var(--primary-color); /* Use primary color */
            color: var(--text-color); /* Use white text */
            padding: 10px 0; /* Adjust padding */
            text-align: center;
        }

        .navbar-brand {
            font-size: 24px;
        }

        /* Main Content */
        .container {
            max-width: 1300px;
            margin: 50px auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .service-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 48%; /* Adjust width as needed */
            margin-right: 20px; /* Add space between containers */
        }

        .service-content h1 {
            color: var(--primary-color); /* Use primary color */
            margin-bottom: 20px;
        }

        .service-content p {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .service-image {
            width: 48%; /* Adjust width as needed */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

<!-- Main Content -->
<div class="container">
    <div class="service-content">
        <h1>National Immunization Program</h1>
        <p>The National Immunization Program, formerly known as the Expanded Program for Immunization, was launched by the Philippine government on July 12, 1976, with the assistance of the World Health Organization (WHO) and the United Nations Children’s Fund (UNICEF). Its primary goal is to ensure that infants and children have access to routinely recommended infant/childhood vaccines.</p>
        <p>This program aims to reduce morbidity and mortality among children by protecting them against the most common vaccine-preventable diseases (VPDs), including Tuberculosis, Poliomyelitis, Diptheria, Tetanus, Pertussis, and Measles. The Expanded Program on Immunization provides safe and effective vaccines against VPDs for newborns, infants, and older children.</p>
        <p><strong>Source:</strong> Department of Health</p>
    </div>
    <img src="../images/VACCINATION-FOR-INFANTS.jpg" alt="Vaccination Image" class="service-image">
</div>
</div>



    <!-- Bootstrap scripts -->
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
