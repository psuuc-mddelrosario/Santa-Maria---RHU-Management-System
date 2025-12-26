<?php
// Database connection
require_once 'conn.php';

// Fetch medicines from the database
$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $medicines = array();

    while ($row = $result->fetch_assoc()) {
        $medicines[] = array(
            'medicinename' => $row['medicinename'],
            'quantity' => $row['quantity'],
            'description' => $row['description'],
            'manufacturingdate' => $row['manufacturingdate'],
            'expirationdate' => $row['expirationdate'],
            'id' => $row['id']
        );
    }

    // Return medicines data as JSON
    echo json_encode(array("data" => $medicines));
} else {
    // If no medicines found, return an empty array
    echo json_encode(array("data" => array()));
}

// Close database connection
$conn->close();
?>
