<?php
require_once 'conn.php';

// Check if ID is provided
if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    // Sanitize the input to prevent SQL injection
    $id = $_GET['id'];

    // Prepare and execute statement to fetch medicine details by ID
    $stmt = $conn->prepare("SELECT * FROM medicine WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch medicine details as an associative array
        $medicine = $result->fetch_assoc();
        
        // Return medicine details as JSON
        echo json_encode($medicine);
    } else {
        // If no medicine found with the provided ID, return an empty array
        echo json_encode(array());
    }

    // Close statement
    $stmt->close();
} else {
    // Return JSON response indicating invalid ID
    echo json_encode(array('status' => 'error', 'message' => 'Invalid ID provided'));
}

// Close connection
$conn->close();
?>
