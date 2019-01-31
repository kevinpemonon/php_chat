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

    // if (strlen($pseudo) > 25) {

    //     header("Location: index.php");
    //     return;
    // }

    $message = $_POST['message'];

    if ((strlen($message) > 55 && array_search(" ", str_split($message)) == false) || strlen($message) > 160){

        header("Location: index.php");
        return;
    }

    $req_id = $db->prepare('SELECT id FROM user WHERE pseudo = ?');
    $req_id->execute(array($pseudo));
    $id_user = $req_id->fetch();

    //var_dump($id_user);

    $req = $db->prepare('INSERT INTO messages (id_user, pseudo, contenu, date_message) VALUES(?, ?, ?, NOW())');
    $req->execute(array($id_user['id'], htmlspecialchars($pseudo), htmlspecialchars($message)));

    header('Location: index.php');

?>