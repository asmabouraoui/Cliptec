<?php

  require("ajouterProduit.php");

?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      	
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'name</label>
    <input type="text" class="form-control" name="name" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">desc du produit</label>
    <textarea type="name" class="form-control" name="desc" required></textarea>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="price" step="0.01">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">quantite</label>
    <input type="number" class="form-control" name="quantity" >
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image URL</label>
    <textarea type="text" class="form-control" name="img" required></textarea>
  </div>

  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>

      </div></div></div>

    
</body>
</html>

<?php

  if(isset($_POST['valider']))
  {
    if(isset($_POST['name']) AND isset($_POST['desc']) AND isset($_POST['price']) AND isset($_POST['quantity']) AND isset($_POST['img']) )
    {
    if(!empty($_POST['name']) AND !empty($_POST['desc']) AND !empty($_POST['price']) AND !empty($_POST['quantity']) AND !empty($_POST['img']) )
	    {
	    	$name = htmlspecialchars(strip_tags($_POST['name']));
	    	$desc = htmlspecialchars(strip_tags($_POST['desc']));
	    	$price = htmlspecialchars(strip_tags($_POST['price']));
        $quantity = htmlspecialchars(strip_tags($_POST['quantity']));
	    	$img = htmlspecialchars(strip_tags($_POST['img'])); 
          try 
          {
            var_dump($name);
            ajouter($name, $desc, $price, $quantity,$img);
          } 
          catch (Exception $e) 
          {
          	$e->getMessage();
          }
	    }
    }
  }

?>