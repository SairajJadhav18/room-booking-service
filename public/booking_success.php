<?php
 // i am using session storage to store specific customer bookings
session_start();

 
if (!isset($_SESSION['booking_details'])) {
     
    header("Location: index.php");
    exit();
}

$bookingDetails = $_SESSION['booking_details'];

unset($_SESSION['booking_details']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            margin-top: 50px;
        }
        .card-header {
            background-color: #28a745;
            color: white;
        }
        .list-group-item {
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Confirmation Card -->
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-check-circle"></i> Booking Confirmed
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- Booking Details -->
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">
                                <i class="fas fa-receipt"></i> Booking Details
                            </h4>
                            <p>Thank you for booking with us! Your reservation is confirmed.</p>
                        </div>

                        <!-- Guest Details -->
                        <div class="mb-4">
                            <h5 class="text-primary">
                                <i class="fas fa-user"></i> Guest Details
                            </h5>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Name:</strong> <?php echo $bookingDetails['name']; ?>
                                </li>
                            </ul>
                        </div>

                        <!-- Room Details -->
                        <div class="mb-4">
                            <h5 class="text-primary">
                                <i class="fas fa-hotel"></i> Room Details
                            </h5>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Room ID:</strong> <?php echo $bookingDetails['room_id']; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Check-In:</strong> <?php echo $bookingDetails['check_in']; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Check-Out:</strong> <?php echo $bookingDetails['check_out']; ?>
                                </li>
                            </ul>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="index.php" class="btn btn-primary">
                                <i class="fas fa-home"></i> Go to Homepage
                            </a>
                            <button class="btn btn-outline-secondary" onclick="window.print()">
                                <i class="fas fa-print"></i> Print Confirmation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>