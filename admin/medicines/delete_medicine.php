<?php
// Database connection
require_once 'conn.php';

// Check if the medicine ID is set and not empty
if(isset($_POST['id'])) {
    // Get the medicine ID
    $id = $_POST['id'];

    // Prepare and bind statement
    $stmt = $conn->prepare("DELETE FROM medicine WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Medicine deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // If medicine ID is not set or empty, display an error message
    echo "Error: Medicine ID is missing.";
}

// Close connection
$conn->close();
?>
