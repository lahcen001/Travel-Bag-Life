<!DOCTYPE html>
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

   

   
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <?php include 'linkbootsrap.php';  ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    


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
                <div class="row  justify-content-center ">



				

<div class="col-10">
<div class="card rounded shadow mx-5 mt-5 mb-5">
  <div class="card-body ">
		
		 <table class="table table-image">
        <tr>
     
          <th>Name</th>
		  <th>Commentaire</th>
        
          <th>Action</th>
		
        </tr>
        <?php foreach($commentaires as $commentaire): ?>
          <tr>
		 
			 
            <td><?= $commentaire->nickname; ?></td>
			<td><?= $commentaire->contenu; ?></td>
      
			
		
      <td><a type="button" class="btn btn-outline-danger" onclick="return confirm(' Voulez-vous vraiment supprimer cette entrée ?')" href="trait_Commentaire\delete.php?id_commentaire=<?= $commentaire->id_commentaire ?>&id-article=<?=$id_article ?>" ><i class="fas fa-trash-alt"></i></a></td>
			
			
			
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