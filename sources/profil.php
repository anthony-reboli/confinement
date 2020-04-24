<html>

<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../CSS/confinement.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Profil</title>
</head>
        <?php
        session_start();
        ?>
<body class="bodyprofil">
        <header id="ARheaderindex">
            <?php include '../include/bar-nav.php';?>
      </header>
      <main id="profilmainar">

        <?php

        // include("bar-nav.php");
        if (isset($_SESSION['login']))
        {
          $connexion = mysqli_connect("localhost","root","","rush");

          $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
          $req = mysqli_query($connexion, $requete);
          $data = mysqli_fetch_assoc($req);

  ?>
    <section id="conteneur1">
        
      
        <?php
      $LoginS= $_SESSION['login']; 
      ?>

        <article id="H1prof">
        <h1 class="titre2">Profil de <?php echo $LoginS ?></h1>
        </article>


      <article id='profc'>
        <div id="main">

    
            <h3 id="H3prof">changement de mot de passe et pseudo</h3>
              <form name="loginform" id="loginform" action="#" method="post" enctype="multipart/form-data" class="wpl-track-me"> 
                <div class="inputprofil">
                <p class="login-username">
                    <label class="profform" for="user_login">Username</label> 
                    <input type="text" id="user_login" class="input" placeholder="New Username" value="<?php echo $data['login']?>" size="20" name="login"/>
                </p>

                <p class="login-password"> 
                    <label class="profform" for="user_pass">Password</label>
                    <input type="password" name="mdp" id="user_pass" class="input" placeholder="New Password" value="<?php echo $data['password']?>" size="20"/> 
                </p>  
                <div id="boutonmodifprofil">
                <input type="submit" name="Modifier" id="submit" class="button-primary" value="Modifier" />
                    <input type="hidden" name="redirect_to" value="#"/>
                
                </div>
                </div>  
              <div id="info-prof">
                <p class="profform">Inscrit le : <?php echo $data['date']?></p>
                <p class="profform">Arrondissement : <?php echo $data['arrondissement']?></p>
              </div>
              </form>
    

       </div>



    </article>

   </section>
  <?php

    if(isset($_POST['supri']))
    {
      $user=$data['id'];
      $requetesup="DELETE FROM utilisateurs where id='$user'";
      $requetesupQ=mysqli_query($connexion,$requetesup);
      session_unset();
      header("location:../index.php");
    }

    if (isset($_POST['Modifier']))
    {


      $login = $_POST['login'];
      $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));

      $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
      $query2=mysqli_query($connexion,$requete2);
      session_unset();
      header("location:connexion.php?reconnect=1");
    }
  }
  else 
  {
  ?>
    <section id="notcon">
      <p id="pascopro">Veuillez vous connecter pour accéder à votre page !</p>
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

        
