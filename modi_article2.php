<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location:login.php'); 
  }

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
if (isset ($_POST['titre_article'])) {
	
	
	
	$fileName = $_FILES['image']['name'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileError = $_FILES['image']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_article/articles_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }

 
	
	
        if($fileName){
            $fileName1 = $fileName;
          }else {
            $fileName1 = $table->image;
          }
	
	
	
	
	
	
  $titre_article = $_POST['titre_article'];
  $contenu_article = $_POST['contenu_article'];
 
  
  
  $sql = 'UPDATE article SET titre_article=:titre_article, image=:image , id_article=:id_article, contenu_article=:contenu_article	 WHERE id_article=:id_article';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':titre_article' => $titre_article, ':image' => $fileName1, ':id_article' => $id_article, ':contenu_article' => $contenu_article])) {
    $message = 'données insérées avec succès';
	header('Location:modi_article.php');
  }



}
?>

<?php
require 'trait_categories\db.php';
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



  
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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

            <div class="container ">
              
            <div class="row d-flex justify-content-center mt-5">
	    
	    <div class="col-md-8 col-md-offset-2">
          
      <div class="card mt-4 mb-4  shadow rounded justify-content-center">
  <div class="card-body">



    		<h1>Créer un Article</h1>
    		
    		<form  method="POST" enctype="multipart/form-data">
    		    
    		  
    		    


      





    		    <div class="form-group">
    		        <label for="title">Titre <span class="require">*</span></label>
    		        <input value="<?= $table->titre_article; ?>" type="text" name="titre_article"  class="form-control">
    		    </div>

                <div class="form-group">
      <label for="sel1">Categorie</label>
      <select class="form-control" id="sel1">
	   <?php foreach($categories as $categorie): ?>
        <option><?= $categorie->name; ?></option>
        <?php endforeach; ?>
      </select>
    		    
    		    <div class="form-group">
    		        <label for="description">Rédaction de contenu</label>
    		        <textarea    name="contenu_article"   rows="23" class="form-control"  ><?= $table->contenu_article; ?></textarea>
					
					
					
					
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - Champ Obligatoire</p>
    		    </div>
<!--     		    
                <div class="form-group files mt-5">
				
                <label >Ajouter Une Image </label>
				
                <input type="file" value="<?= $table->image_article; ?>" name="image"  class="form-control">
              </div> -->
              <img class="card-img-top pt-3 w-25 rounded shadow  " src="trait_article\articles_image\<?= $table->image; ?>" alt="Card image cap">
              <div class="input-group mt-5 mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Ajouter</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01"  name="image">
    <label class="custom-file-label" for="inputGroupFile01">Ajouter Une Image</label>
  </div>
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
        </div>


    </div>





    <?php include 'js.php';?>

</body>

</html>