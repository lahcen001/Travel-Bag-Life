  
<!DOCTYPE html>


<?php
// session_start();
// if(!isset($_SESSION["user"])){
//   header('Location:login.php'); 
// }
 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
$id_article = $_GET['id_article'];
$sql = 'SELECT * FROM article WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
$statement->execute([':id_article' => $id_article ]);
$table = $statement->fetch(PDO::FETCH_OBJ);

?>

<?php

require 'trait_Commentaire\db.php';

$sql = 'SELECT * FROM commentaire WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
$statement->execute([':id_article' => $id_article ]);
$commentaires = $statement->fetchAll(PDO::FETCH_OBJ);







$status = $_POST['status'];
 
  
  
  $sql = 'UPDATE article SET titre_article=:titre_article, image=:image , id_article=:id_article, contenu_article=:contenu_article, status=:status	 WHERE id_article=:id_article';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':titre_article' => $titre_article, ':image' => $fileName, ':id_article' => $id_article, ':contenu_article' => $contenu_article, ':status' => $status])) {
    $message = 'données insérées avec succès';
	header('Location:modi_article3.php');
  }




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

           <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?= $table->titre_article; ?></h1>

        <!-- Author -->
        <p class="lead">
          Par  : <?php 
			 $auteur_id = $table->id_auteur;
			 $sql2 = "SELECT name FROM auteur INNER JOIN article ON auteur.id_auteur = article.id_auteur WHERE article.id_auteur = $auteur_id";
            $statement2 = $connection->prepare($sql2);
             $statement2->execute();
              $table2 = $statement2->fetch(PDO::FETCH_OBJ);
			echo $table2->name;
			 ?> 
        
        </p>

        <hr>

    
        <p>Posté le  : <?= $table->date; ?> </p>

        <hr>

        <img class="img-fluid rounded " src="trait_article\articles_image\<?= $table->image; ?>" alt="Card image cap" alt="">
       

        <hr>


        <p class="lead"><p ><?= $table->contenu_article; ?></p></p>

    

        
        <hr>

      
        <div class="card my-4">
          <h5 class="card-header">Laisser un commentaire:</h5>
          <div class="card-body">
             <form method="POST" action="commentaire_traitement.php">
              <div class="form-group">
			   <input type="hidden" name="id_article" value="<?php  echo $id_article; ?>">
			   <label for="name">Nom et Prénom</label>
            <input type="text" class="form-control" name="nickname" />
               <label for="description">Ajouter Un Commentaire</label>
       <textarea rows="5" class="form-control" name="contenu" ></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>

     
        <div class="media mb-4">
          
          <div class="media-body">
		  <?php foreach($commentaires as $commentaire): ?>
		  
            <h5 class="mt-0 text-danger">@<?= $commentaire->nickname; ?></h5>
           <?= $commentaire->contenu; ?>
		   <hr>
		  <?php endforeach; ?>
          </div>
        </div>

       

      </div>

   
      <div class="col-md-3">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select name="status"   class="form-control" id="exampleFormControlSelect1">
      <option value="1">Published</option>
      <option value="0">Not Published</option>
      
      
    </select>
  </div>
       
        <div class="card my-4">
          <h4 class="card-header">Auteur <?php 
			 $auteur_id = $table->id_auteur;
			 $sql2 = "SELECT name ,auteur.id_auteur ,avatar,email FROM auteur INNER JOIN article ON auteur.id_auteur = article.id_auteur WHERE article.id_auteur = $auteur_id";
            $statement2 = $connection->prepare($sql2);
             $statement2->execute();
              $table2 = $statement2->fetch(PDO::FETCH_OBJ);
			  ?> </h4>
          <div class="card-body">
       
          
               <img class="img-fluid rounded-circle  w-50" src="trait_auteurs\auteurs_image\<?php echo $table2->avatar; ?>" alt="Card image cap" alt="<?php echo $table2->avatar; ?>s">
			    <br>
				 <hr>
             <h5> Auteur :  <?php echo $table2->name;?></h5>
			  <br>
			  <hr>
             <h6> Email :  <?php echo $table2->email;?></h6>
			   <p>
			  <hr>
		   <a href="index1_auteur.php?id_auteur=<?= $table2->id_auteur ?>" class="list-group-item list-group-item-action bg-light"> tous les articles de <?= $table2->name; ?></a>
             </p>
             
            </div>
			  <h4 class="card-header my-3"> Categorie<?php 
			 $categorie_id = $table->id_categories;
			 $sql3 = "SELECT name,categories.image ,categories.id_categories FROM categories INNER JOIN article ON categories.id_categories = article.id_categories WHERE article.id_categories = $categorie_id";
             $statement3 = $connection->prepare($sql3);
             $statement3->execute();
           $table3 = $statement3->fetch(PDO::FETCH_OBJ);
		   ?>
		   
			</h4>
          <div class="card-body ">
            
                <img class="img-fluid rounded w-75 " src="trait_categories\categories_image\<?php echo $table3->image; ?>" alt="Card image cap" alt="">
			   <br>
             <h5> Categorie :  <?php echo $table3->name;?></h5>
			 <p>
			  <hr>
		   <a href="index1_categorie.php?id_categories=<?= $table3->id_categories ?>" class="list-group-item list-group-item-action bg-light"> tous les articles de categorie : <?= $table3->name; ?></a>
             </p>
            </div>
          </div>
        </div>



      

   

      </div>

    </div>
    <!-- /.row -->

  </div>
 


    <?php include 'js.php';?>

</body>

</html>