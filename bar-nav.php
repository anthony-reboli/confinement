 <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  <nav class="recher">
      <aside id="searchbartop">
        <input type="checkbox" id="searchbartopbtn" />
        <label for="searchbartopbtn"><img title="Recherche" height="40" src="img/recherche.png"></label>
        <form method="post" action="topic.php" id="recherche bar-nav">
                  <div><input type="text" name="req" ></div>
                  <button type="submit" name="rech"><b>Recherche</b></button>
                  
          </form>
      </aside>
  </nav>
  
  <nav class="menu">
      <p class=""><a href="index.php">Accueil</a></p>
      <p class=""><a href="topic.php">Forum</a></p>
      <img height="" src="">
      <p class=""><a href="connexion.php">Connexion</a></p>
      <p class=""><a href="inscription.php">Inscription</a></p>
  </nav>
      

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {

    ?>
  <nav class="recher">
  
      <aside id="searchbartop">
        <input type="checkbox" id="searchbartopbtn" />
        <label for="searchbartopbtn"><img title="Recherche" height="40" src="img/recherche.png"></label>
        <form method="post" action="topic.php" id="recherche bar-nav">
                  <div><input type="text" name="req" ></div>
                  <button type="submit" name="rech"><b>Recherche</b></button>
                  
          </form>
      </aside>
      
  </nav>
  <nav class="menu">
      
        <p class="menu-item"><a href="index.php">Accueil</a></p>
        <p class=""><a href="topic.php">Forum</a></p>
        <img height="" src="">
        <p class="menu-itemc"><a href="profil.php">Mon profil</a></p>
        <p class="menu-itemc"><a href="index.php?deconnexion=true">Déconnexion</a></p>
         
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
    
    }
      
             
    ?>