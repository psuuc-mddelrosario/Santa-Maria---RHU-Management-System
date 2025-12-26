<?php
require 'conn.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

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
        $mail->Username = 'rhustamaria2@gmail.com';
        $mail->Password = 'wapq rits nvre ialk';

        $mail->setFrom('rhustamaria2@gmail.com', 'Sta. Maria RHU');
        $mail->addAddress($appointment['email'], $appointment['firstname'] . ' ' . $appointment['lastname']);
        $mail->isHTML(true);
        $mail->Subject = 'Appointment Approved';
        $mail->Body = 'Your appointment request has been approved by Sta. Maria RHU.';

        if ($mail->send()) {
            // Update appointment status in the database
            $updateStmt = $conn->prepare("UPDATE appointment SET status = 'approved' WHERE id = ?");
            $updateStmt->bind_param('i', $appointmentId);
            $updateStmt->execute();

            echo 'success';
        } else {
            echo 'error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'error: Appointment not found';
    }
} catch (Exception $e) {
    echo 'error: ' . $e->getMessage();
}
?>
