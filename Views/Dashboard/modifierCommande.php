<?php
include_once '../../Models/Commande.php';
include_once '../../Controllers/Shop/ShopController.php';

$error = "";

// create adherent
$commande = null;

// create an instance of the controller
$commandeC = new CommandeC();
if (
    isset($_POST["statusCommande"]) &&
    isset($_POST["prixCommande"]) &&
    isset($_POST["dateCommande"])
) {
    if (
        !empty($_POST['statusCommande']) &&
        !empty($_POST["prixCommande"]) &&
        !empty($_POST["dateCommande"])
    ) {
        $commande = new Commande(
            $_POST['statusCommande'],
            $_POST['prixCommande'],
            $_POST['dateCommande']
        );
        $commandeC->modifiercommande($commande, $_GET["idCommande"]);
        header('Location:commande.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/Shop/ajouter.css?ts=<?= time() ?>">
</head>

<body>
    <button class="buttons" id="back-btn"><a href="commande.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['idCommande'])) {
        $commande = $commandeC->recuperercommande($_GET['idCommande']);
    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <select name="statusCommande" class="feedback-input">
                    <option value="Pending">Pending</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Canceled">Canceled</option>
                </select>

                <input type="text" name="prixCommande" id="prixCommande" class="feedback-input" value="<?php echo $commande['prixCommande']; ?>" maxlength="20">

                <input type="date" name="dateCommande" class="feedback-input" value="<?php echo $commande['dateCommande']; ?>" id="dateCommande">

                <input type="submit" value="Modify" class="buttons">


        </form>
    <?php
    }
    ?>
</body>

</html>