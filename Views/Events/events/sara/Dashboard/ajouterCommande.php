<?php
include '../../Controllers/Shop/ShopController.php';
$error = "";
$commande = null;
$commandeC = new CommandeC();
if (
    isset($_POST['idCommande'])&&
    isset($_POST['status']) &&
    isset($_POST["prix"]) &&
    isset($_POST["date"])
) {
    if (
        !empty($_POST['idCommande'])&&
        !empty($_POST['status']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["date"])
    ) {
        $commande = new Commande(
            $_POST['idCommande'],
            $_POST['status'],
            $_POST["prix"],
            $_POST["date"]
        );
        $commandeC->ajoutercommande($commande);
        header('Location:commande.php');
    } else
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/Shop/ajouter.css?ts=<?= time() ?>">
    <title>Document</title>
</head>

<body>
    <button id="back-btn" class="buttons"><a href="commande.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error ?>
    </div>
    <form method="post" action="">
        <input name = "idCommande" type="text" class="feedback-input" placeholder="Order ID">
        <select name="status" class="feedback-input" >
            <option value="Pending">Pending</option>
            <option value="Delivered">Delivered</option>
            <option value="Canceled">Canceled</option>
        </select>
        <input name="prix" type="text" class="feedback-input" placeholder="Order Price" />
        <input name="date" type="date" class="feedback-input" placeholder="Order Date">
        <input type="submit" value="SUBMIT" class="buttons" />
    </form>

</body>

</html>