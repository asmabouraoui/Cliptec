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
	<link rel="stylesheet" type="text/css" href="../../assets/css/Shop/style.css?ts=<?= time() ?>">
</head>

<body>
	<header>
		<img class="logo" src="../../assets/images/logo.png" alt="This is the logo">
		<nav class="container-1">
			<ul>
				<li><a href="#">Mens</a></li>
				<li><a href="#">Womens</a></li>
				<li><a href="#">Kids</a></li>
				<li><a href="#">Accessories</a></li>
				<li><a href="#">Premium</a></li>
				<li><a href="#">Account</a></li>
				<li><a href="#">Search</a></li>
			</ul>
		</nav>
		<a class = "cta" href="#"><button>Cart</button></a>
	</header>

	<div class="products">
			<h1>Liste des commandes</h1>
		<table class = "elements">
			<tr >
				<th>Order ID</th>
				<th>Order Name</th>
				<th>Order Price</th>
				<th>Order Date</th>
				<th>Delete Order</th>
			</tr>
			<?php
			foreach ($listeCommandes as $commande) {
			?>
				<tr >
					<td><?php echo $commande['idCommande']; ?></td>
					<td><?php echo $commande['nomCommande']; ?></td>
					<td><?php echo $commande['prixCommande']; ?></td>
					<td><?php echo $commande['dateCommande']; ?></td>
					<td><a href="supprimercommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Delete</a></td>
				</tr>
			<?php
			}
			?>
		</table>
		<button>
			<a href="ajouterCommande.php">Add Order</a>
		</button>
	</div>

</body>

</html>