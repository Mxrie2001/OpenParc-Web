<?php   
    include '../models/HotelRepository.php';
    $save = new HotelRepository(connectDB());
    $tout_hotel=$save->allHotel();
    echo $tout_hotel;
?>