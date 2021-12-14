<?php
    include_once '../../Models\Client.php';
    include_once '../../Controllers/Profile/ClientC.php';
    include './mail.php';
    

    $error = "";
    $result="";

    // create client
    $client = null;

    // create an instance of the client controller
    $clientC = new ClientC();
    if (
        isset($_POST["name"]) &&
		isset($_POST["lastname"]) &&		
        isset($_POST["email"]) &&
        isset($_POST["cin"]) &&
		isset($_POST["password"])
    ) {
        if (
            !empty($_POST["name"]) && 
			!empty($_POST['lastname']) &&
            !empty($_POST["email"]) && 
            !empty($_POST["cin"]) && 
			!empty($_POST["password"])
        ) {
            $client = new Client(
                0,
                $_POST["name"],
				$_POST["lastname"],
                $_POST["email"], 
                $_POST["cin"], 
                "",
                "",
                "",
				$_POST["password"],
                "",
                ""
            );
            $result = $clientC->register($client);
            if ($result=="") {
                /* send mail */
                $email = $client->getEmail();
                $path = "https://i.ibb.co/2Y3g8Bf/logo-white-bg.png";
                $email_content = array(
                    'Subject' => 'Registration confirmation',
                    'body' => "<b>Dear " . $client->name . " " . $client->lastname .  "</b>,<br>We are hereby confirming your successful registration to Easyrocket's platform!<br><b>Thank you for the support.</b><br><img src='$path'>"
                  );
                  sendemail($email, $email_content);

                /* end send mail */

            header("Location:../Login/login.php"); 
            
            
            }
            else {
               header("Location:register.php?err_message=$result");
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Register/register.css">
</head>
<body>
<script src="../../assets/javascript/Home/script.js"></script>
    <img id="main" src="../../assets/images/register.svg">
    <a href="../Home/index.php"><div class="toindex"></div></a>
    <div class="form-container">
        <div class="leftsidebar"></div>
        <div class="rightsidebar"></div>
            <div class="header-logo">
                <img src="../../assets/images/logo white bg.png" alt="" srcset="">
            </div>
            <div class="header-parag">
                <h4>Create your account</h4><h6>Or <a href="../Login/login.php">sign in to your account</a></h6>
            </div>
            <div class="form-wrapper">
        <div class="form">
            <form id="form" action="" method="POST" onsubmit="return checkRegister();">
            <div class="input">
                <label for="name"></label>
                <input class="" name="name" id="name" type="text" placeholder="Name">
            </div>
            <div class="input">
                <label for="lastname"></label>
                <input class="" name="lastname" id="lastname" type="text" placeholder="Lastname">
            </div>
            <div class="input">
                <label for="cin"></label>
                <input class="" name="cin" id="cin" type="cin" placeholder="CIN" maxlength="8">
            </div>
            <div class="input">
                <label for="email"></label>
                <input class="" name="email" id="email" type="email" placeholder="Email address">
            </div>
            <div class="input">
                <label for="pwd"></label>
                <input class="" name="password" id="pwd" type="password" placeholder="Password">
            </div><br>
            <div class="input">
                <label for="submit"></label>
                <input id="submit" type="submit" value="Register">
                <span class="material-icons icon">how_to_reg</span>
            </div>
        </form>
        </div>
    </div>
    <div class="message" id="message">
        <?php
            if (isset($_GET['err_message'])) {
                echo (htmlspecialchars($_GET['err_message']));
            }
        ?>
    </div>
    </div>


    
</body>
</html>