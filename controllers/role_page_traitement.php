<?php
    require '../controllers/session.php';
    
    if(QuiEstCe()=="Hotel"){
        require 'hotel_page.php';
    }
    else if(QuiEstCe()=="Staff"){
        require 'staff_page.php';
    }
    else{
        require 'vip_page.php';
    }
?>