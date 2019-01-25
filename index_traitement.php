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
    
    $pseudo = $_SESSION['pseudo'];

    if (strlen($pseudo) > 25) {

        header("Location: index.php");
        return;
    }

    $message = $_POST['message'];

    if ((strlen($message) > 55 && array_search(" ", str_split($message)) == false) || strlen(message) > 160){

        header("Location: index.php");
        return;
    }

    $req = $db->prepare('INSERT INTO mini_chat (pseudo, message, date_message) VALUES(?, ?, NOW())');
    $req->execute(array(htmlspecialchars($pseudo), htmlspecialchars($message)));

    header('Location: index.php');

?>