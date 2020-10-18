<?php


 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}



///print_r($_POST);
$id_article =$_POST['id_article'];
 $nickname =$_POST['nickname'];
  $contenu = $_POST['contenu'];
  
  $sql = 'INSERT INTO commentaire(nickname, contenu,id_article) VALUES( :nickname, :contenu, :id_article)';
  $statement = $connection->prepare($sql);
  if($statement->execute([':nickname' =>$nickname, ':contenu' => $contenu, ':id_article' => $id_article])){
	  $message = 'data inserted successfully'; 
	  //header("location :article_a_.php?id_article=94");
	  // header("location :article_a_.php");
	    
  }
  header("location:article_a_.php?id_article=".$id_article);
  

  
  
  ?> 

    