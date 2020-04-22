<?php

session_start();
?>

<html>
<head>
	<title>forumtopics</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="forum.css">

</head>

<body id="topic">
	<header class="header">
		
    <?php 
    include("bar-nav.php");
    ?>
   
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et postez vos topics maintenant";
    }
    elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez posté des messages maintenant.</b></h3>"; 
       }
    }
    ?>
	</header>



				<section id="conteneur">
								<h1 class="titre">Nos Topics</h1>
						<?php
						
								date_default_timezone_set('Europe/Paris');
								$connexion = mysqli_connect ("localhost","root","","rush");
								$requete1 = "SELECT *FROM topics INNER JOIN utilisateurs ";
								$query1 = mysqli_query($connexion,$requete1);
								$resultat1 = mysqli_fetch_all($query1);
								
								var_dump($resultat1);


									$i=0;
						foreach($resultat1 as $value)
							{
								$idto=$value[0];
							
							  			if ($_SESSION['login']=='admin') {
							  			}
							  		
							  
							  ?>
								<div id="formulaire"><a href="conversation.php?id=<?php echo $idto?>">
									<p class="titre"><?php echo $value[1]?></p></a>
									<p><?php echo $value[7]?></p>
									<p><?php echo $value[2]?></p>
									<p><?php echo $value[4]?></p>
										<?php
							  			if ($_SESSION['login']=='admin') {
									include("quantite.php");
										}	
									$i++;


							}
						
							?>


								</div>	

				</section>
				<footer class="footer">
					 <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory.</aside>
				</footer>
	
		</body>
</html>