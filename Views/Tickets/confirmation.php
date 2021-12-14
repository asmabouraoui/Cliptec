<?php

require 'db.php';
$id = $_GET['id'];
$sql = 'UPDATE billetterie SET confirmation=:conf WHERE id_v =:id';
$statement = $connection->prepare($sql);
$cnf="Confirmer";

if ($statement->execute([':id' => $id,':conf'=>$cnf])) {
  header("Location: index.php");
}
?>