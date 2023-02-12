<header>
        <div  id='container_header'>
            <?php 
                if($page=="index"){
                    echo "
                        <div>
                            <img src='assets/img/logo.png'>
                        </div>
                    ";
                }
                else if($page=="register"){
                    echo "
                        <div>
                            <img src='../assets/img/logo.png'>
                        </div>
                    ";
                }

                else if ($page=="Traitement"){
                    echo "
                    <div>
                        <a href='../views/home.php'>
                        <img src='../assets/img/logo.png'>
                        </a>
                    </div>
                    <div class='deconnexion'>
                            <a href='../controllers/logout.php'>
                            <p>Déconnexion</p>
                            </a>
                            <a href=''>
                            <p><i class='fas fa-user-circle fa-2x'></i></p>
                            </a>
                    </div> 
                    
                    ";
                }

                else{
                    echo "
                    <div>
                        <a href='./home.php'>
                        <img src='../assets/img/logo.png'>
                        </a>
                    </div>
                    <div class='deconnexion'>
                            <a href='../controllers/logout.php'>
                            <p>Déconnexion</p>
                            </a>
                            <a href=''>
                            <p><i class='fas fa-user-circle fa-2x'></i></p>
                            </a>
                    </div> 
                    
                    ";
                }
            ?>
        </div>
</header>

<script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>
