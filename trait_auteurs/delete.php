<?php
require 'db.php';
$id_auteur = $_GET['id_auteur'];
$sql = 'DELETE FROM auteur WHERE id_auteur=:id_auteur';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_auteur' => $id_auteur])) {

  header('Location: ..\modifier_auteur.php');
}