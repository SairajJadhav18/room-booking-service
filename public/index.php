<?php

// Include reusable PHP files
require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';

// Include the header
require_once __DIR__ . '/../templates/header.php';
?>

<h1>Search for Available Rooms</h1>
<form method="GET" action="">
    <div class="form-group">
        <label for="room_type">Room Type:</label>
        <select class="form-control" id="room_type" name="room_type" required>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Suite">Suite</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<?php
if (isset($_GET['room_type'])) {
    $roomType = $_GET['room_type'];

    // Validate the room type
    if (isValidRoomType($roomType)) {
        // Read room data from the JSON file
        $rooms = readRoomsFromJSON();

        // Filter rooms by type and availability
        $filteredRooms = array_filter($rooms, function ($room) use ($roomType) {
            return $room['room_type'] === $roomType && $room['availability'] === 'Yes';
        });

        // Display results in an HTML table
        if (!empty($filteredRooms)) {
            echo '<h2 class="mt-5">Available Rooms</h2>';
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>Room ID</th><th>Room Type</th><th>Price Per Night</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            foreach ($filteredRooms as $room) {
                echo "<tr>
                        <td>{$room['room_id']}</td>
                        <td>{$room['room_type']}</td>
                        <td>{$room['price_per_night']}</td>
                        <td><a href='room_details.php?room_id={$room['room_id']}' class='btn btn-info'>View Details</a></td>
                      </tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p class="mt-5">No available rooms found for the selected type.</p>';
        }
    } else {
        echo '<p class="mt-5">Invalid room type selected.</p>';
    }
}

// Include the footer
require_once __DIR__ . '/../templates/footer.php';
?>