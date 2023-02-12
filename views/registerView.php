<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
</head>
<body>
    <?php
        $page="register";
        include 'header.php';
    ?>

    <main>
    <h1> Inscription</h1>
    <div class="survey2">
        <form method="GET" action="../controllers/register.php">
            <p>
                <label>Nom :</label><input type="text" name="nom" />
                <br>
                <label>Prenom :</label><input type="text" name="prenom" />
                <br>
                <label>Email :</label><input type="email" name="login" />
                <br>
                <label>Mot de passe :</label><input type="password" name="pwd" />
                <br>
                <p>Je suis : </p>
                    <div class="radio_choice">
                        <div>
                            <input type="radio" id="user" name="rank" value="1"checked>
                            <label for="user">Joueur</label>
                        </div>

                        <div>
                            <input type="radio" id="admin" name="rank" value="2">
                            <label for="admin">Arbitre</label>
                        </div>

                        <div>
                            <input type="radio" id="user" name="rank" value="3">
                            <label for="user">Autre</label>
                        </div>

                    </div>
                <br>
                <div class="button_container">
                    <button type="submit" value="OK" >M'inscrire</button>
                </div>
            </p>
        </form>
    </div>
    <a href="../index.php">Déjà inscrit ? Connectez-vous</a>
</main>
    
    <?php
        include 'footer.php';
    ?>

</body>
</html>