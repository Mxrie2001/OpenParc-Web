<?php
    include '../models/HotelRepository.php'; 
    if (isset($_GET['id_form']) && isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['description']) && isset($_GET['etoile']) && isset($_GET['image']) && isset($_GET['gerant'])){
    $save = new HotelRepository(connectDB());
    $tout_hotel=$save->traitementModifPartenaire($_GET['nom'], $_GET['adresse'], $_GET['description'], $_GET['etoile'], $_GET['image'], $_GET['gerant'],$_GET['id_form']);
    echo $tout_hotel;
    }
?>

