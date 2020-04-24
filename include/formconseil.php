           <?php
            if(isset($_SESSION['login']) == "admin")
            {

            
                ?>
                    <section class='ARsubmit'>

                        <form method="post">
                            <input id='ARconseilsubmit' type="submit" name="formulaire" value="Conseils"> 
                        </form>

                    </section>
                <?php
           
                if(isset($_POST['formulaire']))
                {
            
            ?>
                <section class='ARformulaire'>

                    <form method="post">
                        <label class='ARlabel'>Conseils</label><b>
                    <input class='ARinputform' type="text" name="nom2" placeholder="nom" required>
                    <input class='ARinputform' type="text" name="text2" placeholder="text" required>
                    <input class='ARinputform' type="date" name="date2" required>

                    <input class='ARinputvalid' type="submit" name="validerSC">
                    </form>

                </section>
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