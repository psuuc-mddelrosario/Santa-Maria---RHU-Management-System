<?php
require_once 'conn.php'; // Your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];

    // Fetch request details
    $sql = "SELECT * FROM requests WHERE request_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $response = array(
            "medicine" => $row['medicine'],
            "quantity" => $row['quantity'],
            "firstname" => $row['firstname'],
            "lastname" => $row['lastname'],
            "barangay" => $row['barangay'],
            "age" => $row['age'],
            "cellphone" => $row['cellphone'],
            "request_date" => $row['request_date'],
            "status" => $row['status'],
            "photo" => $row['photo'],
            "document_type" => $row['document_type']
        );

        if ($row['status'] == 'Approved') {
            $response['approver_first_name'] = $row['approver_first_name'];
            $response['approver_middle_name'] = $row['approver_middle_name'];
            $response['approver_last_name'] = $row['approver_last_name'];
            $response['approval_date'] = $row['approval_date'];
        }

        echo json_encode($response);
    } else {
        echo json_encode(array("error" => "No request found"));
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
