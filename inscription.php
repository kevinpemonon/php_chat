<?php
    require_once('header.php');
?>

<style>
    
    html{
        background-color: rgb(218,165,32, 0.5);
    }

    body{
        margin: 0;
    }

    #formulaire_inscription{
        margin-top: 300px;
        margin-left: 600px;
        width: 400px;
    }

    input{
        margin-bottom: 10px;
        height: 30px;
    }

</style>

<form action="inscription_traitement.php" method="post" id="formulaire_inscription">
    <input type="text" name="pseudo" placeholder="Pseudo" required>
    <input type="text" name="mail" placeholder="Mail" required>
    <input type="text" name="pwd" placeholder="Mot de passe" required>
    <input type="text" name="pwd_confirm" placeholder="Confirmation Mot de passe" required>
    <input type="submit" value="VALIDER">
</form>