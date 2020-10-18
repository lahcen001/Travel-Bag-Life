<?php
require 'db.php';
$id_commentaire = $_GET['id_commentaire'];
$sql = 'DELETE FROM commentaire WHERE id_commentaire=:id_commentaire';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_commentaire' => $id_commentaire])) {

  header("Location: ..\modifier_commentaire.php?id_article=".$_GET['id-article']);
}
 ?>