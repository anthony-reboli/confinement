<?php

session_start();
if(isset($_SESSION['login']))
{
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
    include("../include/bar-nav.php");
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
			<h1 id="titres">Bienvenue sur nos Topics!</h1>
		
					<div id="creerto">
						<h1 id="titres">Creer vos Topics</h1>
					<?php
					$connexion = mysqli_connect ("localhost","root","","rush");
				

					if (isset($_POST['creerto'])) {

						?>
					
					<form method="post">
					<label class="title">Titre</label><br>
					<input class="formto" type="text" name="titre" required><br>
					<label class="title">Description</label><br>
					<input class="formto" type="text" name="description" required><br>
					<button name="valid"><img width="40" height="40" src="../upload/ok.jpg"></button>
					</form>
					<?php	

					}
					
						if (isset($_SESSION['login']))
						{
						$user = $_SESSION['login'];
						}

						$requete1 = "SELECT * FROM topics INNER JOIN utilisateurs ON user_id=utilisateurs.id where login = '$user' ORDER BY datetopic DESC ";
						$query1 = mysqli_query($connexion,$requete1);
						$resultat1 = mysqli_fetch_all($query1);

						$arrond=$resultat1[0][9];
						$id=$resultat1[0][6];
						if (isset($_POST['valid'])) {
						$description=$_POST['description'];
						$titre=$_POST['titre'];
						$login=$_SESSION['login'];

						$requet="INSERT INTO topics (title, description, user_id, arrondtopic,datetopic) VALUES ('$titre','$description', '$id', '$arrond', NOW())";

						$query=mysqli_query($connexion,$requet);

					}
					if (isset($_POST['creer'])) {
					}
					?>

					<form method="post">
					<button name="creerto"><img width="30" height="30" src="../upload/ajout.png"></button>
					</form>

					<form method="post">
					<button name="creer"><img width="40" height="40" src="../upload/corbeille.png"></button>

					</form>
					</div>

					
					





        <h1 id="titres">Nos Topics</h1>
				<section id="conteneur">
								
						<?php
						
								date_default_timezone_set('Europe/Paris');
								$connexion = mysqli_connect ("localhost","root","","rush");
								if(isset($_SESSION['login']))
									{
								$login=$_SESSION['login'];

									}
									$id2=$resultat1[0][9];
								$requete1 = "SELECT * FROM topics INNER JOIN utilisateurs ON user_id=utilisateurs.id where arrondtopic = $id2 ORDER BY datetopic DESC";
								$query1 = mysqli_query($connexion,$requete1);
								$resultat1 = mysqli_fetch_all($query1);
								if(empty($resultat1[0][9]))
								{

								}
								else{


								$arrond=$resultat1[0][9];
							}
								
									
									if (empty($arrond))
															{
									

							}
																			
								else{
									$i=0;
						foreach($resultat1 as $value)
							{
								$idto=$value[0];		
							  ?>
								<div id="formulaire">
									<a class="lien" href="message.php?id=<?php echo $idto?>">
									<p class="title">Titre:<br><?php echo $value[1]?></p></a>
									<p class="title">Login:<br><a class="lien" href="users.php?id=<?php echo $value[6]?>"><?php echo $value[7]?></p></a>
									<p class="title">Description du topic:<br><?php echo $value[2]?></p>
									<p class="title">Date du topic:<br><?php echo $value[4]?></p>
									<p class="title">Arrondissement:<br><?php echo $value[5]?></p>
										<?php
											if(isset($_SESSION['login'])){


											if ($_SESSION['login']=='admin') 
											{
											include("../include/quantite.php");
											}
										}
									$i++;
								echo "</div>";
								}
																	}


							?>


								


				</section>
			
         <footer class="footer">
            <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Gregory-F & Anthony & Alexandra & Gregory-J & Mohamed</p></aside>
        </footer>
		</body>
</html>
<?php
}
else{
	header("location:../sources/connexion.php");
}
?>