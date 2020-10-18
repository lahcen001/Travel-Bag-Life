<!DOCTYPE html>


<?php

session_start();
if(!isset($_SESSION["user"]) && $_SESSION["user"]["role"]!= 1){
  header('Location:login1.php'); 
}



 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}


$message = '';
if (isset ($_POST['submit']))  {
	
	
	
		




  $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileError = $_FILES['image']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_categories/categories_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }
	
	
	
	
       
	
	
  $name =$_POST['name'];
  $id_auteur =( $_SESSION["user"]["id_auteur"]);
 
  
  $sql = 'INSERT INTO categories(name, image, id_auteur) VALUES( :name, :image , :id_auteur)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':image' => $fileName ,':id_auteur' => $id_auteur])) {
   
  }

}




 ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLOG PHP</title>
    
   

    <link href="css/1.css" rel="stylesheet">
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

            <div class="container ">
              
          
     
            <div class="row d-flex justify-content-center mt-5">
	    
	    <div class="col-md-8 col-md-offset-2">

      <div class="card">
  <div class="card-body shadow rounded">
	        
    		<h1>Ajouter Une Nouvelle Categorie</h1>
    		


             <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>




    		<form  method="POST" enctype="multipart/form-data">
    		    
    		    <div class="form-group has-error">
    		        <label for="slug"> <span class="require">*</span> <small></small></label>
    		        <input type="text" class="form-control" name="name" />
<!--     		       
    		    </div>
                <div class="form-group files mt-5 h-75">
                <label >Ajouter Une Image </label>
                <input type="file" class="form-control btn btn-primary" id="image_categorie" multiple="" name="image_categorie">
              </div>
    		      -->
              <div class="input-group mt-5 mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Ajouter</span>
  </div>
   <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" name="image">
    <label class="custom-file-label" for="inputGroupFile01">Ajouter Une Image</label>
  </div>
</div>
                
              <div class="form-group">
    		        <button type="submit" class="btn btn-primary" name="submit">
                    Ajouter 
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


    <?php include 'js.php';?>



</body>

</html>