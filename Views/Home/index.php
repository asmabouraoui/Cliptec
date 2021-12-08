<?php
    include_once '../../config.php';

    function checkDB() {
        $sql = "SELECT * FROM utilisateurs";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			try{
				$req->execute();
                $value = $req->rowCount(); // number of results returned for cin = given cin in register.
			}
			catch(Exception $e){
				die('Erreur0:'. $e->getMessage());
			}
        if ($value==0)
            {
                $password = hash("sha1",'rootpassword');
                $sql="INSERT INTO utilisateurs 
                VALUES ('Root','Easyrocket','Team','Easyrocket@esprit.tn',:pwd,now(),'Admin','No')";
                $db = config::getConnexion();
                try{
                    $query = $db->prepare($sql);
                    $query->execute([
                        'pwd' => $password
                    ]);					
                }
                catch (Exception $e){
                    die('Erreur1: '.$e->getMessage());
                }
                $sql="INSERT into clients (CIN) VALUES ('Root')";
                try{
                    $query = $db->prepare($sql);
                    $query->execute();	
                }
                catch (Exception $e){
                    die('Erreur2: '.$e->getMessage());
                }  
            }
    }
    checkDB();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyrocket</title>
    <link rel="stylesheet" href="../../assets/css/Home/style.css">
</head>
<body>
    <script src="./assets/javascript/script.js"></script>
    <div class="container">
        <img id="main" src="../../assets/images/main.svg">
        <a href="../Login/login.php"><div id="clicklogin"></div></a>
        <img class="one" src="../../assets/images/1.svg">
        <img class="two" src="../../assets/images/2.svg">
        <a href="../Register/register.php"><div id="clickregister"></div></a>
        <a href="../Register/register.php"><div id="clickrect"></div></a>
        <a href="../Register/register.php" class="toregister"><img class="three" src="../../assets/images/3.svg"></a>
    </div>

    
</body>
</html>