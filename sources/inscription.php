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
    <link rel="stylesheet" href="boutique.css">
</head>

<body id="inscriptionbod">
    <header>
        <?php include("bar-nav.php");?>
    </header>
    <main id="inscriptionmain">
    

    <h1> Inscription </h1>
        <section>
        

        <form id="forminsc" method='POST'>


            <article>
                <label class="labins"> Login </label>
                <br><input type="text" name='login' required />
            </article>


            <article>
                <label class="labins"> Mot de passe </label>
                <br><input type="password" name='mdp1' required />
            </article>

            <article>
                <label class="labins"> Confirmation de mot de passe </label>
                <br><input type="password" name='mdp2' required />
            </article>


            <article>
                <label class="labins"> Votre code postal </label>
                <br><input type="number" name='code' required />
            </article>



            <button class="boutonin" name="inscription"></button>

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
           }
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
<?php include('footer.php');?>

</body>

</html>