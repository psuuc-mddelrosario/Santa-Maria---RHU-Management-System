<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rural Health Unit</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css">
    <style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: scale(1.03);
    }
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }
    .card-body {
        padding: 20px;
        background-color: #ffffff;
    }
    .card-title {
        margin-bottom: 15px;
        font-weight: bold;
        color: #333333;
    }
    .card-text {
        color: #666666;
    }
    .event-status {
        font-size: 20px;
        font-weight: bold;
        color: red;
        margin-top: 10px;
    }
</style>


</head>
<body>
  
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
<div class="container mt-5">
    <h1 class="text-center mb-5" id="underline">Announcements</h1>
    <div class="row" id="eventsContainer">
        <!-- Event cards will be dynamically added here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function() {
    function fetchEvents() {
        $.ajax({
            url: 'fetch_events.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#eventsContainer').empty();
                
                var currentDate = new Date();
                var ongoingEvents = [];
                var endedEvents = [];
                
                $.each(response, function(index, event) {
                    var endDate = new Date(event.endeventDate);
                    var eventStatus = endDate < currentDate ? "<p class='event-status'>Event Ended</p>" : ""; // Check if the event has ended
                    var card = $('<div class="col-md-4 mb-4"><div class="card"><img src="' + event.eventImage + '" class="card-img-top" alt="Event Image"><div class="card-body"><h5 class="card-title">Event Title: ' + event.eventTitle + '</h5><p class="card-text">Event Description: ' + event.eventDescription + '</p><p class="card-text">Event Date: ' + event.eventDate + '</p><p class="card-text">End Date: ' + event.endeventDate + '</p>' + eventStatus + '</div></div></div>');
                    
                    // Separate events into ongoing and ended based on end date
                    if (endDate < currentDate) {
                        endedEvents.push(card);
                    } else {
                        ongoingEvents.push(card);
                    }
                });
                
                // Append ongoing events first
                $('#eventsContainer').append(ongoingEvents);
                
                // Append ended events at the end
                $('#eventsContainer').append(endedEvents);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while fetching events. Please try again.');
            }
        });
    }

    fetchEvents();

});

</script>

</body>
</html>
