<?php
        
    $save = new HotelRepository(connectDB());
    $infos=$save->recuperationModifHotel($_GET['test']);
    echo $infos;
?>
