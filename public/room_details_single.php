<?php
require_once __DIR__ . '/../templates/header.php';

require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';

// Check if room_id is provided in the URL
if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];

    try {
        // Fetch room details
        $rooms = readRoomsFromJSON();  
        $room = array_filter($rooms, function ($room) use ($roomId) {
            return $room['room_id'] == $roomId;
        });

        if (empty($room)) {
            echo "<p class='text-danger'>Room not found.</p>";
        } else {
            $room = array_values($room)[0]; // Get the first matching room
        }
    } catch (Exception $e) {
        echo "<p class='text-danger'>Error fetching room details: {$e->getMessage()}</p>";
    }
} else {
    echo "<p class='text-danger'>Room ID not provided.</p>";
}
?>

<!-- Main Content -->
<div class="container mt-5">
    <h1>Room Details</h1>
    <?php if (isset($room)): ?>
        <div class="card">
            <img src="<?php echo $room['image_url']; ?>" class="card-img-top" alt="<?php echo $room['room_type']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $room['room_type']; ?></h5>
                <p class="card-text">
                    <strong>Room ID:</strong> <?php echo $room['room_id']; ?><br>
                    <strong>Price Per Night:</strong> $<?php echo $room['price_per_night']; ?><br>
                    <strong>Availability:</strong> <?php echo $room['availability']; ?><br>
                    <strong>Description:</strong> <?php echo $room['description']; ?><br>
                    <strong>Amenities:</strong> <?php echo implode(", ", $room['amenities']); ?>
                </p>
                <a href="book_room.php" class="btn btn-primary">Book This Room</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>