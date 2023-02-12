<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/page.css">
</head>
<body>
    <?php
        $page="index";
        include 'views/header.php';
    ?>
    <main>
    <h1> Connexion </h1>
    <div class="survey">
        <form method="GET" action="controllers/login.php">
            <p>
                <label>Email :  </label> <input type="text" name="login" />
                <br>
                <label>Mot de Passe : </label> <input type="password" name="pwd" />
                <br>
                <div class="button_container">
                    <button type="submit" value="OK" >Se connecter</button>
                </div>
            </p>
        </form>
        
    </div>
    <a href="views/registerView.php"> Pas de compte ? Inscrivez-vous</a>
</main>
    <?php
        include 'views/footer.php';
    ?>
</body>
</html>