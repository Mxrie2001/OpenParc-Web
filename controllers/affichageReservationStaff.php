<?php
        include '../models/ReservationRepository.php';

        $save = new ReservationRepository(connectDB());
        $reservation=$save->afficheReservation();
        echo $reservation;      
    
    
?>