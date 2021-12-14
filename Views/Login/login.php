<?php
    include_once '../../Models\Client.php';
    include_once '../../Controllers/Profile/ClientC.php';
    session_start();
    $result="";

    // create client
    $client = null;

    // create an instance of the client controller
    $clientC = new ClientC();
    if (		
        isset($_POST["Email"]) &&
		isset($_POST["Password"])
    ) {
        if (
            !empty($_POST["Email"]) && 
			!empty($_POST["Password"])
        ) {
            $client = new Client(
                0,
                "",
                "",
                $_POST["Email"],
                "", 
                "",
                "",
                "",
				$_POST["Password"],
                "",
                ""
            );
            $result = $clientC->connect($client);
            if ($result=="") {
                $_SESSION['email'] = $client->getEmail();
                header('Location:../Index/indexC.php');
            }
            else
            header("Location:login.php?err_message=$result");
        }
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyrocket</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Login/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
</head>
<body>
    
<script src="../../assets/javascript/Home/script.js"></script>
    <img id="main" src="../../assets/images/login.svg">
    <a href="../Home/index.php"><div class="toindex"></div></a>
    <div class="form-container">
        <div class="leftsidebar"></div>
        <div class="rightsidebar"></div>
            <div class="header-logo">
                <img src="../../assets/images/logo white bg.png" alt="" srcset="">
            </div>
            <div class="header-parag">
                <h4>Sign in to your account</h4><h6>Or <a href="../Register/register.php">create an account</a></h6>
            </div>
            <div class="form-wrapper">
        <div class="form">
            <form id="form" action="" method="POST" onsubmit="return checkLogin()">
            <div class="input">
                <label for="cin"></label>
                <input class="" name="Email" id="Email" type="text" placeholder="Email">
            </div>
            <div class="input">
                <label for="pwd"></label>
                <input class="" name="Password" id="pwd" type="password" placeholder="Password">
            </div><br>
            <div class="input">
                <label for="submit"></label>
                <input id="submit" type="submit" value="Sign in">
                <span class="material-icons icon">login</span>
            </div>
        </form>
        </div>
    </div>
    <div class="message" id="message">
   <?php if (isset($_GET['err_message'])) {
                echo (htmlspecialchars($_GET['err_message'])); }?>
    </div>
    </div>

</body>
</html>