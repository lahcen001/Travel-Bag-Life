  
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
$id_article = $_GET['id_article'];
$sql = 'SELECT * FROM article WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
$statement->execute([':id_article' => $id_article ]);
$table = $statement->fetch(PDO::FETCH_OBJ);

?>

<?php



$sql = 'SELECT * FROM commentaire WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
$statement->execute([':id_article' => $id_article ]);
$commentaires = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLOG PHP</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css" >


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
    <link href="css/simple-sidebar.css" rel="stylesheet">
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

      <div class="card mt-4  ml-3 shadow rounded justify-content-center">
  <div class="card-body">

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

        <img class="img-fluid rounded shadow" src="trait_article\articles_image\<?= $table->image; ?>" alt="Card image cap" alt="">
       

        <hr>


        <p class="lead"><p ><?= $table->contenu_article; ?></p></p>

    

        
        <hr>
        </div>
        </div>
      
        <div class="media mb-4  mt-3">
          
          <div class="media-body ml-3 ">
          <hr>
		     <?php foreach($commentaires as $commentaire): ?>
		  
            <h5 class="mt-0 text-danger ">@<?= $commentaire->nickname; ?></h5>
                 <div class=" ml-3">  <?= $commentaire->contenu; ?> </div>
		      <hr>
	   	  <?php endforeach; ?>
          </div>
        </div>



        <div class="card my-4 ml-3">
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
          
     
        
       
        

   </div>

   
      <div class="col-md-4">

       
        <div class="card my-4">
          <h4 class="card-header">Auteur <?php 
			 $auteur_id = $table->id_auteur;
			 $sql2 = "SELECT name ,auteur.id_auteur ,avatar,email FROM auteur INNER JOIN article ON auteur.id_auteur = article.id_auteur WHERE article.id_auteur = $auteur_id";
            $statement2 = $connection->prepare($sql2);
             $statement2->execute();
              $table2 = $statement2->fetch(PDO::FETCH_OBJ);
			  ?> </h4>
          <div class="card-body">
       
          
               <img class="img-fluid rounded-circle  w-25 shadow mx-auto d-block"  src="trait_auteurs\auteurs_image\<?php echo $table2->avatar; ?>" alt="Card image cap" alt="<?php echo $table2->avatar; ?>s">
			  
				 <hr>
             <h6 class="text-center"> Auteur :  <?php echo $table2->name;?></h6>
			  
			  <hr>
             <h6 class="text-center"> Email :  <?php echo $table2->email;?></h6>
			   <p>
			  <hr>
		   <a href="index1_auteur.php?id_auteur=<?= $table2->id_auteur ?>" class="list-group-item list-group-item-action bg-light text-center"> tous les articles de <?= $table2->name; ?></a>
             </p>
             
            </div>
			  <h4 class="card-header "> Categorie<?php 
			 $categorie_id = $table->id_categories;
			 $sql3 = "SELECT name,categories.image ,categories.id_categories FROM categories INNER JOIN article ON categories.id_categories = article.id_categories WHERE article.id_categories = $categorie_id";
             $statement3 = $connection->prepare($sql3);
             $statement3->execute();
           $table3 = $statement3->fetch(PDO::FETCH_OBJ);
		   ?>
		   
			</h4>
          <div class="card-body my-2 justify-content-center">
            
                <img class="img-fluid rounded-circle w-25 shadow mt-2  mx-auto d-block"  src="trait_categories\categories_image\<?php echo $table3->image; ?>" alt="Card image cap" alt="">
                <hr>
             <h6 class="my-2 text-center"> Categorie :<?php echo $table3->name;?></h6>
             <hr>
			 <p>
	
		   <a href="index1_categorie.php?id_categories=<?= $table3->id_categories ?>" class="list-group-item list-group-item-action bg-light text-center"> tous les articles de categorie : <?= $table3->name; ?></a>
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