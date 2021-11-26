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

	<div class="products">
		<h1>Order List</h1>
		<table class="elements">
			<tr>
				<th>Order ID</th>
				<th>Order Name</th>
				<th>Order Price</th>
				<th>Order Date</th>
				<th>Delete Order</th>
				<th>Modify Order</th>
			</tr>
			<?php
			foreach ($listeCommandes as $commande) {
			?>
				<tr>
					<td><?php echo $commande['idCommande']; ?></td>
					<td><?php echo $commande['statusCommande']; ?></td>
					<td><?php echo $commande['prixCommande']; ?> <span class="price">$</span></td>
					<td><?php echo $commande['dateCommande']; ?></td>
					
					<td><a href="supprimercommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Delete</a></td>
					<td>
						<a href="modifierCommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Update</a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
		<a class = "add-order" href="ajouterCommande.php">Add Order</a>
	</div>

</body>

</html>