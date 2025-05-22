<?php
require_once __DIR__ . '/../templates/header.php';

require_once __DIR__ . '/../includes/fileHandler.php';
require_once __DIR__ . '/../includes/validator.php';


try {
    $rooms = readRoomsFromJSON();  
    $availableRooms = array_filter($rooms, function ($room) {
        return $room['availability'] === 'Yes'; // Filter available rooms
    });
} catch (Exception $e) {
    echo "<p class='text-danger'>Error fetching rooms: {$e->getMessage()}</p>";
    $availableRooms = [];  
}
?>

<!-- Main Content -->
<div class="container mt-5">
    <h1>Available Rooms</h1>
    <div class="row">
        <?php foreach ($availableRooms as $room): ?>
            <!-- Room Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $room['images'][0]; ?>" class="card-img-top" alt="<?php echo $room['room_type']; ?>" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $room['room_id']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $room['room_type']; ?></h5>
                        <p class="card-text">
                            <strong>Room ID:</strong> <?php echo $room['room_id']; ?><br>
                            <strong>Price Per Night:</strong> $<?php echo $room['price_per_night']; ?><br>
                            <strong>Availability:</strong> <?php echo $room['availability']; ?>
                        </p>
                        <a href="room_details_single.php?room_id=<?php echo $room['room_id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Room Modal with Carousel -->
            <div class="modal fade" id="modal-<?php echo $room['room_id']; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $room['room_id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel-<?php echo $room['room_id']; ?>"><?php echo $room['room_type']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Bootstrap Carousel -->
                            <div id="carousel-<?php echo $room['room_id']; ?>" class="carousel slide" data-bs-ride="carousel">
                                <!-- Carousel Indicators -->
                                <div class="carousel-indicators">
                                    <?php foreach ($room['images'] as $index => $image): ?>
                                        <button type="button" data-bs-target="#carousel-<?php echo $room['room_id']; ?>" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo $index + 1; ?>"></button>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Carousel Images -->
                                <div class="carousel-inner">
                                    <?php foreach ($room['images'] as $index => $image): ?>
                                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                            <img src="<?php echo $image; ?>" class="d-block w-100" alt="Room Image <?php echo $index + 1; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Carousel Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $room['room_id']; ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $room['room_id']; ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>