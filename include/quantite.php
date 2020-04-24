<?php
		$connexion = mysqli_connect("localhost","root","","rush");
      	$idto=$value[0];

   
		if (isset($_POST["supp$i"])) 
		{

		
				$eff= ("DELETE FROM topics WHERE id=$idto ");
				$query2=mysqli_query($connexion,$eff);
				//header("refresh:0");


		
		}
	
		?>
	<form method="post" >
	<button name="supp<?php echo $i ?>" id="btsuppto" ><img width="40" height="40" src="../upload/corbeille.png"></button>
	</form>	
	
																  

	
	
	




		
	

			




	

