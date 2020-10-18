<?php

session_start();
if(!isset($_SESSION["user"]) && $_SESSION["user"]["role"]!= 1){
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
$id_auteur = $_GET['id_auteur'];
$sql = 'SELECT * FROM auteur WHERE id_auteur=:id_auteur';
$statement = $connection->prepare($sql);
$statement->execute([':id_auteur' => $id_auteur ]);
$table = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])   ) {
	
	
	
	$fileName = $_FILES['avatar']['name'];
$fileTmpName = $_FILES['avatar']['tmp_name'];
$fileError = $_FILES['avatar']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_auteurs/articles_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }

	
	
  
        if($fileName){
          $fileName1 = $fileName;
        }else {
          $fileName1 = $table->avatar;
        }

        


	
  $name =$_POST['name'];

  $email =( $_POST['email']);
  $role =( $_POST['role']);
  $sql = 'UPDATE auteur SET name=:name, avatar=:avatar , id_auteur=:id_auteur , email=:email, email=:email , role=:role  WHERE id_auteur=:id_auteur';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':avatar' => $fileName1, ':id_auteur' => $id_auteur, ':email' => $email, ':role' => $role])) {
   $message = 'données insérées avec succès';
	header('Location:modifier_auteur.php');
  }



}


 ?>


<!DOCTYPE html>
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

            <div class="container ">
                <div class="row  justify-content-center">



				

<div class="col-10">

<div class="card mt-5 mb-5">
  <div class="card-body shadow rounded">
		
		 <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $table->name; ?>" type="text" name="name" id_auteur="name" class="form-control">
        </div>
		 <div class="form-group">
          <label for="name">Email</label>
          <input value="<?= $table->email; ?>" type="text" name="email" id_auteur="email" class="form-control">
        </div>

        <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select name="role"   class="form-control" id="exampleFormControlSelect1">
      <option value="2">User</option>
      <option value="1">Admin</option>
      
      
    </select>
  </div>
        <!-- <div class="form-group">
          <label for="image">Avatar</label>
		   
          <input type="file" value="<?= $table->avatar; ?>" name="avatar" id_auteur="avatar" class="form-control">
        </div> -->
        <img class="card-img-top pt-3 w-25  img-fluid img-thumbnail" src="trait_auteurs\auteurs_image\<?= $table->avatar; ?>" alt="Card image cap">
            
        <div class="input-group mt-5 mb-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Ajouter</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01"  name="avatar">
    <label class="custom-file-label" for="inputGroupFile01">Ajouter Une Image</label>
  </div>
</div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier</button>
        </div>
		
      </form>
    </div>
		

    </div>

    </div>
   </div>
 </div>
   </div>


    </div>

    <?php include 'js.php';?>

</body>

</html>