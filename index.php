<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "rush");
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="confinement.css">
</head>



<body id="ARbodyind">
    <header id="ARheaderindex">

      <?php include 'bar-nav.php';?>
    </header>

    <main id="ARmainindex">
       
        <section id="ARsection_haut">

            <?php
                                            $date=date('Y-m-d');
                $citation="SELECT * from citation where date='$date'";
                $citationQ=mysqli_query($connexion,$citation);
                $citationR=mysqli_fetch_all($citationQ);

                $text=$citationR[0][1];
                $img=$citationR[0][2];
                        

                echo "<h1 id='ARtitre_zen'> $text <br></h1>";
            ?>
                
                <article id="ARarticle_zen">
                        <img id="ARimages_zen" src="upload/<?php echo $img?>">
                </article>

        </section>


        <section id="ARsectionmilieu">
                        
            <article id="ARarticle_sport">

                <article id="ARtitrerubrique">
                        <h1 id="ARh1sport">Rubrique Sport</h1>
                </article>
                    
                    <?php
                    $req2="SELECT * FROM sport where jour= '$date'";
                    $req2Q=mysqli_query($connexion,$req2);
                    $req2R=mysqli_fetch_all($req2Q);
                        
                    $sport=$req2R[0][2];
                    
                    echo "<h1 id='ARtitresport'>Le sport du Jour $date<br></h1>";
                    ?>
                    <video id="ARvideosport"src="upload/<?php echo $req2R[0][4]?>" width="400" height="222" controls></video>
            </article>


                <article id="ARtexte_sport">
                    <?php
                    echo "<p id='ARsport'>$sport</p>";
                    ?>
                </article>
   
        </section>

            <article id="ARh1Grosconseil">
                <h1 id="ARtitreconseil">Rubrique Conseils</h1>
            </article>


        <section id="ARsectionbas">

            <article id="ARarticle_conseils">
                <!-- mise a jour via la bdd manuelement afiche le dernier mis -->
                <h1 class="ARh1conseils">LES CONSEILS DU JOURS</h1>
                <?php
                $date=date('Y-m-d');
                $req1="SELECT * FROM conseil where jour= '$date'";
                $req1Q=mysqli_query($connexion,$req1);
                $req1R=mysqli_fetch_all($req1Q);
                $conseil=$req1R[0][2];
                        
                echo "Le conseil du $date<br>";
                echo"<p id='ARconseils'>$conseil</p>";
                     
                ?>
            </article>


            <article id="ARarticle_infos">
                <h1 class="ARh1infos">LES INFOS PRATIQUES</h1>
                <a href="https://www.maquestionmedicale.fr/?gclid=EAIaIQobChMI5rSa8p_86AIVDMjeCh0ciQCaEAAYASAAEgIcV_D_BwE"><strong>Medecin en ligne</strong></a>
                <p><strong>Pompiers: 18</strong></p>
                <p><strong>Samu: 15</strong></p>
                <p><strong>police: 17</strong></p>
                <p><strong>Mairie: 04.91.55.11.11</strong></p>
            </article>

        </section>
        
        <section id="ARformindex">
            <?php
            include("include/citationform.php"); //citation
            include("include/formsport.php"); //sport
            include("include/formconseil.php"); //conseil
            
            ?>
        </section>
    </main>

         <footer class="footer">
            <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Gregory-F & Anthony & Alexandra & Gregory-J & Mohamed</p></aside>
        </footer>

</body>

</html>