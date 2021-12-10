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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
<header>
            <div class="content-wrapper">
            <a href = "index.php"> 
                <img class="logo" src="../../assets/images/logo.png" alt="This is the logo" >
            </a>
            <nav class="container-1">
                <ul>
                    <li><a href="#">Mens</a></li>
                    <li><a href="#">Womens</a></li>
                    <li><a href="#">Kids</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Premium</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="index.php?page=products">Search</a></li>
                </ul>
            </nav>
            <div class="link-icons">
                <a href="index.php?page=cart">
                <i class="fas fa-shopping-cart"></i>
                <span></span>
                 </a>
            </div>
            </div>
    </header>
	<div class="products">
		<h1>Order List</h1>
		<table class="elements">
			<tr>
				<th>Order ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Adress</th>
				<th>Adress2</th>
				<th>Country</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Total Price</th>
				<th>Order Status</th>
				<th>Date Created</th>
				<th>Delete Order</th>

			</tr>
			<?php
			foreach ($listeCommandes as $commande) {
			?>
				<tr>
					<td><?php echo $commande['id']; ?></td>
					<td><?php echo $commande['first_name']; ?></td>
					<td><?php echo $commande['last_name']; ?> </td>
					<td><?php echo $commande['email']; ?></td>
					<td><?php echo $commande['address']; ?></td>
					<td><?php echo $commande['address2']; ?></td>
					<td><?php echo $commande['country']; ?></td>
					<td><?php echo $commande['state']; ?></td>
					<td><?php echo $commande['zipcode']; ?></td>
					<td><?php echo $commande['total_price']; ?><span class="price">$</span></td>
					<td><?php echo $commande['order_status']; ?></td>
					<td><?php echo $commande['created_at']; ?></td>
					<td><a href="supprimercommande.php?idCommande=<?php echo $commande['id']; ?>">Delete</a></td>
					<!--<td>
						<a href="modifierCommande.php?idCommande=<?php echo $commande['id']; ?>">Update</a>
					</td>-->
				</tr>
			<?php
			}
			?>
		</table>
	</div>

</body>

</html>