<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Maria Pangasinan RHU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
    <style>
  /* Navbar */
         .navbar {
            background-color: #4d030c;
            padding-top: 9px;
            padding-bottom: 10px;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: white;
            text-align: center;
        }

        .navbar-nav {
            padding-left: 100px;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-item:hover .dropdown-menu {
            color: #45e1c4 !important;
        }

        .dropdown-menu {
            border: none;
            border-radius: 0;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            color: #310605;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #343a40;
        }

       .navbar-nav .bagong-pilipinas-logo {
    margin-left: auto;
}
        @media (max-width: 992px) {
            .navbar-nav .bagong-pilipinas-logo {
                display: none;
            }
        }

        /* Carousel */
        .carousel-item img {
            height: 695px;
            object-fit: cover;
            filter: brightness(70%);
        }

        .carousel-caption {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0.10, 0.2, 0.5, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
        }

        .carousel-caption .display-4 {
            font-weight: bold;
            color: white;
        }

        .carousel-caption .btn-light {
            margin-top: 50px;
            background-color: #4d030c;
            color: #fff;
            border: 2px solid #4d030c;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .carousel-caption:hover .btn-light:hover {
            background-color: #fff;
            color: #4d030c;
        }

        /* Services Section */
        #services {
            background-color: #ffffff;
            padding: 60px 0;
        }

        .card {
            border: none;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            color: rgb(160, 108, 158);
        }

        .card-title {
            font-weight: bold;
        }

        .card-bg-light-gray {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
        }

        /* Custom CSS */
        .appointment-bg {
            background-image: url('../user/images/bg-apptmt.png');
            background-size: cover;
            background-position: center;
            padding: 50px 0;
        }

        .appointment-content,
        .appointment-image {
            padding: 20px;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
        }

        #underline::after {
            content: '';
            display: block;
            width: 50px;
            height: 5px;
            background-color: #390606;
            margin: auto;
            margin-top: 5px;
            opacity: 0.5;
        }

        .smaller-text {
            font-size: 14px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            color: blue !important;
        }

        /* Button styling */
        .appointment-btn {
            background-color: #390606;
            border-color: #390606;
        }

        .appointment-btn:hover {
            background-color: #6c1515;
            border-color: #6c1515;
        }

    </style>
</head>
<body>

   
     
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark p" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container-fluid">
        <img src="images/bagong-pilipinas.png" alt="Sta. Maria Seal" style="width: 100px; height: 90px; margin: 0 auto;">
            <img src="images/logo.png" alt="Sta. Maria Seal" style="width: 300px; height: 80px; margin: 0 auto;">
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
                            <a class="dropdown-item" href="services/vaccination-for-infants.php">Vaccination for Infants/Children</a>
                            <a class="dropdown-item" href="services/maternal-services.php">Maternal and Child Health Services</a>
                            <a class="dropdown-item" href="services/general-consultation.php">Free General Consultation</a>
                            <a class="dropdown-item" href="services/general-consultation.php">Dental Care</a>
                            <a class="dropdown-item" href="services/medics-toschool-clinics.php">Medical/Nutritional services to school clinics</a>
                            <a class="dropdown-item" href="services/medical-certificate.php">Request of Medical Certificate</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointment/booking.php" style="color: white;">Book Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicines/medicines.php" style="color: white;">Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="announcements/events.php" style="color: white;">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact/contact.php" style="color: white;">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/stamaria.jpg" alt="First slide">
        </div>
        <div class="carousel-item img">
            <img class="d-block w-100" src="images/carousel.jpg" alt="Second slide">
        </div>
        <div class="carousel-item img">
            <img class="d-block w-100" src="images/carousel-3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <div class="carousel-caption">
    <div class="container text-center">
        <h1 class="display-4">Santa Maria RHU</h1>
        <p class="lead">Bayan ng Santa Maria, Lalawigan ng Pangasinan</p>
        
        <?php
require 'conn.php'; // Assuming 'conn.php' contains your database connection

// Initialize availability variable
$availability = null;

try {
    // Assuming $doctorId contains the ID of the doctor you want to fetch availability for
    $doctorId = 1; // Replace '1' with the actual ID
    
    // Query to fetch doctor availability
    $query = "SELECT availability FROM doctors WHERE id = ?";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $doctorId); // Bind the parameter
    $stmt->execute(); // Execute the query
    
    // Bind the result
    $stmt->bind_result($availability);
    
    // Fetch availability
    $stmt->fetch();
    
} catch (Exception $e) {
    // Handle any exceptions or errors here
    error_log('Error fetching doctor availability: ' . $e->getMessage());
}

// Display availability
?>

