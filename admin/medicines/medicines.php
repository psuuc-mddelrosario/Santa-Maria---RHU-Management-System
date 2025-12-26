<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .card {
            width: 100%; /* Adjust the width as needed */
            height: 200px; /* Adjust the height as needed */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            cursor: pointer; /* Change cursor to pointer */
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .card-title {
            color: white;
        }
        .card-appointment {
            background-color: #007bff; /* Blue color */
        }
        .card-events {
            background-color: #28a745; /* Green color */
        }
        .card-messages {
            background-color: #dc3545; /* Red color */
        }
        .card-medicines {
            background-color: #ffc107; /* Yellow color */
        }
        .card a:hover {
            text-decoration: none;
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
            <a class="nav-link active" href="../medicines/medicines.php"> Add Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../medicines/reqmedicines.php">Requests Medicines</a>
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
        <div class="justify-content-between align-items-center mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h2>| Medicines</h2>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMedicineModal">Add Medicine</button>
                </div>
            </div>
        </div>  


         <!-- Medicines Table -->
         <table id="medicineTable" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Manufacturing Date</th>
                    <th>Expiration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="medicineTableBody">
           
            </tbody>
        </table>


<!-- Add Medicine Modal -->
<div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addMedicineForm">
                    <div class="form-group">
                        <label for="medicineName">Medicine Name:</label>
                        <input type="text" class="form-control" id="medicineName" name="medicineName" placeholder="Enter medicine name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label for="expirationDate">Expiration Date:</label>
                        <input type="date" class="form-control" id="expirationDate" name="expirationDate" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="manufacturingDate">Manufacturing Date:</label>
                        <input type="date" class="form-control" id="manufacturingDate" name="manufacturingDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Medicine</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Medicine Modal -->
<div class="modal fade" id="editMedicineModal" tabindex="-1" role="dialog" aria-labelledby="editMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMedicineModalLabel">Edit Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMedicineForm">
                    <div class="form-group">
                        <label for="editMedicineName">Medicine Name:</label>
                        <input type="text" class="form-control" id="editMedicineName" name="editMedicineName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description:</label>
                        <input type="text" class="form-control" id="editDescription" name="editDescription" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" class="form-control" id="editQuantity" name="editQuantity">
                        <!-- Add hidden input field for medicine ID -->
                        <input type="hidden" id="editMedicineId" name="editMedicineId">
                    </div>
                    <div class="form-group">
                        <label for="editExpirationDate">Expiration Date:</label>
                        <input type="date" class="form-control" id="editExpirationDate" name="editExpirationDate" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editManufacturingDate">Manufacturing Date:</label>
                        <input type="date" class="form-control" id="editManufacturingDate" name="editManufacturingDate" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
    // DataTable initialization for Medicines
  var table = $('#medicineTable').DataTable({
    "ajax": {
        "url": "fetch_medicines.php",
        "type": "POST",
        "dataType": "json",
        "dataSrc": function(response) {
            console.log("Raw AJAX response:", response);
            
            if(response && response.data) {
                return response.data;
            } else {
                console.error("Unexpected AJAX response format:", response);
                return [];
            }
        }
    },
    "columns": [
        {"data": "medicinename"},
        {"data": "quantity"},
        {"data": "description"},
        {"data": "manufacturingdate"},
        {"data": "expirationdate"},
        {
            "data": null,
            "render": function(data, type, row) {
                return '<div class="btn-group">' +
                       '<button class="btn btn-info btn-sm edit-btn" data-id="' + row.id + '"><i class="bi bi-pencil"></i></button>' +
                       '<button class="btn btn-danger btn-sm delete-btn ml-1" data-id="' + row.id + '"><i class="bi bi-trash"></i></button>' +
                       '</div>';
            }
        }
    ],
    "error": function(xhr, error, thrown) {
        console.error("DataTables error:", error, thrown);
    }
});


        // Handle form submission
        $('#addMedicineForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'insert_medicines.php',
                data: $('#addMedicineForm').serialize(),
                success: function(response){
                    alert(response);
                    // Reload page after adding medicine
                    location.reload();
                },
                error: function(xhr, status, error){
                    alert('Error: ' + error);
                }
            });
        });

        $('#medicineTable').on('click', '.delete-btn', function(){

            var id = $(this).data('id');
            // Implement AJAX call to delete medicine with given ID and reload page
            $.ajax({
                type: 'POST',
                url: 'delete_medicine.php',
                data: { id: id },
                success: function(response){
                    alert(response);
                    location.reload();
                },
                error: function(xhr, status, error){
                    alert('Error: ' + error);
                }
            });
        });

 // Handle edit quantity button click
 $('#medicineTable').on('click', '.edit-btn', function(){

    var id = $(this).data('id');
    // Fetch the medicine's information using AJAX
    $.ajax({
        type: 'GET',
        url: 'update_quantity_get.php?id=' + id, // Use update_quantity_get.php for GET request
        dataType: 'json',
        success: function(response){
            // Check if response is not empty
            if(response !== null && Object.keys(response).length > 0) {
                // Populate the fields in the edit modal with medicine information
                $('#editMedicineId').val(id); // Set the medicine ID in the hidden input field
                $('#editMedicineName').val(response.medicinename);
                $('#editDescription').val(response.description);
                $('#editQuantity').val(response.quantity);
                $('#editExpirationDate').val(response.expirationdate);
                $('#editManufacturingDate').val(response.manufacturingdate);
                // Show the edit medicine modal
                $('#editMedicineModal').modal('show');
            } else {
                alert('Medicine details not found.');
            }
        },
        error: function(xhr, status, error){
            alert('Error: ' + error);
        }
    });
});

// Handle form submission for editing quantity
$('#editMedicineForm').submit(function(e){
    e.preventDefault();
    var id = $(this).find('#editMedicineId').val(); // Get the medicine ID from the form
    var newQuantity = $(this).find('#editQuantity').val(); // Get the new quantity from the form
    // Send a POST request to update the quantity
    $.ajax({
        type: 'POST',
        url: 'update_quantity_post.php', // Use update_quantity_post.php for POST request
        data: { id: id, quantity: newQuantity }, // Pass both ID and new quantity in the data
        dataType: 'json',
        success: function(response){
            if(response.status === 'success') {
                alert('Quantity updated successfully');
                // Reload the page or update the table if needed
                location.reload();
            } else {
                alert('Error updating quantity: ' + response.message);
            }
        },
        error: function(xhr, status, error){
            alert('Error: ' + error);
        }
    });
});
    });
</script>

</body>
</html>
