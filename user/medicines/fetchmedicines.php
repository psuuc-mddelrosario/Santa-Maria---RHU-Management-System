<?php
require_once '../conn.php';

$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);

$medicine = array(); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicine[] = $row;
    }
}

echo json_encode($medicine);

$conn->close();
?>