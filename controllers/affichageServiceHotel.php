<?php
        include '../models/ServiceRepository.php';
        $save = new ServiceRepository(connectDB());
        $service=$save->affichageServiceHotel();
        echo $service;

?>