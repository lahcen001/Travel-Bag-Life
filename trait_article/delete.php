<?php
require 'db.php';
$id_article = $_GET['id_article'];
$sql = 'DELETE FROM article WHERE id_article=:id_article';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_article' => $id_article])) {

  header('Location: ..\modi_article.php');
}