<?php
include '../../Controllers/Shop/ShopController.php';
$error = "";
$commande = null;
$commandeC = new CommandeC();
if (
    isset($_POST["idcommande"]) &&
    isset($_POST['nom']) &&
    isset($_POST["prix"]) &&
    isset($_POST["date"])
){
    if(
    !empty($_POST["idcommande"]) &&
    !empty($_POST['nom']) &&
    !empty($_POST["prix"]) &&
    !empty($_POST["date"])
    ){
    $commande = new Commande(
        $_POST["idcommande"],
        $_POST['nom'] ,
        $_POST["prix"] ,
        $_POST["date"]
    );
    $commandeC->ajoutercommande($commande);
    header('Location:Cart.php');
    }
    else
     $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button><a href="Cart.php">Back to cart</a></button>
    <hr>

    <div id="error">
        <?php echo $error ?>
    </div>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="idCommande">Identifiant Commande:</label>
                </td>
                <td><input type="text" name="idcommande" id="idcommande"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">Nom:</label>
                </td>
                <td><input type="text" name="nom" id="nom"></td>
            </tr>
            <tr>
                <td>
                    <label for="prix">Prix:</label>
                </td>
                <td><input type="text" name="prix" id="prix"></td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date:</label>
                </td>
                <td><input type="date" name="date" id="date"></td>
            </tr>
        </table>
        <input type="submit" value= "submit">
    </form>
</body>

</html>