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



$sql = "SELECT * FROM auteur  where role != 1 ";
$statement = $connection->prepare($sql);
$statement->execute();
$auteurs = $statement->fetchAll(PDO::FETCH_OBJ);
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
<div class="card shadow rounded mt-5 mb-5">
  <div class="card-body">
		
		 <table class="table table-image">
        <tr>
         
		 <th>image</th>
          <th>Name</th>
		  <th>email</th>
          
          <th>Action</th>
		  <th>Action</th>
        </tr>
        <?php foreach($auteurs as $auteur): ?>
          <tr>
		 
			 
			<td >
     
			      <img src="trait_auteurs\auteurs_image\<?= $auteur->avatar; ?>" class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
            
            <td><?= $auteur->name; ?></td>
			<td class="mx-4"><?= $auteur->email; ?></td>
         
			
		<td><a type="button" class="btn btn-outline-info px-0" href="modifier_auteur4.php?id_auteur=<?= $auteur->id_auteur ?>" >Modifier</a></td>
      <td><a type="button" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette entrée ?')" href="trait_auteurs\delete.php?id_auteur=<?= $auteur->id_auteur ?>" ><i class="fas fa-trash-alt"></i></a></td>
			
			
			
          </tr>
        <?php endforeach; ?>
      </table>

    </div>


 </div>
 </div>


</div>
   </div>


    </div>

    <?php include 'js.php';?>

</body>

</html>