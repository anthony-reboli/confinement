 <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  
  <h1 id="ARGrandh1">Entraide Confinement Marseille</h1>
  <nav class="menu">
    <ul>
      <img id="ARlogo"src="upload/logo.png"><a href="index.php"></a>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="topic.php">Forum</a></li>
      <li><a href="connexion.php">Connexion</a></li>
      <li><a href="inscription.php">Inscription</a></li>
    </ul>
  </nav>
      

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {

    ?>
  
      
  </nav>
  <h1 id="ARGrandh1">Entraide Confinement Marseille</h1>
  <nav class="menu">
    <ul>
        <img id="ARlogo"src="upload/logo.png"><a href="index.php"></a>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="topic.php">Forum</a></li>
        <li><a href="profil.php">Mon profil</a></li>
        <li><a href="index.php?deconnexion=true">Déconnexion</a></li>
    </ul>   
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