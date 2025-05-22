<?php


session_start();

require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = htmlspecialchars(trim($_POST['name']));
    $roomId = htmlspecialchars(trim($_POST['room_id']));
    $checkIn = htmlspecialchars(trim($_POST['check_in']));
    $checkOut = htmlspecialchars(trim($_POST['check_out']));

    
    $errors = [];

     
    if (empty($name) || empty($roomId) || empty($checkIn) || empty($checkOut)) {
        $errors[] = "All fields are required.";
    }

     
    if (strtotime($checkIn) >= strtotime($checkOut)) {
        $errors[] = "Check-in date must be before check-out date.";
    }

     
    if (empty($errors)) {
        
        $booking = [
            'name' => $name,
            'room_id' => $roomId,
            'check_in' => $checkIn,
            'check_out' => $checkOut
        ];

         
        if (saveBookingToCSV($booking)) {
             
            $_SESSION['booking_details'] = $booking;

            // Redirect to the confirmation page
            header("Location: booking_success.php");
            exit();
        } else {
            $errors[] = "Error saving booking. Please try again.";
        }
    }

    // Display validation errors
    foreach ($errors as $error) {
        echo "<p class='text-danger'>$error</p>";
    }
} else {
    echo "<p class='text-danger'>Invalid request.</p>";
}
?>