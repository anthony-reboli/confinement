<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/confinement.css">
    <title>Profil</title>
</head>

<body id="boduser">
<header>
</header>

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
   
        <div id="containeruser">
          <h1 class="titre2">Info de l utilisateur</h1>
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
    
     


    <?php


    
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
           <footer class="footer">
              <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
              
            </footer>
 
 
    </body>
</html>