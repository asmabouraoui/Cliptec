<?php
include '../../Controllers/Shop/ShopController.php';
$commandeC = new CommandeC();
$listeCommandes = $commandeC->affichercommandes();
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link rel="stylesheet" href="../../assets/css/Shop/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
	<nav class="container-1">
		<div class="box-1">
			<a href="#"><img id="logo" src="../../assets/images/logo.png" alt="This is the logo"></a>
		</div>
		<div class="box-2">
			<a href="#">Mens</a>
		</div>
		<div class="box-3">
			<a href="#">Womens</a>
		</div>
		<div class="box-4">
			<a href="#">Kids</a>
		</div>
		<div class="box-5">
			<a href="#">Accessories</a>
		</div>
		<div class="box-6">
			<a href="#">Premium</a>
		</div>
		<div class = "box-7">
			<p></p>
		</div>
		<div class="box-8">
			<a href="#">Account</a>
		</div>
		<div class="box-9">
			<a href="#">Search</a>
		</div>
		<div class="box-10">
			<a href="#">Cart</a>
		</div>
	</nav>
    <div class = "products">
        <h1>your cart is empty</h1>
    </div>
	<center>
        <h1>Liste des commandes</h1>
    </center>
	<table border="1" align="center">
        <tr>
            <th>Id Commande</th>
            <th>Nom</th>
            <th>Prix Commande</th>
            <th>Date Commande</th>
        </tr>
		<?php
        foreach ($listeCommandes as $commande) {
        ?>
            <tr>
                <td><?php echo $commande['idCommande']; ?></td>
                <td><?php echo $commande['nomCommande']; ?></td>
                <td><?php echo $commande['prixCommande']; ?></td>
                <td><?php echo $commande['dateCommande']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>