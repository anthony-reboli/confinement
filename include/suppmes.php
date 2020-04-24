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
	<form method="post" >
	<button type="submit"name="supp<?php echo $i ?>" >sup</button>
	</form>	