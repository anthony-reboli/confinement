           <?php
            if(isset($_SESSION['login']) == "admin")
            {
                ?>
                <form method="post">
                <input type="submit" name="validerS" value="sport">
                </form>
                <?php
                if(isset($_POST['validerS']))
                {
                    ?>
                    <form method="post">
                        <label>sport</label>
                    <input type="text" name="nom" placeholder="nom" required>
                    <input type="text" name="text" placeholder="text" required>
                    <input type="date" name="date" required>
                    <input type="text" name="video" placeholder="video" required>
                    <input type="submit" name="validerSS">
                </form>
                <?php

                }
            }

                if (isset($_POST['validerSS']))
                {
                    $nom=$_POST['nom'];
                    $text=$_POST['text'];
                    $date=$_POST['date'];
                    $video=$_POST['video'];

                    if(!empty($nom) && !empty($text) && !empty($date) && !empty($video))
                    {

                    $requete1="INSERT INTO sport (nom,texte,jour,video) VALUES ('$nom','$text','$date','$video')";
                    $requete1Q=mysqli_query($connexion,$requete1);
                    var_dump($requete1);
                    }
                }
            ?>