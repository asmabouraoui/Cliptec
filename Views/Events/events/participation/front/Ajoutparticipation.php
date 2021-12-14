<?php
 require_once "../controller/participationC.php" ; 
require_once "../model/participation.php" ;
?>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Participation</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Easy Rocket</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    
                </li> 
   
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Welcome</h4>
              <h2>Easy Rocket </h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
              <table align="center">


<tr>
    <td>
        <label for="nom">Nom:
        </label>
    </td>
    <td><input type="text" class="form-control" name="nom" id="nom" maxlength="20" ></td>
</tr>
<tr>
    <td>
        <label for="prenom">Prenom:
        </label>
    </td>
    <td><input type="text" class="form-control" name="prenom" id="prenom" maxlength="20" ></td>
</tr>
<tr>
    <td>
        <label for="ddn">Date de naissance :
        </label>
    </td>
    <td>
        <input type="date" class="form-control" name="ddn" id="ddn"  >
    </td>
</tr>
<tr>
    <td>
        <label for="adresse">Adresse:
        </label>
    </td>
    <td>
        <input type="text" class="form-control" name="adresse" id="adresse" >
    </td>

</tr>
<tr>
    <td>
        <label for="tel">tel:
        </label>
    </td>
    <td>
        <input type="number" class="form-control" name="tel" id="tel" >
    </td>

</tr>
<tr>

    <td>
        <input type="submit" class="form-control" value="Ajouter" name ="ajouter">
    </td>
    <td>
        <input type="reset" class="form-control" value="Annuler" >
    </td>
</tr>
</table>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>

 

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
         
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
 
    <script src="assets/js/owl.js"></script>
  </body>
  <?php


  // create user
  $user = null;
  
  // create an instance of the controller
  $userC = new participationC();
  if (
  
      isset($_POST["nom"]) &&
      isset($_POST["prenom"]) &&
      isset($_POST["ddn"])   &&
      isset($_POST["adresse"])   &&
      isset($_POST["tel"])
  ){
      if (
         
          !empty($_POST["nom"]) &&
          !empty($_POST["prenom"]) &&
          !empty($_POST["ddn"]) &&
          !empty($_POST["adresse"]) &&
          !empty($_POST["tel"])
  
      ) {
          $user = new participation(
         
              $_POST['nom'],
              $_POST['prenom'],
              $_POST['ddn'],
              $_POST['adresse'],
              $_POST['tel'],
  
        );
          $userC->ajouterparticipation($user);
        //   header('Location:afficherparticipation.php');
      }
      else
          $error = "Missing information";
  }
  

  ?>
</html>