<div class="availability-message">
    <?php if ($availability !== null): ?>
        <?php if ($availability): ?>
            <p>The Doctor is: <span class='availability-text'><?php echo htmlspecialchars($availability); ?></span></p>
        <?php else: ?>
            <p>The Doctor is: <span class='not-available-text'>Not Available</span></p>
        <?php endif; ?>
    <?php else: ?>
        <p>Availability information is currently unavailable.</p>
    <?php endif; ?>
</div>


    </div>
</div>
</div>


<!-- Services Section -->
<section id="services" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5" id="underline">Our Services</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-syringe fa-2x text-primary"></i> Vaccination for Infants/Children</h4>
                        <p class="card-text text-justify flex-grow-1">This service aims to ensure that infants and children receive routine vaccinations against vaccine-preventable diseases (VPDs). These vaccinations include those for Tuberculosis, Poliomyelitis, Diptheria, Tetanus, Pertussis, and Measles. The program provides safe and effective vaccines for newborns, infants, and older children.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-baby-carriage fa-2x text-danger"></i> Maternal and Child Health Services</h4>
                        <p class="card-text text-justify flex-grow-1">This service provides healthcare to women of childbearing age, including prenatal care, postnatal care, family planning, and neonatal care. It aims to ensure the health and well-being of mothers and their children.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-syringe fa-2x text-success"></i> Immunization Programs</h4>
                        <p class="card-text text-justify flex-grow-1">Immunization programs aim to protect individuals and communities from vaccine-preventable diseases by administering vaccines. These programs provide vaccinations for various diseases such as influenza, polio, hepatitis, and more.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-medkit fa-2x text-warning"></i> Primary Care</h4>
                        <p class="card-text text-justify flex-grow-1">Primary care services offer comprehensive and personalized healthcare for individuals and families. This includes preventive care, health screenings, treatment of common illnesses and injuries, and management of chronic conditions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-ambulance fa-2x text-info"></i> Emergency Medical Services</h4>
                        <p class="card-text text-justify flex-grow-1">Emergency medical services provide immediate medical care to individuals experiencing acute injuries or illnesses. These services include ambulance transport, emergency room treatment, and stabilization of patients in critical condition.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-tooth fa-2x text-secondary"></i> Dental Care</h4>
                        <p class="card-text text-justify flex-grow-1">Dental care services focus on maintaining oral health through preventive care, restorative treatments, and education on proper dental hygiene. These services include regular check-ups, cleanings, fillings, and extractions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-utensils fa-2x text-primary"></i> Nutrition Counseling</h4>
                        <p class="card-text text-justify flex-grow-1">Nutrition counseling services provide personalized guidance on healthy eating habits, dietary planning, and nutritional management of health conditions. These services aim to promote overall health and well-being through proper nutrition.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><i class="fas fa-brain fa-2x text-danger"></i> Mental Health Support</h4>
                        <p class="card-text text-justify flex-grow-1">Mental health support services offer counseling, therapy, and psychiatric care for individuals experiencing emotional or psychological challenges. These services aim to improve mental well-being and enhance coping skills.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                    <h4 class="card-title text-center"><i class="fas fa-user-md fa-2x text-success"></i> Reproductive Health Services</h4>
                    <p class="card-text text-justify flex-grow-1">Reproductive health services include family planning, prenatal care, sexual health screenings, and treatment of reproductive health conditions. These services promote reproductive well-being and support informed choices about reproduction.</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>


<!-- Appointment Section -->
<section id="appointment" class="bg-light-pink py-8 appointment-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 appointment-image">
                <img src="images/appointment-scheduling-solution.png" class="img-fluid rounded" style="height: 350px; width: 100%;" alt="Book Appointment Image">
            </div>
            <div class="col-md-5 appointment-content">
                <h2 class="text-black mb-4" >Book an Appointment Now!</h2>
                <p class="lead text-black">Schedule your visit with us online.</p>
                <p class="text-black">At Sta. Maria Rural Health Unit, we prioritize your health and well-being. Book an appointment with our experienced medical professionals to receive personalized care tailored to your needs.</p>
                <p class="text-black">Our online booking system makes it convenient for you to schedule your visit at your preferred date and time. Click the button below to book your appointment today!</p>
                <div class="text-left">
                    <a href="booking.php" class="btn appointment-btn text-white">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Health Education Section -->
