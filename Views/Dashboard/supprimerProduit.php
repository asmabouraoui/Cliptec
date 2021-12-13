<?php
include "../../Controllers/Shop/ShopController.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimerProduit</title>
</head>

<body>
    <form method="post" action="">
        <input name="id" type="number"  placeholder="ID">
        <input type="submit">
    </form>
</body>

</html>
<?php
if (isset($_POST["id"])) 
    {
    if (!empty($_POST["id"])) 
    {
        $idProduit = htmlspecialchars(strip_tags($_POST['id']));
        try{
            supprimerProduit($idProduit);
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
        header('Location:produit.php');
    }
}

?>