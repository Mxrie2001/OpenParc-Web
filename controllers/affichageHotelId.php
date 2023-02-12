<?php
        include '../models/HotelRepository.php';
        $save = new HotelRepository(connectDB());
        $hotel=$save->affichageHotelParId();
        echo $hotel;

?>