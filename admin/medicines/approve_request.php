<?php
require_once 'conn.php'; // Your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_requests = $_POST['selected_requests'];
    $approver_first_name = $_POST['approver_first_name'];
    $approver_middle_name = $_POST['approver_middle_name'];
    $approver_last_name = $_POST['approver_last_name'];
    $approver_position = $_POST['approver_position'];
    
    // Convert the selected requests to a comma-separated string
    $request_ids = implode(',', $selected_requests);
    
    // Get the current date and time
    $current_date = date("Y-m-d H:i:s");

    // Update the status and approval details of the selected requests
    $sql_update = "UPDATE requests SET status = 'Approved', approver_first_name = ?, approver_middle_name = ?, approver_last_name = ?, approver_position = ?, approval_date = ? WHERE request_id IN ($request_ids)";
    
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssss", $approver_first_name, $approver_middle_name, $approver_last_name, $approver_position, $current_date);

    if ($stmt_update->execute()) {
        echo json_encode(array("success" => true, "message" => "Requests approved successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Error updating requests status."));
    }

    // Close the prepared statement
    $stmt_update->close();

    // Close the database connection
    $conn->close();
}
?>
