<?php


    session_start();
    $ismdpwrong = false;
    $isIDinconnu = false;
    $ischampremplis = false;

    if ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['password']) && strlen($_POST['password']) != 0 ) {
        $connexion = mysqli_connect("localhost", "root", "", "rush");
        $requete = "SELECT * FROM utilisateurs WHERE login ='".$_POST['login']."'";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query);
        var_dump($resultat);

        if ( !empty($resultat) ) {
            if ( password_verify($_POST['password'], $resultat[0][2]) )
                    {
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['id'] = $resultat[0][0];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location:index.php');
                    }
            else {
                $ismdpwrong = true;
            }
        }
        else {
            $isIDinconnu = true;
        }
        mysqli_close($connexion);
    }
    elseif ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) == 0 || isset($_POST['password']) && strlen($_POST['password']) == 0 ) {
        $ischampremplis = true;
    }

?>

<!DOCTYPE html>

<html>
<head>
    <title>boutique - Connexion</title>
    <link rel="stylesheet" type="text/css" href="confinement.css">
    <meta charset="utf-8">
</head>
<body id="connexionbody">
    <header>
        
    </header>
<main id="maincon">
   
    
  
                <?php
                if ( !isset($_SESSION['login']) ) {
                    ?>
                
                     <section class="conteneur1">
             <h1 style="color:#26ec2e;">Connexion</h1>
                    
                    <form method="post">
                    
                            <label>Identifiant</label>
                            <br><input type="text" name="login" ><br />
                            <label>Mot de passe</label>
                            <br><input type="password" name="password" ><br />
                            <button type="submit" class="bouton" name="connexion"></button>
                        
                    </form>
                    <?php
                    if ( $ismdpwrong == true ) {
                    ?>
                        <p class="pincorrect">Identifiant ou mot de passe incorrect.</p>
                    <?php
                    }
                    elseif ( $isIDinconnu == true ) {
                    ?>
                        <p class="pincorrect">Cet identifiant n'exsite pas.</p>
                    <?php
                    }
                    elseif ( $ischampremplis == true ) {
                    ?>
                        <p class="pincorrect">Merci de remplir tous les champs!</p>
                    <?php
                    }
                    ?>
                    
                <?php
                }

                elseif ( isset($_SESSION['login']) ) {
                ?>
                    <center><p>ERREUR<br />
                    Vous êtes déjà connecté !</p></center>
            
                <?php
                }
                ?>
        </section>


    
       </main>
        
            <footer>
            </footer>
               
    </body>
</html>