<?php

if (isset($_GET['nom']) && isset($_GET['description'])){
    $save = new ServiceRepository(connectDB());
    $service=$save->addService($_GET['nom'],$_GET['description']);
    echo $service;
}

?>