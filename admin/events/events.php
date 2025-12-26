<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array(); 

    $required_fields = array('eventTitle', 'eventDescription', 'eventDate', 'endEventDate');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . " is required";
        }
    }

    if (empty($errors)) {
        // Directory path for storing uploaded images
        $target_dir = "../uploads/";

        // Check if the target directory exists, if not, create it
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Create directory recursively with full permissions
        }

        // Check if file was uploaded without errors
        if(isset($_FILES["eventImage"]) && $_FILES["eventImage"]["error"] == 0){
            $target_file = $target_dir . basename($_FILES["eventImage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newFileName = uniqid() . '.' . $imageFileType;

            // Check file size (adjust the limit as needed)
            if ($_FILES["eventImage"]["size"] > 5000000) {
                $errors[] = "Sorry, your file is too large.";
            }
            // Allow certain file formats
            elseif(!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
                $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
           // Upload file
elseif (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $target_dir . $_FILES["eventImage"]["name"])) {
    // File uploaded successfully, now insert into database
    $title = $_POST['eventTitle'];
    $description = $_POST['eventDescription'];
    $date = $_POST['eventDate'];
    $endDate = $_POST['endEventDate'];
    $imagePath = $target_dir . $_FILES["eventImage"]["name"];

    $sql = "INSERT INTO events (eventTitle, eventDescription, eventDate, endEventDate, eventImage) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $title, $description, $date, $endDate, $imagePath);

    if ($stmt->execute()) {
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } else {
        $errors[] = "Error: " . $conn->error;
    }

    $stmt->close();
}else {
                $errors[] = "Sorry, there was an error uploading your file.";
            }
        }
        else {
            $errors[] = "No file uploaded.";
        }
    }

    if (!empty($errors)) {
        $response = array("success" => false, "error" => implode("<br>", $errors));
        echo json_encode($response);
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar {
            background-color: #4d030c;
            color: white;
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
            left: 0;
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
    
            padding: 50px;
            margin-left: 280px;
        }
        .nav-link {
            color: #fff;
        }
        .nav-link:hover, .nav-link.active {
            color: #4CAF50;
        }
        .card {
            width: 100%;
            height: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
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
            <a class="nav-link" href="../medicines/medicines.php"> Add Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../medicines/reqmedicines.php">Requests Medicines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../events/events.php">Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../messages/messages.php">Messages</a>
        </li>
    </ul>
    <hr style="border-top: 1px solid rgba(255,255,255,0.3);">
    <a class="nav-link mt-auto" href="index.php" style="color: white;">Logout</a>
    
</div>

<div class="main-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>|Announcements</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">Add Event</button>
        </div>

        <table id="eventsTable" class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="eventTableBody">
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Event Modal -->
<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <input type="hidden" id="editEventId" name="editEventId">
                    <div class="form-group">
                        <label for="editEventTitle">Title</label>
                        <input type="text" class="form-control" id="editEventTitle" name="editEventTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="editEventDescription">Description</label>
                        <textarea class="form-control" id="editEventDescription" name="editEventDescription" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editEventDate">Start Date and Time</label>
                        <input type="datetime-local" class="form-control" id="editEventDate" name="editEventDate" required>
                    </div>
                    <div class="form-group">
                        <label for="editEndEventDate">End Date and Time</label>
                        <input type="datetime-local" class="form-control" id="editEndEventDate" name="editEndEventDate" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEventForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="eventImage">Event Image:</label>
                        <input type="file" class="form-control-file" id="eventImage" name="eventImage">
                    </div>
                    <div class="form-group">
                        <label for="eventTitle">Event Title:</label>
                        <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Enter event title">
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Event Description:</label>
                        <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" placeholder="Enter event description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Event Start Date and Time:</label>
                        <input type="datetime-local" class="form-control" id="eventDate" name="eventDate">
                    </div>
                    <div class="form-group">
                        <label for="endEventDate">Event End Date and Time:</label>
                        <input type="datetime-local" class="form-control" id="endEventDate" name="endEventDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Event</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    var dataTable = $('#eventsTable').DataTable();

    function fetchEvents() {
        $.ajax({
            type: 'GET',
            url: 'fetch_events.php',
            dataType: 'json',
            success: function(response) {
                console.log('Fetch Events Response:', response); // Log the response
                dataTable.clear().draw();
                $.each(response, function(index, event) {
    var editButton = '<button class="btn btn-info edit-event" data-event-id="' + event.id + '"><i class="bi bi-pencil"></i></button>';
    var deleteButton = '<button class="btn btn-danger delete-event" data-event-id="' + event.id + '"><i class="bi bi-trash"></i></button>';
    var eventImage = '<img src="' + event.eventImage + '" alt="' + event.eventTitle + '" style="max-width: 100px;">';
    dataTable.row.add([
        eventImage,
        event.eventTitle,
        event.eventDescription,
        event.eventDate,
        event.endeventDate,
        editButton + ' ' + deleteButton
    ]).draw();
});
            },
            error: function(xhr, status, error) {
                console.error('Fetch Events Error:', xhr.responseText); // Log the error
                alert("An error occurred while fetching events. Please try again.");
            }
        });
    }

    fetchEvents();

    $('#eventsTable').on('click', '.edit-event', function() {
    var eventId = $(this).data('event-id');
    editEvent(eventId);
});

$('#eventsTable').on('click', '.delete-event', function() {
    var eventId = $(this).data('event-id');
    deleteEvent(eventId);
});

function editEvent(eventId) {
    $.ajax({
        type: 'GET',
        url: 'edit_event.php',
        data: { eventId: eventId },
        dataType: 'json',
        success: function(response) {
            $('#editEventModal #editEventId').val(response.id);
            $('#editEventModal #editEventTitle').val(response.eventTitle);
            $('#editEventModal #editEventDescription').val(response.eventDescription);
            $('#editEventModal #editEventDate').val(response.eventDate);
            $('#editEventModal #editEndEventDate').val(response.endeventDate);

            $('#editEventModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred while fetching event details. Please try again.");
        }
    });

    $('#editEventForm').off('submit').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'update_event.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#editEventModal').modal('hide');
                fetchEvents();
                alert("Event details updated successfully!");
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred while updating event details. Please try again.");
            }
        });
    });
}

    function deleteEvent(eventId) {
        if (confirm("Are you sure you want to delete this event?")) {
            $.ajax({
                type: 'POST',
                url: 'delete_event.php',
                data: { id: eventId },
                dataType: 'json',
                success: function(response) {
                    console.log('Event deleted successfully.');
                    fetchEvents();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while deleting the event. Please try again.");
                }
            });
        }
    }

    $('#addEventForm').submit(function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    
    $.ajax({
        type: 'POST',
        url: 'events.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log("Response from server:", response); // Log the response
            try {
                response = JSON.parse(response);
                if (response.success) {
                    // Reset the form
                    $('#addEventForm')[0].reset();
                    // Close the modal
                    $('#addEventModal').modal('hide');
                    // Fetch and display the updated events
                    fetchEvents();
                    // Show a success message
                    alert("Event added successfully!");
                } else {
                    // Display error message
                    alert(response.error);
                }
            } catch (e) {
                console.error("Error parsing JSON:", e); // Log any parsing errors
                alert("An error occurred. Please try again.");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Please try again.");
        }
    });
});

    $('#searchInput').on('keyup', function() {
        dataTable.search(this.value).draw();
    });
});

$(document).ready(function() {
    // Get current date and time
    var currentDate = new Date().toISOString().slice(0, 16);
    
    // Set the minimum value for eventDate input
    $('#eventDate').attr('min', currentDate);
    
    // Set the minimum value for endEventDate input
    $('#endEventDate').attr('min', currentDate);
});


</script>
</body>
</html>
