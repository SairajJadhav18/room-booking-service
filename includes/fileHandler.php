<?php
function saveBookingToCSV($booking) {
    $filePath = __DIR__ . '/../data/bookings.csv'; // Path to bookings.csv

    // Check if the file is empty or doesn't exist
    $isFileEmpty = !file_exists($filePath) || filesize($filePath) == 0;

    // Open the file in append mode
    $file = fopen($filePath, 'a');

    // If the file is empty, write the header row first
    if ($isFileEmpty) {
        fputcsv($file, ['name', 'room_type', 'check_in', 'check_out']);
    }

    // Write the booking data to the file
    $success = fputcsv($file, $booking);

    // Close the file
    fclose($file);

    return $success !== false;
}

function readRoomsFromCSV() {
    $filePath = __DIR__ . '/../data/rooms.csv'; // Path to rooms.csv
    $rooms = [];
    if (($file = fopen($filePath, 'r')) !== false) {
        // Read the header row
        $headers = fgetcsv($file);

        // Read the rest of the rows
        while (($row = fgetcsv($file)) !== false) {
            $rooms[] = array_combine($headers, $row); // Convert row to associative array
        }
        fclose($file);
    }
    return $rooms;
}

function readRoomsFromJSON() {
    $filePath = __DIR__ . '/../data/rooms.json'; // Path to rooms.json
    if (!file_exists($filePath)) {
        throw new Exception("rooms.json file not found.");
    }
    if (!is_readable($filePath)) {
        throw new Exception("rooms.json file is not readable.");
    }
    $jsonData = file_get_contents($filePath);
    return json_decode($jsonData, true); // Decode JSON into an associative array
}

function readBookingsFromCSV() {
    $filePath = __DIR__ . '/../data/bookings.csv'; // Path to bookings.csv
    $bookings = [];
    if (($file = fopen($filePath, 'r')) !== false) {
        // Skip the header row
        fgetcsv($file);

        // Read the rest of the rows
        while (($row = fgetcsv($file)) !== false) {
            $bookings[] = $row;
        }
        fclose($file);
    }
    return $bookings;
}

function writeBookingsToCSV($bookings) {
    $filePath = __DIR__ . '/../data/bookings.csv'; // Path to bookings.csv
    $file = fopen($filePath, 'w');
    foreach ($bookings as $booking) {
        fputcsv($file, $booking);
    }
    fclose($file);
}

function filterRoomsByTypeAndAvailability($roomType) {
    $rooms = readRoomsFromCSV(); // Read rooms from CSV
    $filteredRooms = array_filter($rooms, function ($room) use ($roomType) {
        return $room['room_type'] === $roomType && $room['availability'] === 'Yes'; // Filter by type and availability
    });
    return $filteredRooms;
}
?>