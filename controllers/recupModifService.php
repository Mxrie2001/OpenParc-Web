<?php
        
    $save = new ServiceRepository(connectDB());
    $infos=$save->recuperationModifService($_GET['test']);
    echo $infos;
?>
