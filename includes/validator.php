<?php
function isValidRoomType($roomType) {
    $validRoomTypes = ['Single', 'Double', 'Suite'];
    return in_array($roomType, $validRoomTypes);
}
?>