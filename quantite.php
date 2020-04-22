<?php
		$connexion = mysqli_connect("localhost","root","","rush");
      	$idto=$value[0];

   
		if (isset($_POST["supp$i"])) 
		{

		
				$eff= ("DELETE FROM topics WHERE id=$idto ");
				var_dump($eff);
				$query2=mysqli_query($connexion,$eff);
				header("refresh:0");
				
	
		}
	
		?>
	<form method="post" >
	<button type="submit"name="supp<?php echo $i ?>" ></button>
	</form>	
	
																  

	
	
	




		
	

			




	

