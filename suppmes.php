<?php
		$connexion = mysqli_connect("localhost","root","","rush");

      $idmes= $avis[0];
   
		if (isset($_POST["supp$i"])) 
		{

		
				$eff= ("DELETE FROM messages WHERE id=$idmes ");
	
				$query2=mysqli_query($connexion,$eff);
				header("refresh:0");
				
	
		}
	
		?>
	<form method="post" >
	<button type="submit"name="supp<?php echo $i ?>" >sup</button>
	</form>	