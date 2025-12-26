<?php
// Include the database connection file
include '../conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $medicinename = $_POST['medicinename'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $quantity = $_POST['quantity'];
    $barangay = $_POST['barangay'];
    $age = $_POST['age'];
    $cellphone = $_POST['cellphone'];
    $photo = $_FILES['photo']['name'];
    $identityDocument = $_POST['identityDocument'];

    // File upload path
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . basename($photo);
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    // File size check
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    $fileSize = $_FILES['photo']['size'];

    if ($fileSize > $maxFileSize) {
        echo "file_size_error";
        exit; // Stop further execution
    }

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Escape single quotes in identityDocument
            $escapedIdentityDocument = mysqli_real_escape_string($conn, $identityDocument);

            // Insert form data into database
            $sql = "INSERT INTO requests (medicine, firstname, middlename, lastname, quantity, barangay, age, cellphone, photo, document_type, status, request_date) VALUES ('$medicinename', '$firstname', '$middlename', '$lastname', $quantity, '$barangay', $age, '$cellphone', '$targetFilePath', '$escapedIdentityDocument', 'Pending', CURRENT_TIMESTAMP)";

            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "file_error";
        }
    } else {
        echo "file_type_error";
    }

    // Close the database connection
    $conn->close();
    exit; // Stop further execution
}
?>