<section id="education" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4" id="underline">Health Education</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-bg-light-gray h-100 text-center">
                    <img src="../user/images/home.png" class="card-img-top mx-auto d-block" alt="Health Education Image" style="height: 150px; width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">Family Planning</h5>
                        <p class="card-text smaller-text">Family planning services provide information, counseling, and access to contraception methods to help individuals and couples make informed decisions about family size and timing of pregnancies.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-bg-light-gray h-100 text-center">
                    <img src="../user/images/disease.png" class="card-img-top mx-auto d-block" alt="Health Education Image" style="height: 150px; width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">Prevention of Communicable and Non-Communicable Diseases</h5>
                        <p class="card-text smaller-text">This topic covers strategies for preventing the spread of communicable diseases such as flu, HIV/AIDS, and tuberculosis, as well as lifestyle changes to prevent non-communicable diseases like diabetes, heart disease, and cancer.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card card-bg-light-gray h-100 text-center">
                    <img src="../user/images/breastfeeding.png" class="card-img-top mx-auto d-block" alt="Health Education Image" style="height: 150px; width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">Breastfeeding</h5>
                        <p class="card-text smaller-text">Breastfeeding education promotes the importance of breastfeeding for the health and well-being of both infants and mothers. It covers the benefits of breastfeeding, proper breastfeeding techniques, and overcoming common challenges.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-bg-light-gray h-100 text-center">
                    <img src="../user/images/medicine.png" class="card-img-top mx-auto d-block" alt="Health Education Image" style="height: 150px; width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">National Drug Education Program</h5>
                        <p class="card-text smaller-text">The National Drug Education Program aims to raise awareness about the risks associated with drug abuse and promote healthy lifestyles. It provides information on the effects of drugs, addiction prevention, and resources for seeking help.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Events Section -->

<section id="vaccination-events" class="py-5" style="background-color: #fae3e6;">
    <div class="container">
        <h2 class="text-center mb-5" id="underline"><i class="fas fa-bullhorn"></i> Announcements</h2> 
        <div id="vaccinationEventsCarousel" class="carousel slide" data-ride="carousel">
       
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Oral Poliovirus Vaccine (OPV) Vaccination</h4>
                                    <p class="card-text">Join us for the OPV vaccination event where we provide oral poliovirus vaccine to protect against polio. Don't miss this opportunity to ensure the health and well-being of your children.</p>
                                    <p><strong>Date:</strong> April 05, 2024</p>
                                    <p><strong>Time:</strong> 9am - 11am</p>
                                    <p><strong>Location:</strong>Brgy. Samon Santa Maria</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Dog Vaccination Event</h4>
                                    <p class="card-text">Bring your furry friends to our dog vaccination event where we provide essential vaccines to protect against common diseases. Ensure the health and well-being of your beloved pets.</p>
                                    <p><strong>Date:</strong> April 06, 2024</p>
                                    <p><strong>Time:</strong> 9am - 11am</p>
                                    <p><strong>Location:</strong> Brgy. Samon Santa Maria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
    <div class="row">
        <div class="col-md-6">
            <div class="card next-event-card"> 
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Anti-Cervical Vaccination</h4>
                    <p class="card-text">Join us for our Anti-Cervical Vaccination Event where we provide essential vaccines to protect against cervical cancer. Cervical cancer is a preventable disease, and vaccination is an effective way to reduce the risk. Don't miss this opportunity to safeguard your health and well-being. Our expert healthcare professionals will be on hand to administer the vaccine and provide information about cervical cancer prevention. Together, let's take a step towards a healthier </p>
                  
                    <p><strong>Date:</strong> April 15, 2024</p>
                    <p><strong>Time:</strong> 1-3pm</p>
                    <p><strong>Location:</strong> Brgy. Samon Santa Maria</p>
                    <div class="mt-auto"></div><!-- Flexbox spacer to push content to the top -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card next-event-card"> 
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Anti-Flu Vaccination</h4>
                    <p class="card-text">Prepare for flu season by attending our Anti-Flu Vaccination Event. Influenza, or the flu, can cause serious illness and complications, especially for vulnerable populations. Our event offers flu vaccines to help protect you and your loved ones from the flu virus. By getting vaccinated, you not only safeguard your own health but also contribute to community immunity, reducing the spread of the flu. </p>
                    <p><strong>Date:</strong> April 19, 2024</p>
                    <p><strong>Time:</strong> 2-3pm</p>
                    <p><strong>Location:</strong> Brgy. Pilar Santa Maria</p>
                    <div class="mt-auto"></div><!-- Flexbox spacer to push content to the top -->
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
            <a class="carousel-control-prev" href="#vaccinationEventsCarousel" role="button" data-slide="prev" style="color: blue;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#vaccinationEventsCarousel" role="button" data-slide="next" style="color: blue;">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- FAQ -->

<section id="faq" class="bg- py-5">
    <div class="container">
        <h2 class="text-center mb-5" id="underline">Frequently Asked Questions</h2>
        <div class="row">
   
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                     Opening Hours of RHU
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    Hours: 8am - 5pm
                                    <br>Date: Monday to Saturday
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     Who is the doctor of the RHU?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    Dr. Charis Ong
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     What services are provided at the RHU?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    The RHU offers a range of services including primary healthcare, maternal and child health services, immunization, family planning, and health education.
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <img src="../user/images/stamaria.jpg" alt="Image 1" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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
