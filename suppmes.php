<?php
		$connexion = mysqli_connect("localhost","root","","rush");

      $idmes= $avis[0];
   
		if (isset($_POST["supp$i"])) 
		{

		
				$eff= ("DELETE FROM messages WHERE id=$idmes ");
	
				$query2=mysqli_query($connexion,$eff);
				header("location:message.php?id=$id");
				
	
		}
	
		?>
	<form method="post" id="supp">
	<button style='color:#709463b3' type="submit" name="supp<?php echo $i ?>" ><img height="30" src="https://pngimage.net/wp-content/uploads/2018/05/bouton-supprimer-png-6.png"></button>
	</form>	