<?php
    include '../models/ServiceRepository.php'; 
    if (isset($_GET['nom']) && isset($_GET['description'])){
    $save = new ServiceRepository(connectDB());
    $service=$save->traitementModifService($_GET['nom'], $_GET['description'],$_GET['id_form']);
    echo $service;
    }
?>

