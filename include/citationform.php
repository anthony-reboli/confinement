           <?php
            if(isset($_SESSION['login']) == "admin")
            {

            
        ?>
            <section class='ARsubmit'>

                <form method="post">
                    <input id='ARcitationsubmit' type="submit" name="formulaire3" value="citation"> 
                </form>

            </section>
        <?php
            

                if(isset($_POST['formulaire3']))
                {

            ?>
                <section class='ARformulaire'>

                    <form method='post'>
                        <label class='ARlabel'>citation</label>
                    <input class='ARinputform' type="text" name="text3" placeholder="nom" required>
                    <input class='ARinputform' type="text" name="img3" placeholder="text" required>
                    <input class='ARinputform' type="date" name="date3" required>

                    <input class='ARinputvalid' type="submit" name="citaV">
                    </form>
                </section>
            <?php

                }
            }

                if (isset($_POST['citaV']))
                {
                    $text3=$_POST['text3'];
                    $img3=$_POST['img3'];
                    $date3=$_POST['date3'];

                    if(!empty($text3) && !empty($img3) && !empty($date3))
                    {

                    $requete2="INSERT INTO citation (texte,image,date) VALUES ('$text3','$img3','$date3')";
                    $requete2Q=mysqli_query($connexion,$requete2);
                    }
                }
            ?>