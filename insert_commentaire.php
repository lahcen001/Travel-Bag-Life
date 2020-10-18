
<?php

  $id_article1 = $_POST['id_article'];
 $nickname = $_POST['nickname'];
  $contenu = $_POST['contenu'];
  $sql = 'INSERT INTO commentaire(nickname, contenu,id_article) VALUES( :nickname, :contenu, :id_article)';
  $statement = $connection->prepare($sql);
  if($statement->execute([':nickname' => $nickname, ':contenu' => $contenu, ':id_article' => $id_article1])){
	  $message = 'data inserted successfully'; 
	
  }
  

  
  
  ?>