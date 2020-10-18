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


$message = '';
if (isset ($_POST['fullname']) ) {
	
	
	
		
	
	$fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileError = $_FILES['avatar']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_auteurs/auteurs_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }
	
	
	
	
	
	
	
  $fullname = validation($_POST['fullname']);
  $email =validation($_POST['email']);
 
  
  $sql = 'INSERT INTO auteur(fullname, avatar, email) VALUES( :fullname, :avatar, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fullname' => $fullname, ':avatar' => $fileName, ':email' => $email])) {
     $message = 'données insérées avec succès';
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

        <?php include 'navbar.php';?>

            <div class="container ">
              
          
     
            <div class="row d-flex justify-content-center mt-5">
	    
	    <div class="col-md-8 col-md-offset-2 justify-content-center">
		 <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
	        
    		<h1>Ajouter Un Nouvel Auteur</h1>
    		
    			<form  method="POST" enctype="multipart/form-data">
    		    
    		    <div class="form-group has-error">
    		        <label for="slug"> <span class="require">*</span> <small></small></label>
    		        <input type="text" class="form-control" name="fullname" />
    		       
    		    </div>
				<div class="form-group has-error">
    		        <label for="slug"> <span class="require">*</span> <small></small></label>
    		        <input type="text" class="form-control" name="email" />
    		       
    		    </div>
                <div class="form-group files mt-5 h-75">
                <label >Ajouter Une Image </label>
                <input type="file" class="form-control btn btn-primary" id="avatar" multiple="" name="avatar">
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


    <?php include 'js.php';?>

</body>

</html>