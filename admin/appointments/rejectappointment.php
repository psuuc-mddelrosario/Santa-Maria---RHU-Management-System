<?php
require 'conn.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Import the SMTP class

try {
    // Get the appointment ID from the POST request
    $appointmentId = $_POST['id'];

    // Fetch appointment details from the database based on the ID
    $stmt = $conn->prepare("SELECT * FROM appointment WHERE id = ?");
    $stmt->bind_param('i', $appointmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $appointment = $result->fetch_assoc();

        // Send email notification
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'rhustamaria2@gmail.com'; // Replace with your Gmail username
        $mail->Password = 'wapq rits nvre ialk'; // Replace with your Gmail password or app password

        $mail->setFrom('rhustamaria2@gmail.com', 'Sta. Maria RHU'); // Set your From address and name
        $mail->addAddress($appointment['email'], $appointment['firstname'] . ' ' . $appointment['lastname']);
        $mail->isHTML(true);
        $mail->Subject = 'Appointment Rejected';
        $mail->Body = 'Your appointment request has been rejected by Sta. Maria RHU due to our transaction limit. Please come again another date.';

        if ($mail->send()) {
            // Update appointment status in the database
            $updateStmt = $conn->prepare("UPDATE appointment SET status = 'rejected' WHERE id = ?");
            $updateStmt->bind_param('i', $appointmentId);
            $updateStmt->execute();

            echo 'success'; // Send success response if email is sent successfully
        } else {
            echo 'error: ' . $mail->ErrorInfo; // Send error response with detailed error message
        }
    } else {
        echo 'error: Appointment not found'; // Send error response if no appointment is found
    }
} catch (Exception $e) {
    echo 'error: ' . $e->getMessage(); // Send error response if an exception occurs
}
?>
