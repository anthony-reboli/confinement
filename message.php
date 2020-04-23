<?php

    session_start();
    $connexion = mysqli_connect("localhost", "root", "", "rush");
    date_default_timezone_set('europe/paris');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <header>
        <?php include 'bar-nav.php'?>
    </header>
    <main>
        
        <?php
        $id = $_GET["id"];
        if (isset($_SESSION["login"])) 
        {
        ?>
        <section>
            <h1 class="titre">Postez ici vos messages</h1>
            <form action="message.php?id=<?php echo $id ?>" method="post" class="">
                <label>Envoyer un message</label>
                <input type="text" name="message" required>
                <input class="bouton" type="submit" value="envoyer" name="envoyer">
            </form>
        </section>
        <?php

            if (isset($_POST['envoyer']))
           {     
   

               $message = $_POST["message"];
               $iduser = $_SESSION["id"];
              

               $requete = "INSERT INTO messages(message, id_user, id_topic, date) VALUES ('$message','$iduser', '$id', NOW())";
               $query= mysqli_query($connexion, $requete);

               $requet = "SELECT id FROM messages WHERE date = NOW()";
                $querym = mysqli_query($connexion, $requet);
                $resultatmes = mysqli_fetch_assoc($querym);
           
                $idmessage = $resultatmes["id"];
           
                $querylike = mysqli_query($connexion, $requetelike);

                header("location:message.php?id=$id");
            }
        }
        else
        {
            echo "<h2>Connectez-vous pour pouvoire poster des messages</h2>";
        }

        

        $requetemes = "SELECT messages.id,message, messages.date,utilisateurs.id,login FROM messages INNER JOIN utilisateurs ON id_user = utilisateurs.id WHERE id_topic=$id ORDER BY messages.id DESC";
        $querymes = mysqli_query($connexion, $requetemes);
        $resultat1 = mysqli_fetch_all($querymes);

        $i = 0;
        $idmsg = $resultat1[$i][0];

          foreach ($resultat1 as $avis)
           {
           ?>
          <article class="messa">
            <div id="user">
              <p>Posté le: <i><?=$avis[2]?></i></p>
              <p>Par: <b><?=$avis[4]?></b></p>
            </div>
            <div id="avis">
              <p><?=$avis[1]?></p>
            </div>
            <div>
               <?php 
            if(isset($_SESSION['login']))
            {
               include("like.php");
               $i += 1;
            }

               ?>
            </div>
            <div>
                <?php
               if (isset($_SESSION['login'])=='admin') 
               {
                include("suppmes.php");
               }
               $i++;   
                ?>
            </div>

          </article>
           <?php
           }
          ?>
    
    </main>

</body>
</html>