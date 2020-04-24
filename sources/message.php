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
  <link rel="stylesheet" type="text/css" href="../CSS/confinement.css">
</head>
<body class="bodmes">
    <header id="ARheaderindex">
        <?php include '../include/bar-nav.php';?>
    </header>
    <main class="tab-mes">
        
        <?php
        $id = $_GET["id"]; 
        $requeteto="SELECT * FROM topics WHERE id = $id";
        $queryto= mysqli_query($connexion, $requeteto);
        $reponse= mysqli_fetch_all($queryto);
        foreach ($reponse as $value) 
        {
            ?>
            <article class="tit-top">
                <h1><b>Topic <?=$value[1]?></b></h1>
            </article>
            <?php
        }
        if (isset($_SESSION["login"])) 
        {
        ?>
            <article class="esp-form">
            
                <form action="message.php?id=<?php echo $id ?>" method="post" class="mes-form">
                    <label><b>Envoyer un message</b></label>
                    <input class="inputa" type="text" name="message" required>
                    <input class="bouton" type="submit" value="envoyer" name="envoyer">
                </form>
            </article>
        <?php

            if (isset($_POST['envoyer']))
           {     
   

               $message = $_POST["message"];
               $iduser = $_SESSION["id"];
              

               $requete = "INSERT INTO messages(message, id_user, id_topic, date) VALUES ('$message','$iduser', '$id', NOW())";
               $query= mysqli_query($connexion, $requete);

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
     

          foreach ($resultat1 as $avis)
           {
           ?>
        <section class="affichage">
          <article class="message">
            <div id="user">
              <p>Posté le: <i><?=$avis[2]?></i></p>
              <p>Par: <a href="users.php?id=<?=$avis[3]?>"><b><?=$avis[4]?></b></a></p>
            </div>
            <div id="mess">
              <p><?=$avis[1]?></p>
            </div>
            <div>
            </div>
            <div id="supp">
                <?php
                
               if (isset($_SESSION['login'])) 
               {
                if ($_SESSION['login'] == "admin"){
                include("../include/suppmes.php");
               }
             }
               $i++;   
                ?>
            </div>

          </article>
      </section>
           <?php
           }       
          ?>
    
    </main>
         <footer class="footer">
            <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Gregory-F & Anthony & Alexandra & Gregory-J & Mohamed</p></aside>
        </footer>

</body>
</html>