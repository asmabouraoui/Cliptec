<?php 
include_once 'config.php';

  $db=config::getConnexion();
  $recipesStatement = $db->prepare('SELECT * FROM evennement');
$recipesStatement->execute();
$prod=$recipesStatement->fetchall();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Events</title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <div class="logo">
                            <a href="./frontindex.html">
                                <img width="1000" src="img/logo.png" alt="">
                            </a>
                        </div>
                        <nav class="mobile-menu">
                            <ul>
                                <li><a href="./frontindex.html">Home</a></li>
                                <li><a href="./frontproduit.html">Produit</a></li>
                                <li><a href="./frontevents.html">Evenements</a></li>
                                <li><a href="./frontfacture.html">Facture</a></li>
                                <li><a href="./frontreclamation.html">Reclamation</a></li>
                                <li><a href="./frontlogin.html">Connexion</a></li>
                                <li class="search-btn search-trigger"><i class="fa fa-search"></i></li>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Header End -->
    <!-- Search Bar Begin -->
   
    <!-- Services Section End -->
    <!-- Trainer Section Begin -->
    <section class="trainer-section set-bg" data-setbg="img/fond.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
</br>
</br>
                    <div class="section-title">
                        <h2>Displayed Events</h2>
                        <a href="#" class="primary-btn trainer-btn">See All</a>
                    </div>
                    
                   <form  method="post" action="rech.php">
                           <input type="text" name="nom"  value="">
                              
                           <button type="submit" name="Ajouter" class="btn btn-danger">Search events</button>
                         </form>
              
                </div>
            </div>
        </div>
    </section>
    <br/>
    <!-- Traniner Section End -->
    
    <div class="featured container no-gutter">
    <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
             
             <a href="Trie.php"><button type="submit" name="Ajouter" class="btn btn-warning">Trier par date debut</button></a>
            </div>
          </div>
</br>
</br>

<div class="container">
        <div class="row posts">
                           <?php
foreach($prod as $pro){

?>      
        
            <div id="1" class="item new col-md-4">
              <a href="">
                <div class="featured-item">
                    
                  <?php echo"<img src='view/uploads/".$pro['image']."'>" ?>
                  <h4><?php echo $pro['nomE'] ?></h4>
                  <h6><?php echo $pro['datedebut'] ?></h6>
                    <h6><?php echo $pro['datefin'] ?></h6>
                     <form  method="GET" action="seulevent.php">
                                 <input type="hidden" name="nom_prod"  value="">
                           <input type="hidden" name="id_event"  value="<?php echo $pro['idE'] ?>">
                           <button type="submit" name="Ajouter" value="" class="btn btn-danger">Plus de détails</button>
                         </form>
                         <form  method="GET" action="participation/front/Ajoutparticipation.php">
                                 <input type="hidden" name="nom_prod"  value="">
                           <input type="hidden" name="id_event"  value="<?php echo $pro['idE'] ?>">
                           <button type="submit" name="Ajouter" value="" class="btn btn-primary">Participer</button>
                         </form>
                </div>
              </a>
            </div>
         
      
       
      <?php } ?>
      </div>
    </div>

    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li class="current-page"><a href="#">UP</a></li>
       
            
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Page Ends Here -->
    <!-- Upcoming Event Begin -->
    <section class="upcoming-event-section spad-2">
        <div class="container">
            <div class="row">
                <div  class="col">
                    <div class="upcoming-classes">
                        <div class="up-title">
                            <span>Next</span>
                            <h5>Upcomming Events</h5>
                        </div>
                        <ul class="classes-time">
                            <li> Event 1 <span>00/00/00 - 00:00</span></li>
                            <li> Event 2 <span>00/00/00 - 00:00</span></li>
                            <li> Event 3 <span>00/00/00 - 00:00</span></li>
                            
                        </ul>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Upcoming Event End -->
    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-content">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logo.png" alt=""></a>
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="./frontindex.html">Home</a></li>
                                <li><a href="./frontproduit.html">Produit</a></li>
                                <li><a href="./frontevents.html">Evenements</a></li>
                                <li><a href="./frontfacture.html">Facture</a></li>
                                <li><a href="./frontreclamation.html">Reclamation</a></li>
                                <li><a href="./frontlogin.html">Connexion</a></li>
                            </ul>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="your Email">
                                <button type="submit">Sign Up</button>
                            </form>
                        </div>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                           
                        </div>
                        <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

                        
                        <div class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/main.js"></script>
</body>

</html>