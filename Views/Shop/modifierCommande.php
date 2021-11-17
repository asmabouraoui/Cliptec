<?php
    include_once '../../Models/Commande.php';
    include_once '../../Controllers/Shop/ShopController.php';

    $error = "";

    // create adherent
    $commande = null;

    // create an instance of the controller
    $commandeC = new CommandeC();
    if (
        isset($_POST["idCommande"]) &&
		isset($_POST["nomCommande"]) &&		
        isset($_POST["prixCommande"]) &&
		isset($_POST["dateCommande"])
    ) {
        if (
            !empty($_POST["idCommande"]) && 
			!empty($_POST['nomCommande']) &&
            !empty($_POST["prixCommande"]) && 
			!empty($_POST["dateCommande"]) 
        ) {
            $commande = new Commande(
                $_POST['idCommande'],
				$_POST['nomCommande'],
                $_POST['prixCommande'], 
				$_POST['dateCommande']
            );
            $commandeC->modifiercommande($commande, $_POST["idCommande"]);
            header('Location:Cart.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="Cart.php">Back to cart</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idCommande'])){
				$commande = $commandeC->recuperercommande($_POST['idCommande']);
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idCommande">Order ID:
                        </label>
                    </td>
                    <td><input type="text" name="idCommande" id="idCommande" value="<?php echo $commande['idCommande']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nomCommande">Order Name:
                        </label>
                    </td>
                    <td><input type="text" name="nomCommande" id="nomCommande" value="<?php echo $commande['nomCommande']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prixCommande">Order Price:
                        </label>
                    </td>
                    <td><input type="text" name="prixCommande" id="prixCommande" value="<?php echo $commande['prixCommande']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateCommande">Date of order:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dateCommande" value="<?php echo $commande['dateCommande']; ?>" id="dateCommande">
                    </td>
                </tr>         
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modify"> 
                    </td>
                    <td>
                        <input type="reset" value="Cancel" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>