<?php
            
    if (isset($_GET['id'])){
        $save = new HotelRepository(connectDB());
        $hotelDelete=$save->deleteHotel($_GET['id']);
        echo $hotelDelete;         
    }
    
?>