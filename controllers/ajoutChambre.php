
<?php
        if (isset($_GET['idHotel']) && isset($_GET['numero']) && isset($_GET['type'])){
            $save = new ChambreRepository(connectDB());
            $chambreNew=$save->addChambre($_GET['numero'], $_GET['type'], $_GET['idHotel']);
            echo $chambreNew;
        }
        

?>