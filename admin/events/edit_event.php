<?php
require_once 'conn.php';

// Function to fetch event details by ID
function fetchEventDetails($conn, $eventId) {
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
        return $event;
    } else {
        return null;
    }
}

// Handle GET request to fetch event details
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the event ID is provided in the query string
    if (isset($_GET['eventId'])) {
        $eventId = $_GET['eventId'];

        // Fetch event details using the fetchEventDetails function
        $event = fetchEventDetails($conn, $eventId);

        if ($event) {
            // Event details found, return as JSON response
            echo json_encode($event);
        } else {
            // Event not found
            echo json_encode(array('error' => 'Event not found'));
        }
    } else {
        // Event ID not provided in the query string
        echo json_encode(array('error' => 'Event ID not provided'));
    }
} else {
    // Invalid request method
    echo json_encode(array('error' => 'Invalid request method'));
}
?>
