<?php  

include "../Controller/carteC.php";
include_once '../Model/carte.php';
//include "../Model/carte.php";


$carteC=new carteC();
$error = "";
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["ddn"]) && 
    isset($_POST["adresse"]) &&
    isset($_POST["tel"]) 
) {
    if (
    !empty($_POST["nom"]) && 
    !empty($_POST["prenom"]) && 
    !empty($_POST["ddn"]) && 
    !empty($_POST["adresse"]) &&
    !empty($_POST["tel"])

    ) {
        $user = new carte(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['ddn'],
        $_POST["adresse"],
        $_POST['tel']
        );
        $carteC->modifiercarte($user, $_GET['idc']);
        
        header('Location:../back/afficher_carte.php');
    } else
        $error = "Missing information";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="nom" content="">
    <meta name="author" content="">

    <title>Modifier carte</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
</head>

<body id="page-top" background='bb.jpg'>

    <!-- Page Wrapper -->
    <div id="wrapper">

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

             


                <!-- Begin Page Content -->

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_GET['idc'])) {
                    $user = $carteC->recuperercarte($_GET['idc']);
                ?>


                    <div class="container-fluid">
                    
                     <table border ='1'  align="center" width="100%" bgcolor="#dacef3">
  
                        <div>
                            <form method="POST" action="">
                            <tr>
                    <td colspan ='2'>
                      <h1 style="color:#000000">****************************Veuillez choisir vos nouvaux donées********************************</h1>
                     </td>
                 </tr>
                                <div class="form-group">
                           <tr> <td>    <p style="color:black;font-size:18px;">identifient :</p> </td>
                               <br>
                                  
                                 <td> <input type="text" style="background-color:purple;color:white;width:150px; " class="form-control" name="id" id="id" value="<?php echo $user['idc']; ?>" readonly></td>
                             </tr> </div>
                           
                                <div class="form-group">
                               <tr> <td> <p style="color:black;font-size:18px;">Nouveau nom :</p> </td>
                                   <td>  <input type="text" class="form-control" style="background-color:purple;color:white;width:150px;" name="nom" id="nom" value="<?php echo $user['nom']; ?>"></td>
                               </tr> </div>
                                  
                                <div class="form-group">
                                <tr> <td><p style="color:black;font-size:18px;">Nouveau prenom : </p></td>
                                <td>  <input type="text" style="background-color:purple;color:white;width:150px;" class="form-control" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>"></td>
                                    </tr></div>
                                    <div class="form-group">
                                <tr> <td><p style="color:black;font-size:18px;">Nouvelle date de naissance :</p></td>
                                <td>  <input type="text" style="background-color:purple;color:white;width:150px;" class="form-control" name="ddn" id="ddn" value="<?php echo $user['ddn']; ?>"></td>
                                    </tr></div>

                                <div class="form-group">
                                <tr> <td> <p style="color:black;font-size:18px;">Nouvelle adressse : </p></td>
                                <td>   <input type="text" style="background-color:purple;color:white;width:150px;"  class="form-control" name="adresse" rows="10" id="adresse" value="<?php echo $user['adresse']; ?>" ></td>
                                </tr> </div>

                                <div class="form-group">
                               <tr> <td><p style="color:black;font-size:18px;">Nouveau telephone : </p></td>
                                <td>  <input type="text" style="background-color:purple;color:white;width:150px;" class="form-control" name="tel" id="tel"  value="<?php echo $user['tel']; ?>"></td>
                                </tr>
                                </div>
                             

                    

                               <tr> <td colspan="2"> <button type="submit" style="background-color:purple;color:white;width:150px;" value="submit" class="btn btn-primary">Submit</button></td> </tr>

                            </form>
                           </div>
                     

  

                          </table>
                    </div>
                    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<?php
} else {
            echo "error de chargement";
        }
?>
</body>

</html>