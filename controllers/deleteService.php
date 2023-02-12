<?php
            
    if (isset($_GET['id'])){
        $save = new ServiceRepository(connectDB());
        $serviceDelete=$save->deleteService($_GET['id']);
        echo $serviceDelete;         
    }
    
?>