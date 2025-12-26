<?php
require_once 'conn.php';

session_start(); 

$sql = "SELECT availability FROM doctors WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentAvailability = $row['availability'];
} else {
    $currentAvailability = 'in';
}

$sql = "SELECT COUNT(*) AS totalAppointments FROM appointment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAppointments = $row['totalAppointments'];
} else {
    $totalAppointments = 0;
}

$sql = "SELECT COUNT(*) AS totalMedicines FROM medicine";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalMedicines = $row['totalMedicines'];
} else {
    $totalMedicines = 0;
}

$sql = "SELECT COUNT(*) AS totalEvents FROM events WHERE eventDate >= CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalEvents = $row['totalEvents'];
} else {
    $totalEvents = 0;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #4d030c;
            color: white;
        }
        .navbar-brand {
            font-size: 24px;
            padding: 15px 20px;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;  /* Changed from 56px to 0 */
            left: 0;
            background-color: #4d030c;
            padding-top: 20px;
            overflow-y: auto;
            }

        .main-content {
            margin-left: 250px;
            margin-top: 20px;
            padding: 50px;
        }
        .nav-link {
            color: #fff;
        }
        .nav-link:hover, .nav-link.active {
            color: #4CAF50;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
            background-color: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #4d030c;
            font-size: 1.2rem;
            margin-bottom: 15px;
            text-align: center;
        }

        .card-text {
            color: #333;
            font-size: 2rem;
            text-align: center;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Image at the top of the sidebar -->
    <img src="../user/images/logo.png" alt="Dashboard Image" width="200" height="60" class="mx-auto d-block mt-3 mb-3">

    <ul class="nav flex-column">
        <li class="nav-item">
        <hr style="border-top: 1px solid rgba(255,255,255,0.3);">
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="appointments/appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="medicines/medicines.php"> Add Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="medicines/reqmedicines.php">Requests Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="events/events.php">Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="messages/messages.php">Messages</a>
        </li>
    </ul>
    <hr style="border-top: 1px solid rgba(255,255,255,0.3);">
    <a class="nav-link mt-auto" href="index.php" style="color: white;">Logout</a>
    
</div>



<div class="container mt-4 main-content">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to Sta. Maria Rural Health Unit System Dashboard!</h1>
                <p class="lead">Manage appointments, medications, events, and more.</p>
                <hr class="my-4">
                <p>Explore the menu on the left to get started.</p>
            </div>
        </div>
    </div>
 
<center>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Doctor's Availability</h5>
                    <div id="notification"></div>
                    <div class="form-group">
                        <label for="availabilitySelect">The Doctor is:</label>
                        <select class="form-control" id="availabilitySelect" name="availability">
                            <option value="in" <?php echo ($currentAvailability === 'in') ? 'selected' : ''; ?>>In</option>
                            <option value="out" <?php echo ($currentAvailability === 'out') ? 'selected' : ''; ?>>Out</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" id="updateAvailabilityBtn" class="btn btn-primary">Update Availability</button>
                    </div>
                </div>
            </div>
        </div>
    </center>




    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text"><?php echo $totalAppointments; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Medicines Available</h5>
                    <p class="card-text"><?php echo $totalMedicines; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Events</h5>
                    <p class="card-text"><?php echo $totalEvents; ?></p>
                </div>
            </div>
        </div>
    </div>

    

    <div class="row">
        <div class="col-md-4">
            <canvas id="appointmentsChart" width="400" height="200"></canvas>
        </div>

        <div class="col-md-4">
            <canvas id="medicinesChart" width="400" height="200"></canvas>
        </div>

        <div class="col-md-4">
            <canvas id="eventsChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        fetchChartData();
    });

    $(document).ready(function() {
    fetchChartData();
    
    $('#updateAvailabilityBtn').click(function() {
        const availability = $('#availabilitySelect').val();
        
        $.ajax({
            type: 'POST',
            url: 'update_availability.php',
            data: { availability: availability },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        // Optionally update the currentAvailability variable
                        currentAvailability = availability;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error updating availability',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });
    
});


    function fetchChartData() {
        $.ajax({
            type: 'GET',
            url: 'fetch_chart_data.php',
            success: function(data) {
                updateCharts(data);
            },
            error: function() {
                console.error('Error fetching chart data');
            }
        });
    }

    function updateCharts(data) {
    var appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
    var appointmentsChart = new Chart(appointmentsCtx, {
        type: 'bar',
        data: {
            labels: ['Total Appointments'],
            datasets: [{
                label: 'Appointments',
                data: [data.appointments.totalAppointments],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });

    var medicinesCtx = document.getElementById('medicinesChart').getContext('2d');
    var medicinesChart = new Chart(medicinesCtx, {
        type: 'bar',
        data: {
            labels: ['Medicines Available'],
            datasets: [{
                label: 'Medicines',
                data: [data.medicines.totalMedicines],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        }
    });

    var eventsCtx = document.getElementById('eventsChart').getContext('2d');
    var eventsChart = new Chart(eventsCtx, {
        type: 'bar',
        data: {
            labels: ['Upcoming Events'],
            datasets: [{
                label: 'Events',
                data: [data.events.totalEvents],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });
}
</script>
</body>
</html>
