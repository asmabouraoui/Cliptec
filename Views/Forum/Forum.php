<?php
include_once('../../Controllers/Forum/questionC.php');

//$user_id = $_SESSION['user']->user_id;  

$db=config::getConnexion();
$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_all_questions();
$recipesStatement = $db->prepare('SELECT * FROM questions');
$recipesStatement->execute();
$listeQuestions=$recipesStatement->fetchall();
?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Easyrocket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="./../../assets/css/Forum/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="./../../assets/css/Forum/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="./../../assets/javascript/Forum/jquery-1.11.1.min.js"></script>
    <!-- start menu -->
    <link href="./../../assets/css/Forum/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <script type="text/javascript" src="./../../assets/javascript/Forum/megamenu.js"></script>
    <script>$(document).ready(function () { $(".megamenu").megamenu(); });</script>
    <script src="./../../assets/javascript/Forum/jquery.easydropdown.js"></script>
    <script src="./../../assets/javascript/Forum/simpleCart.min.js"> </script>
</head>

<body>
	<div class="men_banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
			
			<h1><img class="logo_img" src="./../../assets/images/Forum/logo black bg.png"  alt="easyrocket logo"></h1>
	 
			      </div>
           <div class="header_top_right">
		  	
			 <ul class="header_user_info">
			  <a class="login" href="../Home/login.html">
				<i class="user"> </i> 
				<li class="user_desc">My Account</li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
		  
		            <div class="clearfix"> </div>
			 </div>
		     <div class="clearfix"> </div>
	   </div>
   	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="#">Forum</a></h1>
	   </div>
	   <div class="menu">
	     <ul class="megamenu skyblue">
			    <li><a class="color2" href="../Home/index.html">Home</a></li>
		    	<li><a class="color4" href="#">Events</a></li>				
				<li class="active grid"><a class="color10" href="Forum.php">Forum</a></li>
				<li><a class="color3" href="../Home/index.html">Tickets</a></li>
				<li><a class="color7" href="#">Shop</a></li>
				<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	    </div>
	   </div>
   </div>
   <div class="men">
        <!-- start search-->
        <!-- <div class="search-box">
        <div id="sb-search" class="sb-search">
            <form>
                <input class="sb-search-input" placeholder="Enter your search term..." type="search"
                    name="search" id="search">
                <input class="sb-search-submit" type="submit" value="">
                <span class="sb-icon-search"> </span>
            </form>
        </div>
    </div>  -->
    <!----search-scripts---->
     <!-- <script src="./../../assets/javascript/Forum/classie1.js"></script> 
    <script src="./../../assets/javascript/Forum/uisearch.js"></script>
    <script>
        new UISearch(document.getElementById('sb-search'));
    </script> -->
    <!----//END search-scripts---->
    <div class="col-lg-12 text-center">
    <form  method="post" action="rech.php">
                           <input type="text" name="nom"  value="">
                              
                           <button type="submit" name="Ajouter" class="btn btn-danger">Search events</button>
                         </form>
</div>
    <p class="p-myPosts">
      <a href="myposts.php"><i class="fa fa-pencil-square-o"></i>Manage my posts</a>
    </p>
       
    <div class="container">
    <div class="container forum_container">
        <div class="subforum">
            <div class="subforum-title">
                <h1> Questions And Answers </h1>
            </div>

            <?php
                    foreach ($listeQuestions as $question) {
                ?>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fas fa-user-astronaut center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="react.php?id=<?php echo $question['question_id']; ?>"><?php echo $question['question_title']; ?></a></h4>
                    <p>Question Content: <?php echo $question['question_content']; ?></p>
                </div>
                
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small><?php echo $question['question_date']; ?></small>
                </div>
                <div class="header_top_right">
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <?php 
                    }
                    ?>
            
	</div>
   <div class="footer">
   	 <div class="container">
   	 <img id ="circles" src="./../../assets/images/Forum/circles.png" alt="circles">
        <img id="slogan" src="./../../assets/images/Forum/to the moon.png" alt="slogan">
   	</div>
   </div>

</body>

</html>