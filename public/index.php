<?php
require_once __DIR__ . '/../templates/header.php';

 require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';

// Fetch all rooms
try {
    $rooms = readRoomsFromJSON();  
} catch (Exception $e) {
    echo "<p class='text-danger'>Error fetching rooms: {$e->getMessage()}</p>";
    $rooms = [];  
}

 
$filteredRooms = [];

 
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['room_type'])) {
    $roomType = $_GET['room_type'];

     
    if (isValidRoomType($roomType)) {
         
        $filteredRooms = array_filter($rooms, function ($room) use ($roomType) {
            return $room['room_type'] === $roomType && $room['availability'] === 'Yes';
        });
    } else {
        echo "<p class='text-danger'>Invalid room type selected.</p>";
    }
}
?>

<!-- Main Content -->
<div class="container mt-5">
    <!-- Carousel Section -->
    <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php foreach ($rooms as $index => $room): ?>
                <button type="button" data-bs-target="#roomCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Images -->
        <div class="carousel-inner">
            <?php foreach ($rooms as $index => $room): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="<?php echo $room['images'][0]; ?>" class="d-block w-100" alt="<?php echo $room['room_type']; ?>">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-3 rounded">
                        <h5><?php echo $room['room_type']; ?></h5>
                        <p><?php echo $room['description']; ?></p>
                        <a href="room_details.php?room_id=<?php echo $room['room_id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1 class="mt-5">Search for Available Rooms</h1>
    <form method="GET" action="" class="mb-4">
        <div class="mb-3">
            <label for="room_type" class="form-label">Room Type:</label>
            <select class="form-select" id="room_type" name="room_type" required>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Suite">Suite</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if (!empty($filteredRooms)): ?>
        <h2 class="mt-5">Available Rooms</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Room ID</th>
                    <th>Room Type</th>
                    <th>Price Per Night</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredRooms as $room): ?>
                    <tr>
                        <td><?php echo $room['room_id']; ?></td>
                        <td><?php echo $room['room_type']; ?></td>
                        <td><?php echo $room['price_per_night']; ?></td>
                        <td>
                            <a href="room_details.php?room_id=<?php echo $room['room_id']; ?>" class="btn btn-info btn-sm">View Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($_GET['room_type'])): ?>
        <p class="mt-5">No available rooms found for the selected type.</p>
    <?php endif; ?>
</div>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>