

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Medicines</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">

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
    margin-top: 90px; /* Adjusted top margin */
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

.table-warning {
    background-color: #fff3cd; /* Bootstrap's default warning color */
}

.table-success {
    background-color: #d4edda; /* Bootstrap's default success color */
}

.table-danger {
    background-color: #f8d7da; /* Bootstrap's default danger color */
}

    </style>
</head>
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
            <a class="nav-link" href="../appointments/appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../medicines/medicines.php"> Add Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../medicines/reqmedicines.php">Requests Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../events/events.php">Announcements</a>
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
        <div class=" justify-content-between align-items-center mb-3">
            <div class="row">
                <div class="col-md-6">
                <h2>| Request Medicines</h2>
                </div>
                <div class="col-md-6 text-right"> <button type="approve" class="btn btn-primary">Approve</button></div>
            </div>
        </div>


        <!-- Contact Table -->
        <table id="requestTable" class="table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Barangay</th>
                    <th>Age</th>
                    <th>Cellphone Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="requestTableBody">
           
            </tbody>
        </table>

        <!-- View Request Modal -->
<div class="modal fade" id="viewRequestModal" tabindex="-1" aria-labelledby="viewRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRequestModalLabel">Request Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="requestDetails">
                <!-- Request Details will be displayed here -->
            </div>
            
        </div>
    </div>
</div>
    </div>
</div>


<!-- Approve Request Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Approve Requests</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="approveForm">
                    <div class="form-group">
                        <label for="approverFirstName">First Name</label>
                        <input type="text" class="form-control" id="approverFirstName" name="approver_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="approverMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="approverMiddleName" name="approver_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="approverLastName">Last Name</label>
                        <input type="text" class="form-control" id="approverLastName" name="approver_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="approverPosition">Position</label>
                        <input type="text" class="form-control" id="approverPosition" name="approver_position" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
$(document).ready(function() {
    // DataTable initialization
    var table = $('#requestTable').DataTable({
        "ajax": {
            "url": "fetch_request.php",
            "type": "POST",
            "dataType": "json"
        },
        "columns": [
            {
                "data": "request_id",
                "render": function(data, type, row) {
                    return '<input type="checkbox" class="select-checkbox" value="' + data + '">';
                }
            },
            {"data": "medicine"},
            {"data": "quantity"},
            {"data": "firstname"},
            {"data": "lastname"},
            {"data": "barangay"},
            {"data": "age"},
            {"data": "cellphone"},
            {"data": "request_date"},
            {"data": "status"},
            {
                "data": null,
                "render": function(data, type, row) {
                   return '<div class="btn-group">' +
                           '<button class="btn btn-danger btn-sm delete-btn" data-id="' + row.request_id + '"><i class="bi bi-trash"></i></button>' +
                           '<button class="btn btn-info btn-sm view-btn ml-1" data-id="' + row.request_id + '"><i class="bi bi-eye"></i></button>' +
                           '</div>';
                  }
            }
        ],
        "createdRow": function(row, data, dataIndex) {
            if (data.status === 'Pending') {
                $(row).addClass('table-warning');
            } else if (data.status === 'Approved') {
                $(row).addClass('table-success');
            } else if (data.status === 'Rejected') {
                $(row).addClass('table-danger');
            }
        }
    });

    // Handle View Button Click
    $('#requestTable tbody').on('click', '.view-btn', function() {
        var requestId = $(this).data('id');
        $.ajax({
            url: 'get_request_details.php',
            type: 'POST',
            data: {request_id: requestId},
            dataType: 'json',
            success: function(response) {
    var html = `
        <p><strong>Medicine:</strong> ${response.medicine}</p>
        <p><strong>Quantity:</strong> ${response.quantity}</p>
        <p><strong>First Name:</strong> ${response.firstname}</p>
        <p><strong>Last Name:</strong> ${response.lastname}</p>
        <p><strong>Barangay:</strong> ${response.barangay}</p>
        <p><strong>Age:</strong> ${response.age}</p>
        <p><strong>Cellphone Number:</strong> ${response.cellphone}</p>
        <p><strong>Date:</strong> ${response.request_date}</p>
        <p><strong>Status:</strong> ${response.status}</p>
        <p><strong>Document Type:</strong> ${response.document_type}</p>
        <img src="${response.photo}" alt="Request Photo" style="max-width: 100%; height: auto; margin-top: 10px;">
    `;

    if (response.status === 'Approved') {
        var approverFullName = response.approver_first_name + ' ' + response.approver_middle_name + ' ' + response.approver_last_name;
        html += `
            <p><strong>Approved By:</strong> ${approverFullName}</p>
            <p><strong>Approval Date:</strong> ${response.approval_date}</p>
        `;
    }

    $('#requestDetails').html(html);
    $('#viewRequestModal').modal('show');
}

        });
    });

    // Approve Button Click
    $('button[type="approve"]').click(function() {
        var selectedRequests = [];

        $('.select-checkbox:checked').each(function() {
            selectedRequests.push($(this).val());
        });

        if (selectedRequests.length > 0) {
            $('#approveModal').modal('show');
        } else {
            Swal.fire('No Requests Selected', 'Please select at least one request to approve.', 'warning');
        }
    });

   // Handle Delete Button Click
$('#requestTable tbody').on('click', '.delete-btn', function() {
    var row = $(this).closest('tr'); // Get the closest row of the clicked delete button
    var requestId = $(this).data('id');
    
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this request.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to delete request
            $.ajax({
                url: 'delete_request.php',
                type: 'POST',
                data: { request_id: requestId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        row.remove(); // Remove the row from DataTable
                        Swal.fire('Deleted!', response.message, 'success');
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Failed to delete request due to an internal error.', 'error');
                }
            });
        }
    });
});



    // Handle Approve Form Submission
    $('#approveForm').submit(function(event) {
        event.preventDefault();

        var approverFirstName = $('#approverFirstName').val();
        var approverMiddleName = $('#approverMiddleName').val();
        var approverLastName = $('#approverLastName').val();
        var approverPosition = $('#approverPosition').val();
        var selectedRequests = [];

        $('.select-checkbox:checked').each(function() {
            selectedRequests.push($(this).val());
        });

        $.ajax({
            url: 'approve_request.php',
            type: 'POST',
            data: {
                selected_requests: selectedRequests,
                approver_first_name: approverFirstName,
                approver_middle_name: approverMiddleName,
                approver_last_name: approverLastName,
                approver_position: approverPosition
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#approveModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire('Success', 'Requests approved successfully.', 'success');
                } else {
                    Swal.fire('Error', 'Failed to approve requests. Please try again.', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Failed to approve requests due to an internal error. Please try again.', 'error');
            }
        });
    });
});

    



</script>

</body>
</html>