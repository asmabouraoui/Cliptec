<?php
include "../../config.php";
function ajouter($name, $desc, $price, $quantity, $img)
{
   $sql = "INSERT INTO `products`(`name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) values (:name,:desc,:price,:rrp,:quantity,:img,:date_added)";
   $db = config::getConnexion();
   $statement = $db->prepare($sql);
   $params = [
      'name' => $name,
      'desc' => $desc,
      'price' => $price,
      'rrp' => 0,
      'quantity' => $quantity,
      'img' => $img,
      'date_added' => date('Y-m-d H:i:s')
   ];
   $statement->execute($params);
}
