<?php
include_once('../../Controllers/Forum/questionC.php');
//$user_id = $_SESSION['user']->user_id;  
$user_id = 1;
$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_questionss($user_id);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Easyrocket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
      <link href="./../../assets/css/Forum/styles.css" rel='stylesheet' type='text/css' />
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
    <script>
        $(document).ready(function() {
            $(".megamenu").megamenu();
        });
    </script>
    <script src="./../../assets/javascript/Forum/jquery.easydropdown.js"></script>
    <script src="./../../assets/javascript/Forum/simpleCart.min.js"> </script>
    <html xmlns="http://www.w3.org/1999/xhtml">

    </html>

    <title>
        Easyrocket
    </title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>

    <style>
        .error{
    	color: red;
        font-style: italic;
        border: 1px solid red;
    }
    label{
        border : none !important; 
        padding-left:0rem;
    }
    </style>

</head>
<body>
    <div class="men_banner">
        <div class="container">
            <div class="header_top">
                <div class="header_top_left">

                    <h1><img class="logo_img" src="./../../assets/images/Forum/logo black bg.png" alt="easyrocket logo"></h1>

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
                    <!-- <h1><a href="#">Forum</a></h1> -->
                </div>
                <div class="menu">
                    <ul class="megamenu skyblue">
                        <li><a class="color2" href="../Home/index.html">Home</a></li>
                        <li><a class="color4" href="#">Events</a></li>
                        <li class="active grid"><a class="color10" href="Forum.html">Forum</a></li>
                        <li><a class="color3" href="../Home/index.html">Tickets</a></li>
                        <li><a class="color7" href="#">Shop</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <html>
    <div class="men">
        <p class="p-myPosts">
            <a href="Forum.php"><i class="fa fa-pencil-square-o"></i>Back</a>
        </p>

        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
    </div>
        <table class="table1">
            <tr>
                <td>
                    <form action="add_question.php" method="post" id="add_question_id">
                        <!-- <div>
                      <label>topic*</label><label class="validation-error hide" id="topicValidationError">This field is required.</label>
                      <input type="text" name="topic" id="topic">
                  </div> -->

                        <div>

                            <label>topic*</label><label class="validation-error hide" id="topicValidationError">This field is required.</label>
                            <select type="text" name="topic" class="form-control" id="topic">
                                <option value="" selected disabled>Select a topic</option>
                                <option value="topic 1">topic 1</option>
                                <option value="topic 2">topic 2</option>
                                <option value="topic 3">topic 3</option>
                            </select>
                        </div>
                        <label>question title</label>
                        <input type="text" name="questiontitle" id="questiontitle">
                        <div>
        <label>question content</label>
        <input type="text" name="questioncontent" id="questioncontent">
    </div>
    <div class="form-action-buttons">
        <input type="submit" value="Submit">
    </div>
                        </form>
                    </td>
            </tr>
        
    <!-- <div>
                      <label>City</label>
                      <input type="text" name="city" id="city">
                  </div> -->
                  <table class="table2" id="">
        <!-- <table class="list" id="employeeList"> -->
            <thead>
                <tr>
                    <th>topic</th>
                    <th>question title</th>
                    <th>question content</th>
                    <!-- <th>City</th> -->
                    <th>#</th>
                </tr>
                <?php
                    foreach ($listeQuestions as $question) {
                ?>

                    <tr>
                        <td><?php echo $question['topic']; ?></td>
                        <td><?php echo $question['question_title']; ?></td>
                        <td><?php echo $question['question_content']; ?></td>
                        <td>
                            <span><a href="update_question.php?id=<?php echo $question['question_id'] ?>"> update</a></span>
                            <span><a href="delete_question.php?question_id=<?php echo $question['question_id'] ?>&dir=1">delete</a></span>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </thead>
            <tbody>

            </tbody>
        </table>
    </td>
    </tr>
    </table>
    <script src="script.js"></script>
<!--------------------------------------------Controle de saisie ------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script>
        var $add_formation = $('#add_question_id');
if($add_formation.length){
    $add_formation.validate({
        rules:{
            topic: {
              required: true
          },
          questiontitle: {
              required: true
          },
            questioncontent: {
              required: true
          }
        },
        messages:{
            topic: {
              //error message for the required field
              required: '*Please select a topic!'
          },
          questiontitle: {
              required: '*Please enter the question title!'
          },
          questioncontent: {
              required: '*Please enter the question content!'
          }
        }
    });
}
    </script>  
</body>
</html>