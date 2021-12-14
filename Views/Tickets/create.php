<?php
require 'db.php';
if (isset ($_POST['fname'])  && isset($_POST['city']) && isset($_POST['pcode']) && isset($_POST['address'])) {
  $fname = $_POST['fname'];
  $city = $_POST['city'];
  $pcode= $_POST['pcode'];
  $address= $_POST['address'];
  $test = true;
  if (empty($fname)){
    echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
				echo   "fullname  is empry ! <br>" ;
				echo "</div>";
        $test = false;
}
if(preg_match("#[0-9]+#",$fname)){
  echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
  echo "full name doesn t include numbers!! <br>";
  echo "</div>";
  $test = false;
}
if (empty($city)){
  echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
  echo   "city is empty ! <br>" ;
  echo "</div>";
        $test = false;
}

if (empty($pcode)){
  echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
  echo   "poste code  is empty ! <br>" ;
  echo "</div>";
        $test = false;
}
if (empty($address)){
  echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
  echo   "address  is empty ! <br>" ;
  echo "</div>";
        $test = false;
}


if ($test==true){
  $sql = 'INSERT INTO billetterie(fullname,city,p_code, addresse,confirmation) VALUES(:fname,:city,:pcode, :addresse,:conf)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname,':city' => $city ,':pcode' => $pcode, ':addresse' => $address,':conf'=>"non confirmer"])) {
    $message = 'Voyageur  inserted successfully';
    header("Location:index.php");
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
    <link rel="stylesheet" href="./assets/css/payment.css">
</head>
<body onload="register()">
    <script src="./assets/javascript/script.js"></script>
    <h3>INVOICE INFORMATION</h3>
    <!--<h3 id="under"><a href="./login.html">already has an account?</a></h3>-->
    <form class="form" action="#" method="post">
        <div id="error"></div>
        
        
        <div id='name'>
        
        <label for="fname">FullName</label><br>
        <input class="input2" type="text" name="fname" id="fname"><br>
        
        </div>
        <div id='lastname'>
        <label for="ville">City</label><br>
        <input class="input2"  type="text" name="city" id="city"><br> 
        </div>
        
        
        <div id='lastname'>
            <label for="dateex">Postal code</label><br>
            <input class="input2"  type="text" name="pcode" id="pcode">
            </div>
        <div id='email'>
                <label for="CVV">Billing address</label><br>
                <input class="input2"  type="text" name="address" id="address">
            </div>
            <br>
        <input class="input2"  type="submit" value="Continue" href="index.php">
    </form>
    
</body>
</html>