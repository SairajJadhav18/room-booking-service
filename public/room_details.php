<?php
// Include reusable PHP files
require_once __DIR__ . '/../includes/fileHandler.php';

// Include the header
require_once __DIR__ . '/../templates/header.php';

// Check if room_id is provided in the query parameter
if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];

    // Read all rooms from the JSON file
    $rooms = readRoomsFromJSON();

    // Find the room with the matching room_id
    $roomDetails = null;
    foreach ($rooms as $room) {
        if ($room['room_id'] == $roomId) {
            $roomDetails = $room;
            break;
        }
    }

    // Display room details if found
    if ($roomDetails) {
        echo "<h2>Room Details</h2>";
        echo "<p><strong>Room ID:</strong> {$roomDetails['room_id']}</p>";
        echo "<p><strong>Room Type:</strong> {$roomDetails['room_type']}</p>";
        echo "<p><strong>Price Per Night:</strong> {$roomDetails['price_per_night']}</p>";
        echo "<p><strong>Availability:</strong> {$roomDetails['availability']}</p>";
        echo "<p><strong>Description:</strong> {$roomDetails['description']}</p>";
        echo "<p><strong>Amenities:</strong> " . implode(", ", $roomDetails['amenities']) . "</p>";
        echo "<img src='{$roomDetails['image_url']}' alt='Room Image' style='max-width: 100%; height: auto;'>";
    } else {
        echo "<p>Room not found.</p>";
    }
} else {
    echo "<p>No room selected.</p>";
}

// Include the footer
require_once __DIR__ . '/../templates/footer.php';
?>