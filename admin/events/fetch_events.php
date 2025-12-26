<?php
require_once 'conn.php';

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    $events = array(); // Array to store events
    // Fetch rows and add them to the events array
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    // Return events data as JSON
    echo json_encode($events);
} else {
    // No events found
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>