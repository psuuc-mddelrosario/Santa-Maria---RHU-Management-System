<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
         /* Add custom styles here */
 .navbar {
    background-color: #4d030c;
    color: white; /* White text */
    position: fixed;
    width: 100%;
    z-index: 1000; /* Ensure it's above other elements */
    top: 0;
    left: 0;
}
.navbar-brand {
    font-size: 24px;
    padding: 15px 20px; /* Adjust padding as needed */
}
.sidebar {
    height: calc(100vh - 56px); /* Adjusted for navbar height */
    width: 250px;
    position: fixed;
    top: 56px; /* Adjusted for navbar height */
    left: 0;
    background-color: #4d030c;
    padding-top: 20px;
    z-index: 999; /* Ensure it's below navbar */
    overflow-y: auto; /* Add scroll if needed */
}
.main-content {
    margin-top: 120px; /* Adjusted top margin */
    padding: 20px;
    margin-left: 280px; /* Adjusted left margin for centering */
}
.nav-link {
    color: #fff; /* White text */
}
.nav-link:hover, .nav-link.active {
            color: #4CAF50; /* Green text on hover and when active */
        }
.table {
    width: 100%;
}
.dataTables_wrapper {
    width: 100%;
}
.dataTables_filter {
    float: right;
}
.table th,
.table td {
    text-align: center;
}
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <span class="navbar-brand">Sta. Maria RHU Admin</span>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="../dashboard.php">Main Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../appointments/appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../medicines/medicines.php">Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../events/events.php">Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../messages/messages.php">Messages</a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>| Messages</h2>
        </div>

        <!-- Contact Table -->
        <table id="contactTable" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                <!-- Contact table rows will be added dynamically here -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    // Initialize DataTables on the contact table
    var dataTable = $('#contactTable').DataTable({
        "ajax": {
            "url": "fetchmessages.php",
            "error": function(xhr, error, thrown) {
                console.log("AJAX Error:", error);
                console.log("AJAX Thrown Error:", thrown);
            }
        },
        "columns": [
            { "data": "fullname" },
            { "data": "emailaddress" },
            { "data": "message" }
        ]
    });

    // Enable search functionality
    $('#searchInput').on('keyup', function() {
        dataTable.search(this.value).draw();
    });
});
</script>

</body>
</html>
