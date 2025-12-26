<?php
// Database connection
require_once 'conn.php';

// Get form data
$medicineName = $_POST['medicineName'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$expirationDate = $_POST['expirationDate'];
$manufacturingDate = $_POST['manufacturingDate'];

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO medicine (medicinename, description, quantity, expirationdate, manufacturingdate) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $medicineName, $description, $quantity, $expirationDate, $manufacturingDate);

// Execute the statement
if ($stmt->execute()) {
    echo "Medicine added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
?>
