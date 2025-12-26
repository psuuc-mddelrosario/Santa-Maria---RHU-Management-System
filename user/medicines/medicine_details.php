<?php
// Include the database connection file
include '../conn.php';

// Function to fetch detailed information about the medicine from the database
function getMedicineDetails($medicine_id, $conn) {
    // Fetch medicine details based on medicine_id
    $sql = "SELECT * FROM medicine WHERE id = $medicine_id";
    $result = $conn->query($sql);

    // Check if result contains any rows
    if ($result->num_rows > 0) {
        // Fetch the first row (assuming medicine_id is unique)
        $row = $result->fetch_assoc();
        // Return medicine details as an associative array
        return $row;
    } else {
        // If medicine details are not found, return false
        return false;
    }
}

// Check if medicine_id is provided in the query parameter
if (isset($_GET['medicine_id'])) {
    // Get medicine_id from the query parameter
    $medicine_id = $_GET['medicine_id'];

    // Call getMedicineDetails function
    $medicine_details = getMedicineDetails($medicine_id, $conn);

    if ($medicine_details) {
        // Display medicine details
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-request {
        background-color:  #6c1515; /* Dark red background color */
        border-color: #390606; /* Dark red border color */
    }
   

    .btn-request:hover {
        background-color: #390606; /* Dark red background color on hover */
        border-color: #6c1515; /* Dark red border color on hover */
    }
    </style>
</head>
<body>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark p" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container-fluid">
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
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6"> 
            <h2 class="text-left mb-4">| Medicine Details</h2>
        </div>
        <div class="col-md-6 text-right">   
        <a href="modal.php" class="btn btn-request text-white" data-toggle="modal" data-target="#requestMedicineModal">+ Request Medicine</a>

        </div>
    </div>

    <!-- Medicine Details Card -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Medicine Name: <?php echo $medicine_details['medicinename']; ?></h5>
            <p class="card-text">Description: <?php echo $medicine_details['description']; ?></p>
            <p class="card-text">Quantity: <?php echo $medicine_details['quantity']; ?></p>
            <p class="card-text">Expiration Date: <?php echo $medicine_details['expirationdate']; ?></p>
            <p class="card-text">Manufacturing Date: <?php echo $medicine_details['manufacturingdate']; ?></p>
        </div>
    </div>
</div>

  <!-- Request Medicine Modal -->
  <div class="modal fade" id="requestMedicineModal" tabindex="-1" role="dialog" aria-labelledby="requestMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg class here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestMedicineModalLabel">Request Medicine (<?php echo $medicine_details['medicinename']; ?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Request Medicine Form -->
                <form action="submit_request.php"   id="medicineRequestForm"  method="post"  enctype="multipart/form-data">
                <input type="hidden" name="medicinename" value="<?php echo $medicine_details['medicinename']; ?>">

                    <div class="form-group row">
                           <!-- First Name -->
                           <div class="col-md-4">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <!-- Middle Name -->
                        <div class="col-md-4">
                            <label for="middlename">Middle Name (Optional)</label>
                            <input type="text" class="form-control" id="middlename" name="middlename">
                        </div>
                        <!-- Last Name -->
                        <div class="col-md-4">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                     
                    </div>
                    <div class="form-group">
                    <label for="quantity">Quantity (Maximum of 10 pcs.)</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                    <span id="quantityError" class="text-danger"></span> <!-- Error message placeholder -->
                     </div>
                    <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <select class="form-control" id="barangay" name="barangay" required>
                        <option value="">Select Barangay</option>
                        <option value="Bal-loy">Bal-loy</option>
                        <option value="Bantog">Bantog</option>
                        <option value="Caboluan">Caboluan</option>
                        <option value="Cal-litang">Cal-litang</option>
                        <option value="Capandanan">Capandanan</option>
                        <option value="Cauplasan">Cauplasan</option>
                        <option value="Dalayap">Dalayap</option>
                        <option value="Libsong">Libsong</option>
                        <option value="Namagbagan">Namagbagan</option>
                        <option value="Paitan">Paitan</option>
                        <option value="Pataquid">Pataquid</option>
                        <option value="Pilar">Pilar</option>
                        <option value="Poblacion East">Poblacion East</option>
                        <option value="Poblacion West">Poblacion West</option>
                        <option value="Pugot">Pugot</option>
                        <option value="Samon">Samon</option>
                        <option value="San Alejandro">San Alejandro</option>
                        <option value="San Mariano">San Mariano</option>
                        <option value="San Pablo">San Pablo</option>
                        <option value="San Patricio">San Patricio</option>
                        <option value="San Vicente">San Vicente</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Santa Rosa">Santa Rosa</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="age">Age (Must be 18 or above)</label>
                <input type="number" class="form-control" id="age" name="age" min="18" required>
                <span id="ageErrorr" class="text-danger"></span>
                </div>

          <!-- Cellphone Number -->
            <div class="form-group">
                <label for="cellphone">Cellphone Number</label>
                <input type="tel" class="form-control" id="cellphone" name="cellphone" pattern="639[0-9]{9}" placeholder="639XXXXXXXXX" required>
                <small class="form-text text-muted">Format: 639XXXXXXXXX</small>
            </div>

                    <div class="form-group">
                    <label for="photo">Upload Photo (Max 5MB)</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required maxlength="5000000">
                    <span id="photoError" class="text-danger"></span> <!-- Error message placeholder -->
                </div>
                    <div class="form-group">
                        <label>Choose your type of Legal Identity Document</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="umid" value="SSS Unified Multi-Purpose ID (UMID)">
                                <label class="form-check-label" for="umid">SSS Unified Multi-Purpose ID (UMID)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="driversLicense" value="Driver's License">
                                <label class="form-check-label" for="driversLicense">Driver's License</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="passport" value="Passport">
                                <label class="form-check-label" for="passport">Passport</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="philID" value="Philippine Identification (PhilID / ePhilID)">
                                <label class="form-check-label" for="philID">Philippine Identification (PhilID / ePhilID)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="philHealthID" value="PhilHealth ID">
                                <label class="form-check-label" for="philHealthID">PhilHealth ID</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="postalID" value="Postal ID">
                                <label class="form-check-label" for="postalID">Postal ID</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="votersID" value="Voter's ID">
                                <label class="form-check-label" for="votersID">Voter's ID</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="residencyCertificate" value="Certificate of Residency">
                                <label class="form-check-label" for="residencyCertificate">Certificate of Residency</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="nationalID" value="National ID">
                                <label class="form-check-label" for="nationalID">National ID</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="identityDocument" id="birthCertificate" value="Birth Certificate">
                                <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitRequestBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
    $('#requestMedicineBtn').click(function() {
        $('#requestMedicineModal').modal('show');
    });

    $('#medicineRequestForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData($(this)[0]); // Create FormData object from form

        // Client-side validation for photo file size
        var fileSize = $('#photo')[0].files[0] ? $('#photo')[0].files[0].size : 0; // Check if file exists
        var maxSize = 5 * 1024 * 1024; // 5MB in bytes

        if (fileSize > maxSize) {
            $('#photoError').text('Please upload a photo less than 5MB.'); 
            return; // Stop further execution
        }

        var quantity = $('#quantity').val();

        if (quantity <= 0 || quantity > 10) {
            $('#quantityError').text('Please enter a quantity between 1 and 10.'); 
            return;
        }

        var age = $('#age').val();

        if (age < 18) {
            $('#ageError').text('Age must be 18 or above.'); 
            return;
        }

        // Submit the form via AJAX
        $.ajax({
            url: 'submit_request.php',
            method: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Your request has been submitted successfully.',
                        onClose: () => {
                            location.reload(); 
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again later.',
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                });
            }
        });
    });

    // Reset error messages
    $('#photo').change(function() {
        $('#photoError').text(''); 
    });

    $('#age').change(function() {
        $('#ageError').text(''); 
    });
});

</script>
</body>
</html>
<?php
    } else {
        // If medicine details are not found, display an error message
        echo "Medicine details not found.";
    }
} else {
    // If medicine_id is not provided in the query parameter, display an error message
    echo "Medicine ID is missing.";
}

// Close the database connection
$conn->close();
?>
