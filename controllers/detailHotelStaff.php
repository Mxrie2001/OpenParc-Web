<?php
include '../models/HotelRepository.php';
    $save = new HotelRepository(connectDB());
    $details=$save->affichageDetailHotel($_GET['test']);
    echo $details;
?>