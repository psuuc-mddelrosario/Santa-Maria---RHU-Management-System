<?php
require_once 'conn.php';

$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);

$appointments = array(); // Array to store appointments

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assuming the image path is stored in the 'image_path' column
        $imagePath = 'http://wst2-mtr-user/verif/' . $row['image']; // Modify 'image' to 'image_path'
        $row['image'] = $imagePath;
        $appointments[] = $row;
    }
}

echo json_encode($appointments);

$conn->close();
?>
