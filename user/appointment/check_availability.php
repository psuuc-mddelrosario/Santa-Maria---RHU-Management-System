<?php
require_once '../conn.php';

// Function to calculate the remaining available bookings for the selected day
function calculateRemainingBookings($conn, $selectedDate) {
    // Query to get the total bookings for the selected day from the database
    $sql = "SELECT totalBookings FROM appointment WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // If no record found, initialize totalBookings to 0
    $totalBookings = ($row !== null) ? $row['totalBookings'] : 0;

    // Calculate remaining available bookings (limiting to 7)
    $remainingBookings = 1 - $totalBookings;

    return $remainingBookings;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array(); 

    // Handle file upload
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK){
        // Your existing file upload logic
        
        // Proceed with other form data and booking process
        $firstName = $_POST['firstName'];
        $middleName = isset($_POST['middleName']) ? $_POST['middleName'] : null;
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sex = $_POST['sex'];
        $service = $_POST['service'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $newFileName = $_FILES["image"]["name"];

        // Calculate remaining available bookings for the selected date
        $remainingBookings = calculateRemainingBookings($conn, $date);

        // Check if there are available bookings
        if ($remainingBookings > 0) {
            // Prepare and execute SQL statement to insert data into the database
            $sql = "INSERT INTO appointment (firstname, middlename, lastname, email, phonenumber, sex, service, date, message, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssss", $firstName, $middleName, $lastName, $email, $phone, $sex, $service, $date, $message, $newFileName);

            if ($stmt->execute()) {
                // Increment totalBookings count in the database
                $totalBookings = calculateRemainingBookings($conn, $date) - 1; // Decrement by 1 for the newly booked appointment

                $updateSql = "UPDATE appointment SET totalBookings = ? WHERE date = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("is", $totalBookings, $date);
                $updateStmt->execute();
                $updateStmt->close();

                echo "Booking successful! Remaining bookings for $date: $totalBookings";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Display error message indicating no more bookings available for the selected date
            echo "Sorry, no more bookings available for the selected date.";
        }
    } else {
        $errors[] = "No file uploaded.";
    }

    if (!empty($errors)) {
        // Handle errors
        // Your existing error handling logic
    }
}
?>
