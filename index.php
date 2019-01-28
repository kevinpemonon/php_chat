<?php
    require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Mini-chat</title>
</head>
<body>
    <div id="main">

        <div id="mini_chat">

        <?php

        try
        {        
            $db = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } 

        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
            
        $lastname = $db->query('SELECT pseudo FROM mini_chat ORDER BY id DESC LIMIT 1')->fetch();
        
        if(isset($_SESSION['pseudo']))
            $pseudo = $_SESSION["pseudo"];
        else
            $pseudo = "";

        echo '  <form action="index_traitement.php" method="post" id="formulaire">
                    <div id="message">
                        <label>Message  </label><textarea name="message" required></textarea>
                    </div>';

                    if (isset($_SESSION['connect'])){

                        if ($_SESSION['connect'] == 1){
                        
                            echo '<input type="submit" value="ENVOYER" id="boutonValider">
                </form>';
                        }

                        else {
                            echo '
                </form>';
                        }
                    }
                    else {
                        echo '
                </form>';
                    }

        $reponse = $db->query('SELECT pseudo, message, DATE_FORMAT(date_message, "%d/%m/%Y à %Hh%imin%ss") AS date FROM mini_chat ORDER BY id DESC LIMIT 5')->fetchAll();

        ?>

            <div id="text_box">

                <h2>MESSAGES DU MINI-CHAT</h2>
                
                <div id="toutesLesReponses">
                    <?php

                        $compteur = 0;

                        foreach ($reponse as $value)
                        {
                            $compteur++;

                            if ($compteur == count($reponse))
                                echo '  <div id ="premiereReponse">';
                            else 
                                echo '  <div class ="uneReponse">';
                            
                                echo '      <p class="reponse_pseudo">'. htmlspecialchars($value['pseudo']) . ' : </p>
                                            <p class="reponse_message">' . htmlspecialchars($value['message']) . '</p>
                                            <p class="reponse_date">Envoyé le ' . $value['date'] . '</p>
                                        </div>';
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>