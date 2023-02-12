<?php
        include '../models/ServiceRepository.php';
        $save = new ServiceRepository(connectDB());
        $service=$save->affichageServiceDetail($_GET['test']);
        echo $service;

?>