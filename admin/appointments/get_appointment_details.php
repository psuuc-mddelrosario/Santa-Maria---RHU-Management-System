<?php
include 'conn.php';

// Fetch individual appointment details
if(isset($_POST['id'])) {
    $appointment_id = $_POST['id'];

    $sql = "SELECT * FROM appointment WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $appointment_id);
    
    if($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row) {
            // Prepare HTML content for modal
            $html = '<p><strong>Service:</strong> ' . $row['service'] . '</p>' .
                    '<p><strong>First Name:</strong> ' . $row['firstname'] . '</p>' .
                    '<p><strong>Middle Name:</strong> ' . $row['middlename'] . '</p>' .
                    '<p><strong>Last Name:</strong> ' . $row['lastname'] . '</p>' .
                    '<p><strong>Email:</strong> ' . $row['email'] . '</p>' .
                    '<p><strong>Phone Number:</strong> ' . $row['phonenumber'] . '</p>' .
                    '<p><strong>Sex:</strong> ' . $row['sex'] . '</p>' .
                    '<p><strong>Date:</strong> ' . $row['date'] . '</p>' .
                    '<p><strong>Status:</strong> ' . $row['status'] . '</p>' .
                    '<p><img src="' . $row['image'] . '" alt="User Image" style="max-width: 100px;"></p>';

            echo json_encode(['html' => $html]);  // Return JSON response
        } else {
            echo json_encode(['error' => 'No appointment found']);  // Return error if no appointment found
        }
    } else {
        echo json_encode(['error' => 'Query execution failed']);  // Return error if query execution failed
    }
}
$conn->close();
?>
