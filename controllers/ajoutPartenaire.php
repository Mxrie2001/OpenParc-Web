<?php
if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['desc']) && isset($_GET['etoile']) && isset($_GET['img']) && isset($_GET['gerant'])){
    $save = new HotelRepository(connectDB());
        $partenaire=$save->addPartenaire($_GET['nom'],$_GET['adresse'], $_GET['desc'], $_GET['etoile'], $_GET['img'], $_GET['gerant']);
        echo $partenaire;
}

?>