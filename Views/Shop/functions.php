<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'cliptec';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
    // Get the amount of items in the shopping cart, this will be displayed in the header.
    $num_items_in_cart = 0;
    if(isset($_SESSION['cart']))
    {
        $num_items_in_cart = count($_SESSION['cart']);
    }
    
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css?ts=<?= time() ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
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
                    <li><a href="index.php?page=products">Products</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Search</a></li>
                </ul>
            </nav>
            <div class="link-icons">
                <a href="index.php?page=cart">
                <i class="fas fa-shopping-cart"></i>
                <span>$num_items_in_cart</span>
                 </a>
            </div>
            </div>
    </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, EasyRocket</p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
}
