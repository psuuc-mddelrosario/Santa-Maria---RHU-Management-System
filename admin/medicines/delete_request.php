<?php
// Include database connection
require_once 'conn.php';

// Check if request_id is set and is numeric
if (isset($_POST['request_id']) && is_numeric($_POST['request_id'])) {
    $request_id = $_POST['request_id'];

    // Prepare SQL statement to delete request
    $sql = "DELETE FROM requests WHERE request_id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$request_id])) {
        echo json_encode(['success' => true, 'message' => 'Request deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing request ID.']);
}
?>
