<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
<!-- Booking Form -->
<h2 class="mt-5">Book a Room</h2>
<form method="POST" action="book_room.php">
    <div class="form-group">
        <label for="name">Your Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="room_type">Room Type:</label>
        <select class="form-control" id="room_type" name="room_type" required>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Suite">Suite</option>
        </select>
    </div>
    <div class="form-group">
        <label for="check_in">Check-In Date:</label>
        <input type="date" class="form-control" id="check_in" name="check_in" required>
    </div>
    <div class="form-group">
        <label for="check_out">Check-Out Date:</label>
        <input type="date" class="form-control" id="check_out" name="check_out" required>
    </div>
    <button type="submit" class="btn btn-success">Book Now</button>
</form>

<?php
if (isset($_GET['room_type'])) {
    $roomType = $_GET['room_type'];

    // Validate the room type
    if (isValidRoomType($roomType)) {
        try {
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
        } catch (Exception $e) {
            echo "<p class='mt-5 text-danger'>Error: {$e->getMessage()}</p>";
        }
    } else {
        echo '<p class="mt-5">Invalid room type selected.</p>';
    }
}

// Include the footer
require_once __DIR__ . '/../templates/footer.php';
?>