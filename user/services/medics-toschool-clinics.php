<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Health and Nutrition Services</title>
    <link rel="stylesheet" href="../home.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        .service {
            background-color: #fff; /* White service background */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
            display: flex; /* Use flexbox layout */
            align-items: center; /* Center vertically */
        }
        .service-image {
            margin-right: 20px; /* Spacing between image and content */
            width: 100px; /* Default width */
            height: auto; /* Maintain aspect ratio */
        }
        .service h3 {
            margin-bottom: 10px;
            color: #343a40; /* Dark gray text color */
            font-size: 1.2rem; /* Adjust the font size as needed */
        }
        .service p {
            color: #6c757d; /* Medium gray text color */
        }
        p{
            color: black;
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
            <h2 class="text-center" id="underline">School Health and Nutrition Services</h2>
            <p>To help promote and provide Filipino learners with sustainable holistic school health and nutrition programs toward healthier behavior and better learning outcomes.</p>
            <div class="service">
                <img src="../images/immune-system.png" alt="Service Image" class="service-image"> <!-- Change "image1.jpg" to your image URL -->
                <div>
                    <h3>School-Based Immunization (SBI)</h3>
                    <p>Providing immunization services to students within school premises to protect them from preventable diseases.</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/diet.png" alt="Service Image" class="service-image"> <!-- Change "image2.jpg" to your image URL -->
                <div>
                    <h3>School-Based Feeding Program (SBFP)</h3>
                    <p>Implementing feeding programs in schools to address malnutrition and improve students' health and academic performance.</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/pills.png" alt="Service Image" class="service-image"> <!-- Change "image3.jpg" to your image URL -->
                <div>
                    <h3>National Drug Education Program (NDEP)</h3>
                    <p>Delivering education and awareness programs in schools to prevent substance abuse and promote healthy lifestyle choices.</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/reproductive-health.png" alt="Service Image" class="service-image"> <!-- Change "image4.jpg" to your image URL -->
                <div>
                    <h3>Adolescent Reproductive Health Education (ARH)</h3>
                    <p>Offering education and counseling services to students on reproductive health, family planning, and sexually transmitted infections (STIs).</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/plumbing.png" alt="Service Image" class="service-image"> <!-- Change "image5.jpg" to your image URL -->
                <div>
                    <h3>Water, Sanitation, and Hygiene in Schools (WinS)</h3>
                    <p>Implementing initiatives to improve access to clean water, proper sanitation facilities, and hygiene practices in schools to prevent diseases.</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/tooth.png" alt="Service Image" class="service-image"> <!-- Change "image6.jpg" to your image URL -->
                <div>
                    <h3>Medical, Dental, and Nursing Services</h3>
                    <p>Providing medical, dental, and nursing care to students within school premises to address their healthcare needs.</p>
                </div>
            </div>
            <div class="service">
                <img src="../images/mental-health.png" alt="Service Image" class="service-image"> <!-- Change "image7.jpg" to your image URL -->
                <div>
                    <h3>School Mental Health Program</h3>
                    <p>Establishing programs and services to support the mental health and well-being of students, including counseling and mental health awareness activities.</p>
                </div>
            </div>
        </section>
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
