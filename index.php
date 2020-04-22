<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "rush");
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="rush.css">
</head>
<header id="headerindex">
    <?php
include("include/bar-nav.php");
?>
</header>

<body id="bodind">

    <main id="mainindex">
       
            <h1>Entraide confinement marseille</h1>


            

                <div>
                    <?php
                                            $date=date('Y-m-d');
                        $citation="SELECT * from citation ";
                        $citationQ=mysqli_query($connexion,$citation);
                        $citationR=mysqli_fetch_all($citationQ);

                        $text=$citationR[0][2];
                        $img=$citationR[0][3];

                        echo "$text <br>";
                        ?>
                        <img src="<?php echo $img?>">
                        
                        
            
                </div>

            <div>
                <h1>Les infos pratrique</h1>
                <p>...</p>
                <p>...</p>
                <p>...</p>
                <p>...</p>
                <p>...</p>

            </div>

        <div>

                <div>
                    <h1>Rubrique de sport</h1>

                    <div>
                        <?php
                        $req2="SELECT * FROM sport where jour= '$date'";
                        $req2Q=mysqli_query($connexion,$req2);
                        $req2R=mysqli_fetch_all($req2Q);
                        
                        $sport=$req2R[0][2];
                        ?>
                        <video src="<?php echo $req2R[0][4]?>" width="400" height="222" controls></video>
                        <?php
                        echo "Le sport du $date<br>";
                        echo"Le sport du jour est : $sport"; 
                        ?>

                    </div>

                </div>
                    <div>
                        <!-- mise a jour via la bdd manuelement afiche le dernier mis -->
                        <h1>LES CONSEILS DU JOURS</h1>
                        <?php
                        $date=date('Y-m-d');
                        $req1="SELECT * FROM conseil where jour= '$date'";
                        $req1Q=mysqli_query($connexion,$req1);
                        $req1R=mysqli_fetch_all($req1Q);
                        
                        $conseil=$req1R[0][2];
                        
                        echo "Le conseil du $date<br>";
                        echo"La sitation du jour est : $conseil";
                        ?>
                            <div>

                            </div>
                    </div>
        </div>

        <div>
            <?php
            include("include/formsport.php"); //sport
            include("include/formconseil.php"); //conseil
            ?>


    
    
        
      
    </main>
<footer>
</footer>
</body>

</html>