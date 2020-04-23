           <?php
            if(isset($_SESSION['login']) == "admin")
            {
                ?>
                <form method="post">
                <input type="submit" name="formulaire3" value="citation"> 
                </form>
                <?php
                if(isset($_POST['formulaire3']))
                {
                    ?>
                    <form method="post">
                        <label>citation</label>
                    <input type="text" name="text3" placeholder="nom" required>
                    <input type="text" name="img3" placeholder="text" required>
                    <input type="date" name="date3" required>

                    <input type="submit" name="citaV">
                </form>
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