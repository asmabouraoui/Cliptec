<?php
include '../../Controllers/Shop/ShopController.php';
include_once '../../Models\Client.php';
include_once '../../Controllers/Profile/ClientC.php';
session_start();
$commandeC = new CommandeC();
$listeCommandes = $commandeC->affichercommandes();
$total_orders = $listeCommandes->rowCount();
$ClientC = new ClientC();

$result = $ClientC->getUserInformation($_SESSION['CIN']);
global $user;

$user = $result->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/Dashboard/dashboard-store.css">
</head>

<body onload="test()">
  <script src="../../assets/javascript/Home/script.js"></script>
  <div class="app-container">
    <div class="app-header">
      <div class="app-header-left">
        <span class="material-icons app-icon">dashboard</span>
        <p class="app-name">Easyrocket dashboard</p>
      </div>
      <div class="app-header-right">
        <button class="mode-switch" title="Switch Theme">
          <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <defs></defs>
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>
        <button class="profile-btn" style="pointer-events: none;">
          <span><?php echo $user['NAME'].' '.$user['Lastname']; ?></span>
        </button>
      </div>
    </div>
    <div class="app-content">
      <div class="app-sidebar">
        <a href="dashboard-main.php" class="app-sidebar-link">
          <span class="material-icons">home</span>
        </a>
        <a href="dashboard-users.php" class="app-sidebar-link">
          <span class="material-icons">people</span>
        </a>
        <a href="#" class="app-sidebar-link active">
          <span class="material-icons">shopping_cart</span>
        </a>
        <a href="dashboard-events.php" class="app-sidebar-link">
          <span class="material-icons">confirmation_number</span>
        </a><br><br><br><br><br><br><br><br><br><br><br>
        <a href="./indexC.php" class="app-sidebar-link">
          <span class="material-icons">keyboard_return</span>
        </a>
      </div>
      <div class="projects-section">
        <div class="projects-section-header">
          <p>Orders</p>
          <p class="time"><?php echo (date('Y-m-d')) ?></p>
        </div>
        <div class="projects-section-line">
          <div class="projects-status">
            <div class="item-status">
              <span class="status-number"><?php echo $total_orders; ?></span>
              <span class="status-type">Total orders</span>
            </div>
          </div>
          <div class="view-actions">
            <button class="view-btn grid-view active" title="Grid View">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
              </svg>
            </button>
          </div>
        </div>
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
				<th>Update Order</th>
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
					<td><a style = "color:black; font-weight:bold"href="supprimercommande.php?idCommande=<?php echo $commande['id']; ?>">Delete</a></td>
					<td>
						<a style = "color:black; font-weight:bold"href="modifierCommande.php?idCommande=<?php echo $commande['id']; ?>">Update</a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
      <center>
        <a href="./dashboard-store.php"><button>Products</button></a>
        <a href="#"><button>Orders</button></a>
      </center>

    </div>

  </div>
</body>

</html>