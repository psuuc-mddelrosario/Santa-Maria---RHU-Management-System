<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $eventId = $_POST['id'];

        // Delete event from the database using $eventId

        // Example: Delete event from the events table
        $sql = "DELETE FROM events WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $eventId);
        
        if ($stmt->execute()) {
            // Event deleted successfully
            echo json_encode(array('success' => 'Event deleted successfully'));
        } else {
            // Error deleting event
            echo json_encode(array('error' => 'Error deleting event'));
        }

        $stmt->close();
        exit; // Terminate further processing
    } else {
        // id parameter not provided
        echo json_encode(array('error' => 'Event ID not provided'));
    }
}
?>
