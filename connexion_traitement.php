<?php

    session_start();
    $_SESSION['connect'] = 0;

    try
    {        
        $db = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } 

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    if (strlen($_POST['pseudo']) == 0 || strlen($_POST['password']) == 0){
        header('Location: index.php');
    }

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $allPseudo = $db->query('SELECT pseudo FROM user')->fetchAll();

    foreach($allPseudo as $onePseudo){
        
        if($pseudo == $onePseudo['pseudo']){
           
            $req = $db->prepare('SELECT pwd FROM user WHERE pseudo = ?');
            $req->execute(array($pseudo));
            $dbPassword = $req->fetch();
            

            if($dbPassword['pwd'] == $password){
                $_SESSION['connect'] = 1;
                $_SESSION['pseudo'] = $pseudo;

                header('Location: index.php');
            }

            else {
                
                header('Location: index.php');
            }


        }
    }

?>