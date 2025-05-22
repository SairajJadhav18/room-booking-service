<?php
// the following function validates for Room Type
function isValidRoomType($roomType) {
    $validRoomTypes = ['Single', 'Double', 'Suite'];
    return in_array($roomType, $validRoomTypes);
}
?>