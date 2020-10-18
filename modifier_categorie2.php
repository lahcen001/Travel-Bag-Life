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
$id_categories = $_GET['id_categories'];
$sql = 'SELECT * FROM categories WHERE id_categories=:id_categories';
$statement = $connection->prepare($sql);
$statement->execute([':id_categories' => $id_categories ]);
$person = $statement->fetch(PDO::FETCH_OBJ);







if (isset ($_POST['submit'])) {
	


        


   $name=$_POST['name'];


  $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileError = $_FILES['image']['error'];
       
        if($fileError === 0){
            $fileDestination = 'trait_categories/categories_image/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }

    
        
	
        if($fileName){
          $fileName1 = $fileName;
        }else {
          $fileName1 = $person->image;
        }


 
  $sql = 'UPDATE categories SET name=:name, image=:image WHERE id_categories=:id_categories';
  $statement = $connection->prepare($sql);
 if($statement->execute([':name' => $name, ':image' => $fileName1, ':id_categories' => $id_categories])){
	 
	header('Location:modifier_categorie.php');
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


<div class="card shadow rounded mt-5 mb-5">
  <div class="card-body">
		 <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post" action=""  enctype="multipart/form-data" >
        <div class="form-group">
          <label for="name">Name</label>
		  <input type="hidden" name="id_categories" value="<?php  echo $id_categories; ?>">
		
          <input value="<?= $person->name; ?>" type="text" name="name" id_categories="name" class="form-control">
        </div>
        <!-- <div class="form-group">
          <label for="image">image</label>
          <input type="file" value="<?= $person->image; ?>" name="image" id_categories="image" class="form-control">
        </div>
   -->
   <img class="card-img-top pt-3 w-25 shadow rounded " src="trait_categories\categories_image\<?= $person->image; ?>" alt="Card image cap">
    
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
          <button type="submit"  name="submit" class="btn btn-info">Modifier</button>
		  
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