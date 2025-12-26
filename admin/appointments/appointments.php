<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    /* Add custom styles here */
    body {
        padding-top: 56px; /* Adjust for navbar height */
        padding-left: 250px; /* Adjust for sidebar width */
    }
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
        /* Adjusted top margin */
        padding: 20px;
    }
    .nav-link {
        color: #fff; /* White text */
    }
    .nav-link:hover, .nav-link.active {
        color: #4CAF50; /* Green text on hover and when active */
    }
    .container {
        margin-top: 10px; /* Adjust top margin */
    }
    .table-responsive {
        overflow-x: auto; /* Enable horizontal scrolling for smaller screens */
    }
    th:first-child,
    td:first-child {
        width: 40px;
        text-align: center; 
        position: relative;
    }
    td:first-child input[type="checkbox"] {
        position: absolute;
    }
</style>
<body>


<!-- Sidebar -->
<div class="sidebar">
    <!-- Image at the top of the sidebar -->
    <img src="../images/logo.png" alt="Dashboard Image" width="200" height="60" class="mx-auto d-block mt-3 mb-3">

    <ul class="nav flex-column">
        <li class="nav-item">
        <hr style="border-top: 1px solid rgba(255,255,255,0.3);">
            <a class="nav-link" href="../dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="appointments/appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../medicines/medicines.php"> Add Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../medicines/reqmedicines.php">Requests Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../events/events.php">Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../messages/messages.php">Messages</a>
        </li>
    </ul>
    <hr style="border-top: 1px solid rgba(255,255,255,0.3);">
    <a class="nav-link mt-auto" href="index.php" style="color: white;">Logout</a>
    
</div>



<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="justify-content-between align-items-center mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h2>| Appointments</h2>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-primary" onclick="deleteSelected()">Delete Selected</button>
                </div>
            </div>
        </div>

        <!-- Appointments Table -->
        <table id="appointmentsTable" class="table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="appointmentsTableBody">
                <!-- Data will be populated here -->
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="viewAppointmentModal" tabindex="-1" aria-labelledby="viewAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAppointmentModalLabel">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="appointmentDetails">
                <!-- Appointment Details will be displayed here -->
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function() {
        const appointmentsTable = $('#appointmentsTable').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "order": [
                [1, 'asc']
            ],
            "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                },
                {
                    "searchable": false,
                    "targets": 0
                }
            ]
        });

        function populateTable(data) {
            appointmentsTable.clear().draw();
            data.forEach(appointment => {
                const row = [
                    `<input type="checkbox" class="form-check-input" value="${appointment.id}">`,
         
                    appointment.firstname,
                    appointment.lastname,
                    appointment.email,
                    appointment.sex,
                    appointment.service,
                    appointment.date,
                    appointment.status,
                    appointment.status !== 'Approved' && appointment.status !== 'Rejected' ?
                `<div class="d-flex">
                    <button class="btn btn-success btn-sm mr-2" onclick="approveAppointment(${appointment.id})"><i class="bi bi-check-circle"></i></button>
                    <button class="btn btn-danger btn-sm mr-2" onclick="rejectAppointment(${appointment.id})"><i class="bi bi-x-circle"></i></button>
                    <button class="btn btn-info btn-sm view-btn" data-id="${appointment.id}"><i class="bi bi-eye"></i></button>

                 </div>` :
                ''
        ];
                appointmentsTable.row.add(row).draw();
            });
        }

        function fetchAppointments() {
            $.ajax({
                type: 'POST',
                url: 'fetch_appointments.php',
                dataType: 'json',
                success: function(data) {
                    if (data && data.length > 0) {
                        populateTable(data);
                    } else {
                        appointmentsTable.clear().draw();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while fetching appointments. Please try again.");
                }
            });
        }

        fetchAppointments();
        setInterval(fetchAppointments, 5000);

        $('#searchInput').on('input', function() {
            const searchText = $(this).val().toLowerCase();
            appointmentsTable.search(searchText).draw();
        });
    });

      // Handle View Button Click
      $('#appointmentsTable tbody').on('click', '.view-btn', function() {
        var appointmentId = $(this).closest('tr').find('input[type="checkbox"]').val();
        
        $.ajax({
            url: 'get_appointment_details.php',
            type: 'POST',
            data: {id: appointmentId},  // Changed to match the PHP script
            dataType: 'json',
            success: function(response) {
                if(response.html) {
                    $('#appointmentDetails').html(response.html);
                    $('#viewAppointmentModal').modal('show');
                } else if(response.error) {
                    alert(response.error);  // Display the error message
                } else {
                    alert('Unknown response from server');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred while fetching appointment details. Please try again.");
            }
        });
    });

    function deleteSelected() {
        var selectedIds = [];
        $('#appointmentsTable tbody input:checked').each(function() {
            selectedIds.push($(this).val());
        });
        if (selectedIds.length === 0) {
            alert('Please select rows to delete.');
            return;
        }
        if (confirm('Are you sure you want to delete the selected rows?')) {
            $.ajax({
                type: 'POST',
                url: 'delete_selected.php',
                data: { ids: selectedIds },
                success: function(response) {
                    if (response && response.trim() === 'success') {
                        alert('Selected rows deleted successfully.');
                    } else {
                        alert('Failed to delete selected rows. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while deleting selected rows. Please try again.');
                }
            });
        }
    }
    


    
    function approveAppointment(appointmentId) {
    $.ajax({
        type: 'POST',
        url: 'approveappointment.php',
        data: { id: appointmentId },
        success: function(response) {
            if (response === 'success') {
                // Update the status cell for the selected appointment
                var row = $('#appointmentsTable tbody').find('input[value="' + appointmentId + '"]').closest('tr');
                row.find('td:nth-child(12)').text('Approved'); // Update status cell (12th column)
                alert('Appointment approved successfully.');
            } else {
                alert('Failed to approve appointment. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while approving the appointment. Please try again.');
        }
    });
}


function rejectAppointment(appointmentId) {
    $.ajax({
        type: 'POST',
        url: 'rejectappointment.php',
        data: { id: appointmentId },
        success: function(response) {
            if (response === 'success') {
                // Update the status cell for the selected appointment
                var row = $('#appointmentsTable tbody').find('input[value="' + appointmentId + '"]').closest('tr');
                row.find('td:nth-child(12)').text('Rejected'); // Update status cell (12th column)
                alert('Appointment rejected.');
            } else {
                alert('Failed to reject appointment. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while rejecting the appointment. Please try again.');
        }
    });
}





</script>
</body>
</html>
