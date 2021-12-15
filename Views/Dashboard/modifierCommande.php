<?php
include_once '../../Models/Commande.php';
include_once '../../Controllers/Shop/ShopController.php';

$error = "";

// create adherent
$commande = null;

// create an instance of the controller
$commandeC = new CommandeC();
$temp = $commandeC->recuperercommande(($_GET['idCommande']));
if (
    isset($_POST["statusCommande"])
) {
    if (
        !empty($_POST['statusCommande'])
    ) {
        $commande = new Commande(
            $temp['first_name'],
            $temp['last_name'],
            $temp['email'],
            $temp['address'],
            $temp['address2'],
            $temp['country'],
            $temp['state'],
            $temp['zipcode'],
            $temp['total_price'],
            $_POST['statusCommande']
        );
        $commandeC->modifiercommande($commande, $_GET["idCommande"]);
        header('Location:dashboard-orders.php');
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

        <form method="POST">
            <table border="1" align="center">
                <select name="statusCommande" class="feedback-input">
                    <option value="Pending">Pending</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Canceled">Canceled</option>
                </select>

                <input type="submit" value="Modify" class="buttons">


        </form>
    <?php
    }
    ?>
</body>

</html>