<?php

    session_start();

$connexion =  mysqli_connect("localhost","root","","rush");
if (!isset($_SESSION["login"])) {
    

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="confinement.css">
</head>

<body id="inscriptionbod">
   <header id="ARheaderindex">
        <?php include 'bar-nav.php';?>
    </header>
    <main id="inscriptionmain">

    <div class="inscription">
    <div class="bulleinsc">
    <div class="bulleinsctxt">
        <h1> Inscription </h1>
    </div>   
    </div>
        <section>
        

        <form id="forminsc" method='POST'>

        <div class="formulaire">
            <article>
                <label class="labins"> Login </label><input class="input" type="text" name='login' placeholder="Login" required />
                
            </article>


            <article>
                <label class="labins"> Mot de passe </label><input class="input" type="password" name='mdp1' placeholder="Mot de passe" required />
                
            </article>

            <article>
                <label class="labins"> Confirmation de mot de passe </label><input class="input" type="password" name='mdp2' placeholder="Confirmation" required />
                
            </article>


            <article>
                <label class="labins"> Votre code postal </label><input class="input" type="number" name='code' placeholder="Code postal" required />
                
            </article>

        

            <button class="boutonin" name="inscription">Inscription</button>
    
            <?php

        if (isset($_POST['inscription']))
       {
            $login = $_POST['login'];
            $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
            $code = $_POST['code'];


        

            if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,password,arrondissement)
                VALUES ('$login','$mdp','$code')";
            $query=mysqli_query($connexion,$sql);
            var_dump($sql);
            // header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           } echo "</div>";
        }

    ?>
        
        </form>
    </div>
        
    </section>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté impossible de s'inscrire !!</p>
    </section>
        <?php
    }
    ?>
        </form>
    </section>


   </main>
    <footer class="footer">
        <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Gregory-F & Anthony & Alexandra & Gregory-J & Mohamed</p></aside>
    </footer>
</body>

</html>