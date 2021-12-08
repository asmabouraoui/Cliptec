<?php
            include_once '../../Models\Client.php';
            include_once '../../Controllers/Profile/ClientC.php';
session_start();

$client = null;
 // create client

// create an instance of the client controller
$clientC = new ClientC();
if (		
    isset($_POST["name"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["street"]) &&
    isset($_POST["city"]) &&
    isset($_POST["phone"])
) {
    if (
        !empty($_POST["name"]) && 
        !empty($_POST["lastname"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["street"]) &&
        !empty($_POST["city"]) &&
        !empty($_POST["phone"])
    ) { if ($_GET['Role']!='Admin') {
        $client = new Client(
            0,
            $_POST['name'],
            $_POST['lastname'],
            $_POST['email'],
            $_SESSION['CIN'], 
            $_POST['street'],
            $_POST['city'],
            $_POST['phone'],
            "",
            "",
            $_SESSION['role']
        );
        $clientC->updateUserInformation($client);
        header("Location:userprofile.php"); }
        else if ($_GET['Role']=='Admin')
        {
            $client = new Client(
                0,
                $_POST['name'],
                $_POST['lastname'],
                $_POST['email'],
                $_SESSION['CIN'], 
                $_POST['street'],
                $_POST['city'],
                $_POST['phone'],
                "",
                "",
                $_SESSION['role']
            );
            $clientC->updateUserInformation($client);
            header("Location:userprofile.php"); 
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Profile/userprofile.css">
</head>
<body>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
<script script src="../../assets/javascript/Home/script.js"></script>

    <header>
            <img id="easyrocket" src="./assets/images/logo black bg-trimmy.png" alt="" srcset="" onclick="goToIndexC()">
        <ul>
            <a class="list" href="#"><li>Forum</li></a>
            <a class="list" href="#"><li>Events</li></a>
            <a class="list" href="#"><li>Shop</li></a>
            <?php 
                if ($_GET['Role']=='Admin')
                    echo '<a class="list" href="dashboard-main.php"><li>Dashboard</li></a>';
            ?>
        </ul>
        </header>
    <section>
    <h5><a href="./indexC.php">Index/</a>Profile</h5>
    </section>

    <div class="profilewrapper">
        <div class="background"></div>
        <div class="buttons-container">
   <a class="php" href="userprofile.php"><span class="material-icons-outlined icon">close</span></a>
   </div>
    <div class="profile" style="background: url('https://avatars.dicebear.com/api/adventurer-neutral/espritta.svg?mood[]=happy&background=%23000000');"></div>
    <pre class="nameuser"><?php echo $_GET['Name'];?> <?php echo $_GET['Lastname'];?></pre><p><?php echo $_GET['Role'];?></p><br><hr class="upper">
    <div class="formwrapper">
    <div class="containerform">
        <form action="" class="formulaire" method="POST">
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>Name</span>
            <input type="text" name="name" value="<?php echo $_GET['Name'];?>" placeholder="Enter new name">
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>Lastname</span>
            <input type="text" name="lastname" value="<?php echo $_GET['Lastname'];?>" placeholder="Enter new lastname">
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">alternate_email</span>Email</span>
            <input type="email" name="email" value="<?php echo $_GET['Email'];?>" placeholder="Enter new Email">
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>Street</span>
            <input type="text" name="street" value="<?php echo $_GET['Street'];?>" placeholder="Enter new Street">
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>City</span>
            <input type="text" name="city" value="<?php echo $_GET['City'];?>" placeholder="Enter new City">
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">phone_iphone</span>Phone</span>
            <input type="number" name="phone" value="<?php echo $_GET['Phone'];?>" placeholder="Enter new Phone">
        </div>
        <div class="smallcontainer">
            <span class="title"></span>
        <input type="submit" value="Update">
        </div>
        </form>
    </div>
    <?php if ($_SESSION['role']=='Transporter')
   echo '<div class="containerform">
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>Governorate</span>
            <select name="governorates" id="governorates">
                <option value="Ariana">Ariana</option>
                <option value="Beja">Béja</option>
                <option value="Ben Arous">Ben Arous</option>
                <option value="Bizerte">Bizerte</option>
                <option value="Gabes">Gabès</option>
                <option value="Gafsa">Gafsa</option>
                <option value="Jendouba">Jendouba</option>
                <option value="Kairouan">Kairouan</option>
                <option value="Kasserine">Kasserine</option>
                <option value="Kebili">Kébili</option>
                <option value="Le Kef">Le Kef</option>
                <option value="Mahdia">Mahdia</option>
                <option value="La Manouba">La Manouba</option>
                <option value="Medenine">Médenine</option>
                <option value="Monastir">Monastir</option>
                <option value="Nabeul">Nabeul</option>
                <option value="Sfax">Sfax</option>
                <option value="Sidi Bouzid">Sidi Bouzid</option>
                <option value="Siliana">Siliana</option>
                <option value="Sousse">Sousse</option>
                <option value="Tataouine">Tataouine</option>
                <option value="Tozeur">Tozeur</option>
                <option value="Tunis">Tunis</option>
                <option value="Zaghouan">Zaghouan</option>
            </select>
        </div>
        <div class="smallcontainer">
            <span class="title"></span>
        <input type="submit" value="Update" onclick="updateTransporter($(\'#governorates option:selected\').text(),'.$_GET['cin'].')">
        </div>
    </div>
</div>'; ?>

    </div>  
    
        <footer></footer>
</body>
</html>