<?php
require_once '../conn.php';

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$events = array(); // Array to store events

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assuming the image path is stored in the 'eventImage' column
        $imagePath = 'http://localhost/WST2-MTR/admin/uploads/' . $row['eventImage'];
        $row['eventImage'] = $imagePath;
        $events[] = $row;
    }
}

echo json_encode($events);

$conn->close();
?>
