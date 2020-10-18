<!DOCTYPE html>

<?php






session_start();
if(!isset($_SESSION["user"])){
  header('Location:login.php'); 
}
if(isset($_SESSION["user"]) && $_SESSION["user"]["role"]== 1){
  header('Location:modi_article3.php'); 
} 


 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}

$id_aut = $_SESSION["user"]["id_auteur"];
$sql = "SELECT * FROM article  where id_auteur =  $id_aut ";
$statement = $connection->prepare($sql);
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_OBJ);
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

    <?php include 'asidebar2.php';?>
     
        <div id="page-content-wrapper">

        <?php





if(isset($_SESSION["user"]) && $_SESSION["user"]["role"]== 1){
  include 'navbar2.php';
}



else{
  include 'navbar.php';
}


         
         ?>

            <div class="container mb-5">
         
                <div class="row d-flex justify-content-center">


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
 
 
 
 
							
                            
                           <a class="btn btn-warning" href="modi_article2.php?id_article=<?= $article->id_article ?>" >Modifier</a>
						   
							<a onclick="return confirm('Are you sure you want to delete this entry?')"  class="btn btn-danger"   href="trait_article\delete.php?id_article=<?= $article->id_article ?>" >Supprimer</a>
							<a class="btn btn-info mt-2 " href="modifier_commentaire.php?id_article=<?= $article->id_article ?>" >Commentaires</a>
							<a class="btn btn-success mt-2 mx-1" href="article_a_.php?id_article=<?= $article->id_article ?>" >Voir</a>
                        </div>
                    </div>
  <?php endforeach; ?> 
                    

  
            </div>
        </div>


    </div>





    <?php include 'js.php';?>

</body>

</html>