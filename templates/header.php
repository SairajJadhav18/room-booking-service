<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <style>
        /* Flexbox layout */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        /* Navbar brand image size */
        .navbar-brand img {
            height: 60px; /* Increase the height */
            width: 60px;  /* Set a fixed width (optional) */
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Replace text with favicon -->
                <a class="navbar-brand" href="index.php">
                    <img src="../images/favicon.png" alt="Room Booking System">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="book_room.php">Book a Room</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="room_details.php">Room Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>