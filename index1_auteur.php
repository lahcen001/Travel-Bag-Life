<!DOCTYPE html>

<?php




 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}

$id_auteur = $_GET['id_auteur'];
$sql = 'SELECT * FROM article WHERE id_auteur=:id_auteur';
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



if(isset($_SESSION["user"]) && $_SESSION["user"]["role"]== 1){
  include 'navbar2.php';
}


else{
  include 'navbar.php';
}

         ?>
		
	
			<?php foreach($aut1 as $aut2): ?>
          

            <div class="alert alert-primary  mx-3 my-2 text-center " role="alert">
            Tous  les articles de : <?= $aut2->name; ?> 

            
</div>
			<?php endforeach; ?>
        

            <div class="container mb-5">
                <div class="row d-flex justify-content-center m-5 my-3">


<?php foreach($articles as $article): ?>
                
             
<div class="col-md-3 col-sm-6 item  my-3">
<a  href="article_a_.php?id_article=<?= $article->id_article ?>" >
    <div class="card item-card card-block px-2 py-2">
    
        <img  class="img w-100" src="trait_article\articles_image\<?= $article->image; ?>"  alt="Photo of sunset">
        <h5 class="item-card-title mt-3 mb-3"><?= $article->titre_article; ?></h5>
        <p class="card-text "><?= substr($article->contenu_article,0,60); ?> ...</p> 
        <?php 
			 $categorie_id = $article->id_categories;
			 $sql3 = "SELECT name,categories.image ,categories.id_categories FROM categories INNER JOIN article ON categories.id_categories = article.id_categories WHERE article.id_categories = $categorie_id";
             $statement3 = $connection->prepare($sql3);
             $statement3->execute();
           $table3 = $statement3->fetch(PDO::FETCH_OBJ);
		   ?>
        
     </div>
     </a>
   </div>

  <?php endforeach; ?>
                    
                    

            </div>

            <nav aria-label="Page navigation example justify-content-center">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
   
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
        </div>


    </div>





    <?php include 'js.php';?>

</body>

</html>