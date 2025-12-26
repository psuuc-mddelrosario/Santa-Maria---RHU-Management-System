<?php
require_once 'conn.php';

// Check if ID and new quantity are provided and are valid integers
if(isset($_POST['id']) && isset($_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
    // Sanitize the input to prevent SQL injection
    $id = intval($_POST['id']);
    $newQuantity = intval($_POST['quantity']);

    // Prepare and bind statement
    $stmt = $conn->prepare("UPDATE medicine SET quantity = ? WHERE id = ?");
    $stmt->bind_param("ii", $newQuantity, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Return JSON response indicating success
        echo json_encode(array('status' => 'success'));
    } else {
        // Return JSON response indicating error
        echo json_encode(array('status' => 'error', 'message' => 'Error updating quantity: ' . $stmt->error));
    }

    // Close statement
    $stmt->close();
} else {
    // Return JSON response indicating invalid input
    echo json_encode(array('status' => 'error', 'message' => 'Invalid input provided'));
}

// Close connection
$conn->close();
?>
