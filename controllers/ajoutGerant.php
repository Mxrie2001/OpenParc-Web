<?php           
    
    if (isset($_GET['nom_gerant']) && isset($_GET['prenom_gerant']) && isset($_GET['email_gerant']) && isset($_GET['pwd_gerant'])){
        $save = new HotelRepository(connectDB());
        $gerant=$save->addGerant($_GET['nom_gerant'],$_GET['prenom_gerant'],$_GET['email_gerant'], $_GET['pwd_gerant']);
        echo $gerant;
    }
    
?>