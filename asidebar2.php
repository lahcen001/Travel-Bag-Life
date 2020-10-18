
<?php

 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
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




        <div class="bg-light border-right opct opacity-70 shadow" id="sidebar-wrapper">
            <div class="sidebar-heading"><img src="img/LOGO.png " class="navbar-brand-img 
			"> </div>
			
         
			<form>
     
		<form
           
            <hr class="style2">
            
            <div class="list-group list-group-flush ">
			 <?php foreach($categories as $categorie): ?>
                <a href="modi_categorie.php?id_categories=<?= $categorie->id_categories ?>" class="list-group-item list-group-item-action bg-light"><?= $categorie->name; ?></a>
                <?php endforeach; ?>
               
            </div>
        </div>