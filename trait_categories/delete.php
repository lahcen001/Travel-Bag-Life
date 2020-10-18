<?php
require 'db.php';
$id_categories = $_GET['id_categories'];
$sql = 'DELETE FROM categories WHERE id_categories=:id_categories';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_categories' => $id_categories])) {

  header('Location: ..\modifier_categorie.php');
}