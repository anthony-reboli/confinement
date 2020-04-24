           <?php
            if(isset($_SESSION['login']) == "admin")
            {

                
                ?>
                    <section class='ARsubmit'>

                        <form method="post">
                            <input id='ARsportsubmit' type="submit" name="validerS" value="sport">
                        </form>

                    </section>
                <?php
                

                if(isset($_POST['validerS']))
                {

        ?>
            <section class='ARformulaire'>

                <form method="post">
                        <label class='ARlabel'>sport</label>
                    <input class='ARinputform' type="text" name="nom" placeholder="nom" required>
                    <input class='ARinputform' type="text" name="text" placeholder="text" required>
                    <input class='ARinputform' type="date" name="date" required>
                    <input class='ARinputform' type="text" name="video" placeholder="video" required>

                    <input class='ARinputvalid' type="submit" name="validerSS">
                </form>

            </section>
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