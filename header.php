<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div id="header">
        <div id="login">

        <?php

            if (isset($_SESSION['connect'])){

                if ($_SESSION['connect'] == 1){
                    
                    echo '  <p id="connect">Vous êtes connectés.</p>
                            <div>
                                <a href="deconnexion_traitement.php" id="deconnexion">DECONNEXION</a>
                            </div>';
                }

                else {

                    echo '  <form action="connexion_traitement.php" method="post" id="form_connexion">
                                <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off" value="" id="pseudo_connexion">
                                <input type="password" name="password" id="password_connexion" placeholder="Mot de passe" autocomplete="off">
                                <input type="submit" id="valider_connexion" value="VALIDER">
                            </form>
                            <div>
                                <a href="inscription.php" id="inscription">S\'INSCRIRE</a>
                            </div>';
                }
            }

            else {

                echo '  <form action="connexion_traitement.php" method="post" id="form_connexion">
                            <input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off" value="" id="pseudo_connexion">
                            <input type="password" name="password" id="password_connexion" placeholder="Mot de passe" autocomplete="off">
                            <input type="submit" id="valider_connexion" value="VALIDER">
                        </form>
                        <div>
                            <a href="inscription.php" id="inscription">S\'INSCRIRE</a>
                        </div>';
            }
        ?>

        </div>
    </div>
</body>
</html>