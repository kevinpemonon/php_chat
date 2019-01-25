<?php

    session_start();

    try
    {        
        $db = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } 

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwd_confirm = $_POST['pwd_confirm'];


    if ($pwd == $pwd_confirm){

        $req = $db->prepare('INSERT INTO user (pseudo, mail, pwd) VALUES(?,?,?)');
        $req->execute(array($pseudo, $mail, $pwd));

        header('Location: index.php');
    }

?>