<?php
session_start();
require '../models/connectDB.php';
require '../models/UserRepository.php';

function QuiEstCe(){
    $u = new UserRepository(connectDB());
    if ($u->getUser($_SESSION['user'])->getRank() == 4)
        return "Hotel";
    else if ($u->getUser($_SESSION['user'])->getRank() == 5)
        return "Staff";
    else
        return "VIP";
}
?>