<?php

session_start();
?>

<html>
<head>
	<title>forumtopics</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/confinement.css">

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
					<h1 id="titres">Creer vos Topics</h1>

					<?php
					$connexion = mysqli_connect ("localhost","root","","rush");
					//date_default_timezone_set('Europe/Paris');
								//$connexion = mysqli_connect ("localhost","root","","rush");
								//$login=$_SESSION['login'];
							// 	$requete = "SELECT * FROM topics INNER JOIN utilisateurs ON utilisateurs.id=user_id";
							// 	$query = mysqli_query($connexion,$requete);
							// 	$resultat = mysqli_fetch_all($query);
							// var_dump($resultat);
							// 	$arrond=$resultat[0][9];
							// 	$id=$resultat[0][3];
									//$req="SELECT login FROM `topics` inner join utilisateurs ON utilisateurs.id=user_id";
									//$query2= mysqli_query($connexion,$req);
											//$resultat2 = mysqli_fetch_all($query2);
												//var_dump($resultat2);

					if (isset($_POST['creerto'])) {

						?>

					<form method="post">
					<label>Titre</label><br>
					<input type="text" name="titre" required><br>
					<label>Description</label><br>
					<input type="text" name="description" required><br>
					<input type="submit" name="valid"><br>
					</form>
					<?php	

					}
					if (isset($_POST['valid'])) {
						$titre=$_POST['titre'];
						$login=$_SESSION['login'];
						$description=$_POST['description'];
						$requete1 = "SELECT * FROM topics INNER JOIN utilisateurs ON user_id=utilisateurs.id ORDER BY datetopic DESC";
						$query1 = mysqli_query($connexion,$requete1);
						$resultat1 = mysqli_fetch_all($query1);

						$arrond=$resultat1[0][9];
						$id=$resultat1[0][6];
						$requet="INSERT INTO topics (title, description, user_id, arrondtopic,datetopic) VALUES ('$titre','$description', '$id', '$arrond', NOW())";
						$query=mysqli_query($connexion,$requet);
						var_dump($requet);

					}
					if (isset($_POST['creer'])) {
					}
					?>

					<form method="post">
					<input type="submit" name="creerto" value="Création">
					</form>

					<form method="post">
					<input type="submit" name="creer" value="Annuler">
					</form>

					
					






				<section id="conteneur">
								<h1 id="titres">Nos Topics</h1>
						<?php
						
								date_default_timezone_set('Europe/Paris');
								$connexion = mysqli_connect ("localhost","root","","rush");
								$login=$_SESSION['login'];
								$requete1 = "SELECT * FROM topics INNER JOIN utilisateurs ON user_id=utilisateurs.id ORDER BY datetopic DESC";
								$query1 = mysqli_query($connexion,$requete1);
								$resultat1 = mysqli_fetch_all($query1);
								var_dump($resultat1);
								$arrond=$resultat1[0][9];

					
				
						
								
									$i=0;
						foreach($resultat1 as $value)
							{
								$idto=$value[0];		
							  ?>
								<div id="formulaire">
									<a href="conversation.php?id=<?php echo $idto?>">
									<p class="titre">Titre:<br><?php echo $value[1]?></p></a>
									<p>Login:<br><?php echo $value[7]?></p>
									<p>Description du topic:<br><?php echo $value[2]?></p>
									<p>Date du topic:<br><?php echo $value[4]?></p>
									<p>Arrondissement:<br><?php echo $value[5]?></p>
										<?php	
											if ($_SESSION['login']=='admin') 
											{
											include("quantite.php");
											}
									$i++;
								echo "</div>";
								


							}

							?>


								


				</section>
				<footer class="footer">
					 <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory.</aside>
				</footer>
	
		</body>
</html>