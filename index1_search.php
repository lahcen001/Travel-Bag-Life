<!DOCTYPE html>

<?php
require 'trait_article\db.php';
$search = $_POST['search'];
$search ="DZEZE" ;
$sql = 'SELECT * FROM article WHERE titre_article LIKE '%".$search."%'';
$statement = $connection->prepare($sql);
$statement->execute([':id_auteur' => $id_auteur ]);
$articles = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php


$sql = 'SELECT * FROM auteur WHERE id_auteur=:id_auteur';
$statement = $connection->prepare($sql);
$statement->execute([':id_auteur' => $id_auteur ]);
$aut1 = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


 
 
 

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLOG PHP</title>

   

   
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <?php include 'linkbootsrap.php';  ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link href="css/css1.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">

    <?php include 'asidebar.php';?>
     
        <div id="page-content-wrapper">

        <?php




session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"]["role"]== 1){
  include 'navbar2.php';
}



else{
  include 'navbar.php';
}


         
         ?>
		
		<!-- <div class="view intro-2 shadow-lg">
    <div class="full-bg-img">
      <div class="mask rgba-black-strong flex-center">
        <div class="container ">
          <div class="white-text text-center wow fadeInUp">
            <img src="img/logo_blog2.png" alt="" class="opacity-70">
            <br>
			<?php foreach($aut1 as $aut2): ?>
            <h4> Tous  les articles de : <?= $aut2->name; ?> </h4>
			<?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div> -->

            <div class="container mb-5">
                <div class="row d-flex justify-content-center m-5">


<?php foreach($articles as $article): ?>
                
                   <div class="card mt-5 col-3 mx-4 shadow" style="width: 16rem; ">
                        <img class="card-img-top pt-3" src="trait_article\articles_image\<?= $article->image; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article->titre_article; ?></h5>
                            <p class="card-text"><?= substr($article->contenu_article,0,60); ?> ...</p>
							
							
							 <p class=" text-primary">
          <?php 
			 $auteur_id = $article->id_auteur;
			 $sql2 = "SELECT name FROM auteur INNER JOIN article ON auteur.id_auteur = article.id_auteur WHERE article.id_auteur = $auteur_id";
            $statement2 = $connection->prepare($sql2);
             $statement2->execute();
              $table2 = $statement2->fetch(PDO::FETCH_OBJ);
			
			 ?> 
        
        </p>
 <p class=" text-primary"> </p>
 
 

                             <a class="btn btn-warning" href="article_a_.php?id_article=<?= $article->id_article ?>" >Lire La Suite</a>
                          
                        </div>
                    </div>
  <?php endforeach; ?>
                    
                    

            </div>
        </div>


    </div>





    <?php include 'js.php';?>

</body>

</html>