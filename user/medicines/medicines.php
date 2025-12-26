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
        .card {
            border: 1px solid #dee2e6; /* Add border to card */
            border-radius: 5px; /* Optional: Add border radius for rounded corners */
        }
    </style>
</head>
<body>
   <!-- Navigation -->
  
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
<!-- Main Content -->

<div class="container mt-5 ">
<h1 class="text-center mb-5" id="underline">Available Medicines</h1>
    <div class="row" id="medicineContainer">
        <!-- Medicine cards will be dynamically added here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    function fetchMedicine() {
        $.ajax({
            url: 'fetchmedicines.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // Log the response data to the console
                $('#medicineContainer').empty();
                $.each(response, function(index, medicine) {
                    var card = $('<div class="col-md-4 mb-4"><div class="card"><div class="card-body"><h5 class="card-title">Medicine Name: ' + medicine.medicinename + '</h5><p class="card-text">Description: ' + medicine.description + '</p><p class="card-text">Quantity: ' + medicine.quantity + '</p><p class="card-text">Expiration Date: ' + medicine.expirationdate + '</p><p class="card-text">Manufacturing Date: ' + medicine.manufacturingdate + '</p></div></div></div>');

                    // Add event listener for click event
                    card.on('click', function() {
                        // Redirect to another page with detailed information
                        window.location.href = 'medicine_details.php?medicine_id=' + medicine.id;
                    });

                    $('#medicineContainer').append(card);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while fetching the available medicines. Please try again.');
            }
        });
    }

    fetchMedicine();

    setInterval(function() {
        fetchMedicine();
    }, 3000);
});
</script>

</body>
</html>
