<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include reusable PHP files
require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $roomType = $_POST['room_type'];
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];

    // Validate the booking data
    $errors = [];

    // Check if all fields are filled
    if (empty($name) || empty($roomType) || empty($checkIn) || empty($checkOut)) {
        $errors[] = "All fields are required.";
    }

    // Check if check-in date is before check-out date
    if (strtotime($checkIn) >= strtotime($checkOut)) {
        $errors[] = "Check-in date must be before check-out date.";
    }

    // If there are no errors, save the booking
    if (empty($errors)) {
        // Create a booking array
        $booking = [
            'name' => $name,
            'room_type' => $roomType,
            'check_in' => $checkIn,
            'check_out' => $checkOut
        ];

        // Save the booking to the CSV file
        if (saveBookingToCSV($booking)) {
            echo "<p class='text-success'>Booking successful! Thank you, $name.</p>";
        } else {
            echo "<p class='text-danger'>Error saving booking. Please try again.</p>";
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<p class='text-danger'>$error</p>";
        }
    }
} else {
    echo "<p class='text-danger'>Invalid request.</p>";
}

// Include the footer
require_once __DIR__ . '/../templates/footer.php';
?>