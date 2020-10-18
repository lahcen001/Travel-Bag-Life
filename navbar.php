<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mr-auto opct opacity-70 navbar  navbar-fixed-top ">
                 <form method ="POST" >
                <button class="btn btn-outline-success " name="menu" id="menu-toggle"><i class="fas fa-bars"></i> </button>
        </form>
    




                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0  ml-auto  ">
                        <li class="nav-item active">
                            <a class="nav-link  mx-5 mx-3" href="index.php"> <i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mx-5 mx-3" href="modi_article.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Home
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="modi_article.php">Modifer Mes Articles</a>
          <a class="dropdown-item" href="admin.php">Nouvelle Article</a>
        </div>
      </li> -->
	   <!-- <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle mx-5 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
        Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="modifier_categorie.php">Modifier Categories</a>
          <a class="dropdown-item" href="categorie.php">Nouvelle Categorie</a>
        </div>
      </li> -->
                  
	  
                        
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle mx-5 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              
            <?php
            if(isset($_SESSION["user"])){
             echo   $_SESSION["user"]["name"];
            }
             else {
               echo ' Profile ';
             }
             ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            
        <?php
            if(isset($_SESSION["user"])){
             echo '  <a class="dropdown-item" href="modifier_auteur.php">Modifier le Profile</a>
           
             <a class="dropdown-item" href="modi_article.php">Modifer Mes Articles</a>
             <a class="dropdown-item" href="admin.php">Nouvelle Article</a>
             <a class="dropdown-item" href="logout.php">Déconnecter</a>

             ';
            }
             else {
               echo '<a class="dropdown-item" href="login.php">Login</a>
               <a class="dropdown-item" href="register.php">Register</a>
               ';
             }
             ?>
        
        </div>
      </li>
						
						
						
                    </ul>
                </div>
            </nav>
			
			
			