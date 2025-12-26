<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required parameters are provided
    if (isset($_POST['editEventId'], $_POST['editEventTitle'], $_POST['editEventDescription'], $_POST['editEventDate'], $_POST['editEndEventDate'])) {
        // Retrieve data from the POST request
        $eventId = $_POST['editEventId'];
        $eventTitle = $_POST['editEventTitle'];
        $eventDescription = $_POST['editEventDescription'];
        $eventDate = $_POST['editEventDate'];
        $endEventDate = $_POST['editEndEventDate'];

        // Update event details in the database
        $sql = "UPDATE events SET eventTitle = ?, eventDescription = ?, eventDate = ?, endEventDate = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssi", $eventTitle, $eventDescription, $eventDate, $endEventDate, $eventId);

            if ($stmt->execute()) {
                // Event details updated successfully
                echo json_encode(array('success' => 'Event details updated successfully'));
            } else {
                // Failed to update event details
                echo json_encode(array('error' => 'Failed to update event details: ' . $stmt->error));
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing the statement
            echo json_encode(array('error' => 'Prepare failed: ' . $conn->error));
        }
    } else {
        // Required parameters not provided
        echo json_encode(array('error' => 'Required parameters not provided'));
    }
} else {
    // Invalid request method
    echo json_encode(array('error' => 'Invalid request method'));
}
?>
