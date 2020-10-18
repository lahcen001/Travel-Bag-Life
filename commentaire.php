 
 
 <?php


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


$sql = 'SELECT * FROM commentaire WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
$statement->execute([':id_article' => $id_article ]);
$commentaires = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
  



   <?php foreach($commentaires as $commentaire): ?>
                <h3><?= $commentaire->nickname; ?></h3>
                <p><?= $commentaire->contenu; ?></p>
                  <?php endforeach; ?>
   
   
   
 
 <form method="POST" action="commentaire_traitement.php">
            <input type="hidden" name="id_article" value="<?php  echo $id_article; ?>">
			<label for="name">Nom et Prénom</label>
            <input type="text" class="form-control" name="nickname" />
            <label for="description">Ajouter Un Commentaire</label>
       <textarea rows="5" class="form-control" name="contenu" ></textarea>
       
 
 <button type="submit" class="btn btn-primary" name="submit">
                   Ajouter </button>
 
 
  </form>