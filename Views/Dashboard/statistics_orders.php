<?php
//index.php
include_once '../../Models\Client.php';
include_once '../../Controllers/Profile/ClientC.php';
session_start();
$connect = mysqli_connect("localhost", "root", "", "cliptec");

$query = "SELECT * FROM orders";
$result = mysqli_query($connect, $query);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {

    $chart_data .= "{created_at:'" . $row["created_at"] . "', total_price:" . $row["total_price"] . "}, ";
}
$chart_data = substr($chart_data, 0, -2);

$sql = "SELECT * from products";
$db = config::getConnexion();
$req = $db->prepare($sql);
try {
    $req->execute();
} catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
    header("Location:indexC.php?code=errorDB");
}
$products = $req->fetchAll(PDO::FETCH_ASSOC);
$total_products = $req->rowCount();

$ClientC = new ClientC();

$result = $ClientC->getUserInformation($_SESSION['CIN']);
global $user;

$user = $result->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>StatisticsEvents</title>
    <!-- Css Styles -->

    <link rel="stylesheet" href="../../assets/css/Dashboard/dashboard-users.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>


<body>
    <!-- Page Preloder -->
    <!-- Header Section Begin -->
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
                    <span><?php echo $user['NAME'] . ' ' . $user['Lastname']; ?></span>
                </button>
            </div>
        </div>
        <div class="app-content">
            <div class="app-sidebar">
                <a href="./dashboard-main.php" class="app-sidebar-link">
                    <span class="material-icons">home</span>
                </a>
                <a href="./dashboard-users.php" class="app-sidebar-link">
                    <span class="material-icons">people</span>
                </a>
                <a href="../forum/dashboard-forum.php" class="app-sidebar-link">
                    <span class="material-icons">forum</span>
                </a>
                <a href="#" class="app-sidebar-link active">
                    <span class="material-icons">shopping_cart</span>
                </a>
                <a href="../Events/events/view/dashboard-events.php" class="app-sidebar-link">
                    <span class="material-icons">confirmation_number</span>
                </a>
                <a href="../Tickets/index.php" class="app-sidebar-link">
                    <span class="material-icons">book_online</span>
                </a>
                <a href="../Index/indexC.php" class="app-sidebar-link">
                    <span class="material-icons">keyboard_return</span>
                </a>
            </div>
            <div class="projects-section">
                <div class="projects-section-header">
                    <p>Store</p>
                    <p class="time"><?php echo (date('Y-m-d')) ?></p>
                </div>
                <div class="projects-section-line">
                    <div class="projects-status">
                        <div class="item-status">
                            <span class="status-number"><?php echo $total_products; ?></span>
                            <span class="status-type">Total items</span>
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
                <div class="container" style="width:900px;">
                    <h3 style="margin-left:500px"align="center" style="color:#ac030a"> Income per date</h3>
                    <br /><br />
                    <div style="margin-left:500px"id="chart"></div>
                </div>
            </div>
            <a href="./dashboard-orders.php"><button>Orders</button></a>
            <!-- Js Plugins -->
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.slicknav.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/circle-progress.min.js"></script>
            <script src="js/jquery.barfiller.js"></script>
            <script src="js/main.js"></script>
</body>

</html>

<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $chart_data; ?>],
        xkey: 'created_at',
        ykeys: ['total_price'],
        labels: ['total_price'],
        hideHover: 'auto',
        barColors: ['#ff5757'],
        stacked: true
    });
</script>