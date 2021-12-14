<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyrocket</title>
    <link rel="stylesheet" href="./assets/css/register.css">
</head>
<body onload="register()">
    <script src="./assets/javascript/script.js"></script>
    <h3>INVOICE INFORMATION</h3>
    <!--<h3 id="under"><a href="./login.html">already has an account?</a></h3>-->
    <form class="form" action="./pdfPayment.php" method="post">
    <img src="./assets/images/mastercard.png" style="width: 20%; height: auto;">
            <img src="./assets/images/visa.svg" style="width: 12%; height: auto;">
        <div id="error"></div>
        <div >
        <label for="numcarte">Card number</label><br>
        <input type="text" name="numcarte" id="numcarte" placeholder="XXXX XXXX XXXX XXXX">
        </div>
        <div >
            <label for="dateex">Expiration date</label><br>
            <input type="text" name="dateex" id="dateex" placeholder="MM/YY">
            </div>
        <div >
                <label for="CVV">CVV</label><br>
                <input type="text" name="CVV" id="CVV">
            </div>
            <br>
            <input type="submit" value="Continue shipping">
    </form>
    
</body>
</html>