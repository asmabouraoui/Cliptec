<?php
include_once('../../Controllers/Forum/questionC.php');
session_start();

//$user_id = $_SESSION['user']->user_id;  

$id=$_GET['id'];
$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_questions($id);
?>
<?php
include_once('../../Controllers/commentC.php');



$commentC = new commentC();
$listecomment = $commentC->afficher_comment($id);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Easyrocket</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
<script type="text/javascript" src="./../../assets/javascript/Forum/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="./../../assets/javascript/Forum/main.js"></script>
<script src="./../../assets/javascript/Forum/jquery.easydropdown.js"></script>
<script src="./../../assets/javascript/Forum/simpleCart.min.js"> </script>
</head>
<body>
<header>
        <img id="easyrocket" src="../../assets/images/logo black bg-trimmy.png" alt="" srcset="" onclick="goToIndexC()">
        <ul>
            <a class="list" href="../Forum/Forum.php"><li>Forum</li></a>
            <a class="list" href="#"><li>Events</li></a>
            <a class="list" href="../Shop/index.php"><li>Shop</li></a>
            <?php 
                if ($_SESSION['role']=='Admin')
                    echo '<a class="list" href="../Dashboard/dashboard-main.php"><li>Dashboard</li></a>';
            ?>
        </ul>
        <div class="buttons">
       <a href="../Profile/userprofile.php"><button type="button">Profile</button></a>
       <a href="../../Controllers\Profile\endsession.php"><button type="button">Log out</button></a>  
    </header>
    <div class="bg-image">
        
    </div>
   <div class="men">
    <p class="p-myPosts">
        <a href="Forum.php"><i class="fa fa-pencil-square-o"></i>Back</a>
      </p>
		<div id="sb-search" class="sb-search forum_search" hidden>
		   <form>
			  <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
			  <input class="sb-search-submit" type="submit" value="">
	
		   </form>
		 </div>
	  </div></div>

       <!--Topic Section-->
       <div class="topic-container">
        <!--Original thread-->
        <div class="head">
        <?php
                    foreach ($listeQuestions as $question) {
                ?>
            <div class="authors">Author</div>
            <div class="content"><?php echo $question['topic']; ?>
</div>
        </div>

        <div class="body">
            <div class="authors">
                <div class="username"><a href="">Username</a></div>
                <i class="fas fa-user-astronaut center"></i>
               
            </div>
        

            <div class="content">
            <?php echo $question['question_content']; ?>
               
                <br><br>
                <?php echo $question['question_date']; ?>                <br>
                <div class="comment">
                    <button onclick="showComment()">Comment</button>
                </div>
            </div>
            <?php
                    }
                    ?>
        </div>
    </div>
   
    <form action="ajoutercomment.php?id=<?php echo $_GET['id'] ?>" method="post">
    <!--Comment Area-->
    <div class="comment-area hide" id="comment-area">
        <input type="text" name="username" placeholder="your name..">
        <textarea name="comment" id="" placeholder="comment here ... "></textarea>
        <input type="submit" value="submit">
    </div>
    </form>

    <!--Comments Section-->
    
    <?php
                    foreach ($listecomment as $comment) {
                ?>
    <form action="ajouterlike.php?id=<?php echo $comment['comment_id'];?>&idd=<?php echo $_GET['id'];?>&name=<?php echo $comment['user_name'];?>&conn=<?php echo $comment['comment_content'];?>&likee=<?php echo $comment['likee'];?>" method="post">
    <div class="comments-container">
        <div class="body">
            <div class="authors">
                <div class="username"><a href=""><?php echo $comment['user_name']; ?></a></div>
                <i class="fas fa-user-astronaut center"></i>
            </div>
            <div class="content">
            <?php echo $comment['comment_content']; ?>

            <input type="submit" name="aa" value="Like">
            <?php echo $comment['likee']; ?>
                <br>
            </div>
        </div>
    </div>
    </form>
    <?php
                    }
                    ?>
                    

<div class="footer">
    <div class="container">
    <img id ="circles" src="./../../assets/images/Forum/circles.png" alt="circles">
    <img id="slogan" src="./../../assets/images/Forum/to the moon.png" alt="slogan">
   </div>
</div>
</body>
</html>		