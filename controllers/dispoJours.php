<?php


//affichage des differentes date du mois selectionné

if(isset($_GET['jour']) && isset($_GET['mois'])){
    $mois = $_GET['mois'];
    $annee = $_GET['annee'];
    $mod=$mois%2;

    if($mod != 0 && $mois != 2){
        $n=31;
    }

    if($mois ==2){
        if($annee%4==0 && $annee%100 !=0){
            $n=29;
        }
        else{
            $n=28;
        }
        
    }

    if($mod == 0  && $mois != 2){
        $n=30;
    }

       
    for ($i = 1; $i <= $n; $i++)
    {
        echo "<button  onclick='openForm($i,$mois,$annee)'>".$i."-".$mois."-".$annee."</button>";
    }
}
    ?>