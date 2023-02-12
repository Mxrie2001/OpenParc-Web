<?php
        include '../models/ChambreRepository.php';
        $save = new ChambreRepository(connectDB());
        $chambre=$save->chambreHotel($_GET['idHotel']);
        echo $chambre;

?>
