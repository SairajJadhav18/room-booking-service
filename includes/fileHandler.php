<?php
// Saving the Booking to CSV
function saveBookingToCSV($booking) {
    $filePath = __DIR__ . '/../data/bookings.csv'; // Path to bookings.csv

    // Validating the stored booking data
    if (!is_array($booking) || empty($booking)) {
        throw new Exception("Invalid booking data.");
    }

    // Checking to see if the file is empty or doesn't exist
    $isFileEmpty = !file_exists($filePath) || filesize($filePath) == 0;

    // Opening the file in append mode and not write mode
    $file = fopen($filePath, 'a');
    if ($file === false) {
        throw new Exception("Unable to open file: $filePath");
    }

    // If the file is empty, write the header row first
    if ($isFileEmpty) {
        fputcsv($file, ['name', 'room_type', 'check_in', 'check_out']);
    }

     $success = fputcsv($file, $booking);

     
    fclose($file);

    return $success !== false;
}

 
function readRoomsFromCSV() {
    $filePath = __DIR__ . '/../data/rooms.csv';  
    $rooms = [];

     
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }
    if (!is_readable($filePath)) {
        throw new Exception("File is not readable: $filePath");
    }

     
    $file = fopen($filePath, 'r');
    if ($file === false) {
        throw new Exception("Unable to open file: $filePath");
    }

     
    $headers = fgetcsv($file);
    if ($headers === false) {
        throw new Exception("Unable to read headers from file: $filePath");
    }

     
    while (($row = fgetcsv($file)) !== false) {
        $rooms[] = array_combine($headers, $row);  
    }

     
    fclose($file);

    return $rooms;
}

// Read Rooms from JSON
function readRoomsFromJSON() {
    $filePath = __DIR__ . '/../data/rooms.json';  

     
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }
    if (!is_readable($filePath)) {
        throw new Exception("File is not readable: $filePath");
    }

    
    $jsonData = file_get_contents($filePath);
    if ($jsonData === false) {
        throw new Exception("Unable to read file: $filePath");
    }

    $rooms = json_decode($jsonData, true);  
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON data: " . json_last_error_msg());
    }

    return $rooms;
}

 
function readBookingsFromCSV() {
    $filePath = __DIR__ . '/../data/bookings.csv';  
    $bookings = [];

     
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }
    if (!is_readable($filePath)) {
        throw new Exception("File is not readable: $filePath");
    }

     
    $file = fopen($filePath, 'r');
    if ($file === false) {
        throw new Exception("Unable to open file: $filePath");
    }

     
    fgetcsv($file);

    
    while (($row = fgetcsv($file)) !== false) {
        $bookings[] = $row;
    }

     
    fclose($file);

    return $bookings;
}

 
function writeBookingsToCSV($bookings) {
    $filePath = __DIR__ . '/../data/bookings.csv'; 

    if (!is_array($bookings)) {
        throw new Exception("Invalid bookings data.");
    }

    $file = fopen($filePath, 'w');
    if ($file === false) {
        throw new Exception("Unable to open file: $filePath");
    }

    fputcsv($file, ['name', 'room_type', 'check_in', 'check_out']);

    foreach ($bookings as $booking) {
        fputcsv($file, $booking);
    }
 
    fclose($file);

    return true;
}

 // the following function helps in filtering room by avability
function filterRoomsByTypeAndAvailability($roomType) {
    $rooms = readRoomsFromCSV();  
    $filteredRooms = array_filter($rooms, function ($room) use ($roomType) {
        return $room['room_type'] === $roomType && $room['availability'] === 'Yes';  
    });
    return $filteredRooms;
}
?>