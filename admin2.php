<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location:login.php'); 
  }
require 'trait_article\db.php';
$message = '';
if (isset ($_POST['submit']) ) {
	
	
  
  
		
	
	$fileName = $_FILES['image_article']['name'];
        $fileTmpName = $_FILES['image_article']['tmp_name'];
        $fileError = $_FILES['image_article']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_article/articles_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }
	
	
	
	
        session_start();
       
	
	
  $titre_article = $_POST['titre_article'];
  $contenu = $_POST['contenu'];
  $auteur =( $_SESSION["user"]["id_auteur"]);
  $cat =( $_POST['cat']);
  $date =date("Y-m-d");
 
  
  
 $sql = 'INSERT INTO article (titre_article, contenu_article , image ,id_auteur,id_categories,date) VALUES( :titre_article, :contenu_article, :image,:id_auteur,:id_categories,:date)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':titre_article' => $titre_article , ':id_auteur' => $_SESSION["user"]["id_auteur"] ,':id_categories' => $cat ,':contenu_article' => $contenu,':image' => $fileName,':date' => $date])) {
    $message = 'données insérées avec succès';
  }


}



 ?>
 <?php


$dsn = 'mysql:host=localhost;dbname=massarpx_php';
$username = 'massarpx';
$password = '123456lahcenLH';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}

$sql = 'SELECT * FROM categories';
$statement = $connection->prepare($sql);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 
 <?php
require 'trait_auteurs\db.php';
$sql = 'SELECT * FROM auteur';
$statement = $connection->prepare($sql);
$statement->execute();
$auteurs = $statement->fetchAll(PDO::FETCH_OBJ);
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



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="css/css1.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">

    <?php include 'asidebar.php';?>
     
        <div id="page-content-wrapper">

        <?php include 'navbar.php';?>

            <div class="container ">
              
            <div class="row d-flex justify-content-center mt-5">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
			 <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
			
    		<h1>Créer un Article</h1>
    		
    		<form  method="POST" enctype="multipart/form-data">
    		    
    		  
    		    


               
	  
	  <div class="form-group">
      <label for="sel1">Categorie</label>
      <select name="cat" class="form-control" id="sel1">
        <?php foreach($categories as $categorie): ?>
        <option value="<?= $categorie->id_categories; ?>"><?= $categorie->name; ?></option>
        <?php endforeach; ?>
      </select>

      
      



    		    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="titre_article"  />
    		    </div>

                
    		    
    		    <div class="form-group">
    		        <label for="description">Rédaction de contenu</label>
    		        <textarea rows="5" class="form-control" name="contenu" ></textarea>
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - Champ Obligatoire</p>
    		    </div>
    		    
                <div class="form-group files mt-5 h-75">
                <label >Ajouter Une Image </label>
                <input type="file" class="form-control btn btn-primary" multiple="" name="image_article">
              </div>
                
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary" name="submit" >
                    Ajouter  L'article
    		        </button>
    		        <button class="btn btn-default">
                    Annuler
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
                    

            </div>
        </div>


    </div>





    <?php include 'js.php';?>

</body>

</html>