<?php
// Include database connection file
require_once 'conn.php';

// Fetch records
$query = "SELECT fullname, emailaddress, message FROM contactus";
$result = mysqli_query($conn, $query);

// Fetch data into arrays
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row; // Append the entire row to the data array
}

// Close connection
mysqli_close($conn);

// Prepare response
$output = array(
    "data" => $data
);

// Output as JSON
echo json_encode($output);
?>
