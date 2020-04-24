<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../CSS/confinement.css">
    <title>Profil</title>
</head>

<body id="bodyusers">
    <header>
      <?php
        include("../include/bar-nav.php");
        ?>  
    </header>

    <main id="mainusersra">

  <?php
  session_start();
   
  if (isset($_SESSION['login']))
  {
    $id= $_GET['id'];
    $connexion = mysqli_connect("localhost","root","","rush");

    $requete = "SELECT * FROM utilisateurs WHERE id= $id";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
 
  ?>
   
            <div id="containerusertot">
              <div id="containeruser">
                
              <h1 class="titre2users">Info de l'utilisateur</h1>
                <div class="blocuser">

                        <div id="mainuser">
                            <h1 class="titre">Profil de <?php echo $data['login'] ?></h1>
                  
                                <?php
                                $LoginS= $_SESSION['login'];
                                ?>
                                <p>Inscrit le: <?php echo $data['date']?></p>

                                <p>arrondissement: <?php echo $data['arrondissement']?></p>

                    </div>
                </div>
            
       
   
   
  <?php
  if ($_SESSION['login'] == 'admin'){
    ?>
    <div id="boutonuserssup">
    <form method="post">
          <input type="submit" name="supri" value="suprimer">
        </form></div>
    </div>
   </section>
  <?php

    if(isset($_POST['supri']))
    {
      $user=$_GET['id'];
      $requetesup="DELETE FROM utilisateurs where id='$user'";
      $requetesupQ=mysqli_query($connexion,$requetesup);
      header("location:../index.php");
    }
    
                                      }
}
         else
        {
        header("location:../sources/connexion.php");
        }
 
 
?>  </main>
         <footer class="footer">
            <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Gregory-F & Anthony & Alexandra & Gregory-J & Mohamed</p></aside>
        </footer>
 
 
    </body>
</html>