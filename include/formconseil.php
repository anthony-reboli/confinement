           <?php
            if(isset($_SESSION['login']) == "admin")
            {
                ?>
                <form method="post">
                <input type="submit" name="formulaire" value="conseil"> 
                </form>
                <?php
                if(isset($_POST['formulaire']))
                {
                    ?>
                    <form method="post">
                        <label>conseil</label>
                    <input type="text" name="nom2" placeholder="nom" required>
                    <input type="text" name="text2" placeholder="text" required>
                    <input type="date" name="date2" required>

                    <input type="submit" name="validerSC">
                </form>
                <?php

                }
            }

                if (isset($_POST['validerSC']))
                {
                    $nom=$_POST['nom2'];
                    $text=$_POST['text2'];
                    $date=$_POST['date2'];

                    if(!empty($nom) && !empty($text) && !empty($date))
                    {

                    $requete2="INSERT INTO conseil (nom,texte,jour) VALUES ('$nom','$text','$date')";
                    $requete2Q=mysqli_query($connexion,$requete2);
                    var_dump($requete2);
                    }
                }
            ?>