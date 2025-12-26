<?php
// fetch_chart_data.php

// Database connection
require_once 'conn.php';

// Query to get total appointments
$sql = "SELECT COUNT(*) AS totalAppointments FROM appointment";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAppointments = $row['totalAppointments'];

// Query to get total medicines
$sql = "SELECT COUNT(*) AS totalMedicines FROM medicine";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalMedicines = $row['totalMedicines'];

// Query to get total events
$sql = "SELECT COUNT(*) AS totalEvents FROM events WHERE eventDate >= CURDATE()";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalEvents = $row['totalEvents'];

// Close connection
$conn->close();

// Prepare data as associative array
$data = [
    'appointments' => ['totalAppointments' => $totalAppointments],
    'medicines' => ['totalMedicines' => $totalMedicines],
    'events' => ['totalEvents' => $totalEvents]
];

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
