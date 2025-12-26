<?php
// Include the database connection file
require_once 'conn.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'ids' parameter is set in the POST data
    if (isset($_POST["ids"])) {
        // Prepare a SQL statement to delete rows with the specified IDs
        $sql = "DELETE FROM appointment WHERE id IN (" . implode(",", $_POST["ids"]) . ")";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            // If deletion is successful, return 'success'
            echo "success";
        } else {
            // If deletion fails, return an error message
            echo "Error: " . $conn->error;
        }
    } else {
        // If the 'ids' parameter is not set, return an error message
        echo "No IDs provided";
    }
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>
