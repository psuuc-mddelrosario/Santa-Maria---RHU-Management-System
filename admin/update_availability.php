<?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $availability = $_POST['availability'];

    // Update availability in the database
    $sql = "UPDATE doctors SET availability = '$availability' WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        $response = [
            'status' => 'success',
            'message' => 'Availability updated successfully!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Error updating availability: ' . $conn->error
        ];
    }

    echo json_encode($response);

    $conn->close();
}
?>
