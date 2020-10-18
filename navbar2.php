<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mr-auto opct opacity-70 navbar  navbar-fixed-top">
                 <form method ="POST" >
                <button class="btn btn-outline-success" name="menu" id="menu-toggle"><i class="fas fa-bars"></i></button>
				</form>
        <?php





// if(isset($_SESSION["user"])){
//   include 'btnconx.php';
// }



// if(!isset($_SESSION["user"])){
//   include 'btndec.php';
// }


         
  ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0  ml-auto  ">
                        <li class="nav-item active">
                            <a class="nav-link  mx-5 mx-3" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item dropdown"> -->
        <!-- <a class="nav-link dropdown-toggle mx-5 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Articles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> -->
        
        <!-- </div>
      </li>
	   <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle mx-5 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
        Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      
        </div>
      </li> -->
                  
	  
                        
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle mx-5 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
       Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="modifier_auteur5.php">Modifier Mon Profile</a>
          <a class="dropdown-item" href="modifier_auteur.php">Modifier Les Auteurs</a>
        
          <!-- <a class="dropdown-item" href="auteur.php">Ajouter Un Auteur</a> -->
          <a class="dropdown-item" href="modifier_categorie.php"> Modifier Categories</a>
          <a class="dropdown-item" href="categorie.php">Nouvelle Categorie</a>
          <a class="dropdown-item" href="modi_article.php">Modifier les Articles</a>
          <a class="dropdown-item" href="admin.php">Nouvelle Article</a>
          <a class="dropdown-item" href="logout.php">Déconnecter</a>
          
        </div>
      </li>
						
      
						
                    </ul>
                </div>
            </nav>
			
			
			
			
			