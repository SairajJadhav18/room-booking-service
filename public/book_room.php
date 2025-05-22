<?php
require_once __DIR__ . '/../templates/header.php';


require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';


try {
    $rooms = readRoomsFromJSON();  
    $availableRooms = array_filter($rooms, function ($room) {
        return $room['availability'] === 'Yes';  
    });
} catch (Exception $e) {
    echo "<p class='text-danger'>Error fetching rooms: {$e->getMessage()}</p>";
    $availableRooms = [];  
}
?>

 
<div class="container mt-5">
    <h1>Book a Room</h1>
    <form method="POST" action="process_booking.php" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

         <div class="mb-3">
            <label for="room_type_filter" class="form-label">Filter by Room Type:</label>
            <select class="form-select" id="room_type_filter" name="room_type_filter">
                <option value="">All Room Types</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Suite">Suite</option>
            </select>
        </div>

         <div class="mb-3">
            <label for="room_id" class="form-label">Select Room:</label>
            <select class="form-select" id="room_id" name="room_id" required>
                <option value="">Choose a room</option>
                <?php foreach ($availableRooms as $room): ?>
                    <option value="<?php echo $room['room_id']; ?>" data-room-type="<?php echo $room['room_type']; ?>">
                        <?php echo "{$room['room_type']} (Room ID: {$room['room_id']}) - \${$room['price_per_night']}/night"; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-In Date:</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check-Out Date:</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>
        <button type="submit" class="btn btn-success">Book Now</button>
    </form>
</div>

 <script>
    document.getElementById('room_type_filter').addEventListener('change', function () {
        const selectedType = this.value; // Get the selected room type
        const roomSelect = document.getElementById('room_id'); // Get the room dropdown
        const rooms = roomSelect.querySelectorAll('option'); // Get all room options

        // the following loop helps us loop through all room options
        rooms.forEach(room => {
            const roomType = room.getAttribute('data-room-type'); // Get the room type from the data attribute
            if (selectedType === "" || roomType === selectedType) {
                room.style.display = ''; // Show the room if it matches the selected type
            } else {
                room.style.display = 'none'; // Hide the room if it doesn't match
            }
        });

        // Reset the selected room 
        roomSelect.value = '';
        for (const room of rooms) {
            if (room.style.display !== 'none') {
                roomSelect.value = room.value;
                break;
            }
        }
    });
</script>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>