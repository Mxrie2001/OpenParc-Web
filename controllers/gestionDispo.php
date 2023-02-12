<?php
        include '../models/ChambreRepository.php';

        $save = new ChambreRepository(connectDB());
        $chambre=$save->gestionDispoChambre();
        echo $chambre;
            
    
?>