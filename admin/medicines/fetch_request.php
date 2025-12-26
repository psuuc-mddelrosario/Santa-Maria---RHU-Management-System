<?php
// Include database connection
include 'conn.php';

// Fetch data from requests table
$sql = "SELECT request_id, medicine, quantity, firstname, middlename, lastname, barangay, age, cellphone, photo, document_type, request_date, status FROM requests";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode(array("data" => $data));
?>
