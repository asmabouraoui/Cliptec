<?php
    include_once '../../Models\Client.php';
    include_once '../../Controllers/Profile/ClientC.php';

    include_once '../../Models\NotificationsTransporter.php';
    include_once '../../Controllers/Profile/NotificationsTransporterC.php';

    include_once '../../Models\NotificationsUser.php';
    include_once '../../Controllers/Profile/NotificationsUserC.php';

   /* include_once './Model/Client.php';
    include_once './Controller/ClientC.php';
    include_once './Model/NotificationsTransporter.php';
    include_once './Controller/NotificationsTransporterC.php';
    include_once './Model/NotificationsUser.php';
    include_once './Controller/NotificationsUserC.php'; */
session_start();

$clientC = new ClientC();
$cin = $clientC->getUserCIN($_SESSION['email']);
$_SESSION['CIN'] = $cin;

 $result = $clientC->getUserInformation($_SESSION['CIN']);
 global $user;

 $user = $result->fetch(PDO::FETCH_ASSOC);
 //
 $_SESSION['name']=$user['NAME'];
 $_SESSION['lastname']=$user['Lastname'];
 $_SESSION['online']=$user['Online'];
//
 $_SESSION['role']=$user['Role'];
 include_once '../../config.php';

 $sql ="UPDATE utilisateurs SET Online='Yes' WHERE CIN=:cin";
 $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':cin', $_SESSION['CIN']);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
                header("Location:indexC.php?code=errorDB");	
			}
            if ($_SESSION['role']=='Transporter')
                {
                    $sql ="UPDATE livreurs SET Availability='Yes' WHERE CIN=:cin";
                    $db = config::getConnexion();
                               $req=$db->prepare($sql);
                               $req->bindValue(':cin', $_SESSION['CIN']);
                               try{
                                   $req->execute();
                               }
                               catch(Exception $e){
                                   die('Erreur:'. $e->getMessage());
                                   header("Location:indexC.php?code=errorDB");	
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
<link rel="stylesheet" href="../../assets/css/Index/indexC.css">
</head>
<body>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <!--  <script src="../../assets/javascript/Home/script.js"></script> -->
    <header>
        <img src="../../assets/images/logo black bg-trimmy.png" alt="" srcset="">
        <ul>
            <a class="list" href="../Forum/Forum.php"><li>Forum</li></a>
            <a class="list" href="#"><li>Events</li></a>
            <a class="list" href="../Shop/shop.html"><li>Shop</li></a>
            <?php 
                if ($user['Role']=='Admin')
                    echo '<a class="list" href="../Dashboard/dashboard-main.php"><li>Dashboard</li></a>';
            ?>
        </ul>
        <div class="buttons">
       <a href="../Profile/userprofile.php"><button type="button">Profile</button></a>
       <a href="../../Controllers\Profile\endsession.php"><button type="button">Log out</button></a>
       <a href="#"><span class="material-icons-outlined menu">menu</span></a>
       <a href="#" id="notification" onmouseup="togglenotifications()"><span class="material-icons-outlined notification">notifications</span></a>   
        <div class="number"></div>    
    </header>
        <!-- notification box (outter wrapper) -->
        <div id="notification_container" class="notification_container">
            <div class="header">
            <a href="#" id="close" onclick="closeNotification()"><span class="material-icons-outlined icon"></span></a>
            <span class="title">Notifications</span> 
            </div>
            <!-- Working space for php integration with notifications starts here-->
            <?php

            $NotificationsC=new NotificationC();
            
            $Notifications= $NotificationsC->getNotifications();

            if ($user['Role']=='Admin')
            {
                if ($Notifications->rowCount()>0)
                {

            foreach($Notifications as $Notification)
            {
                $NotClient = $clientC->getUserInformation($Notification['From_Client'])->fetch(PDO::FETCH_ASSOC);
                    $link = "./profile.php?q=".$NotClient['CIN'];
                    $i=0;
                echo '<div class="container" id="'.++$i.'box-notifications">
                <div class="empty">
                <span class="material-icons-outlined icon" style="color: rgb(255, 154, 39)">hail</span>
                </div>
                <div class="right_content">
                    <div class="content">
                        <span class="name">'.$NotClient['NAME'].' '.$NotClient['Lastname'].'</span>
                        <span class="date">'.$Notification['Sent_on'].'</span>
                    </div>
                    <div class="content">
                    <span class="description">'.$Notification['Content'].'</span>
                    </div>
                    <div class="content">
                    <button type="submit" class="accept button" onclick=approve2("'.$NotClient['CIN'].'","'.$_SESSION['CIN'].'","'.$i.'")>Accept</button>
                    <button type="submit" class="refuse button" onclick=refuse2("'.$NotClient['CIN'].'","'.$_SESSION['CIN'].'","'.$i.'")>Refuse</button>
                    <button type="submit" class="verify button" onclick=profile("'.$NotClient['CIN'].'","'.$_SESSION['CIN'].'")>Verify</button>
                    </div>
                </div>
            </div>';
            }
        } else if ($Notifications->rowCount()==0){
            echo '<div class="container zero">
                <div class="empty">
                <span class="material-icons-outlined icon">work_off</span>
                </div>
                <div class="right_content">
                    <div class="content">
                        <span class="name"></span>
                        <span class="date"></span>
                    </div>
                    <div class="content">
                    <span class="description">No requests to become a transporter at the moment.</span>
                    </div>
                    <div class="content">
                    
                    </div>
                </div>
            </div>';
        }
    }

        /* Personal notifications below */

        $NotificationsUC=new NotificationUC();
            
            $Notifications= $NotificationsUC->getNotifications($_SESSION['CIN']);

        if ($Notifications->rowCount()>0)
                {

            foreach($Notifications as $Notification)
            {
                $NotClient = $clientC->getUserInformation($Notification['From_user'])->fetch(PDO::FETCH_ASSOC);
                $sent = date("d-m-Y H:i",strtotime($Notification['Date_send']));
                $i=0;
                echo '<div class="container" id="'.++$i.'box-notificationsuser">
                <div class="empty">
                <span class="material-icons-outlined icon" onclick=hidenotifications("'.$NotClient['CIN'].'","'.$Notification['Id_notification'].'","'.$i.'")>visibility</span>
                </div>
                <div class="right_content">
                    <div class="content"> 
                        <span class="name">'; if ($NotClient['Role']=='Admin') echo 'Easyrocket Team'; else echo $NotClient['NAME'].' '.$NotClient['Lastname']; echo '</span>
                        <span class="date">'.$sent.'</span>
                    </div>
                    <div class="content">
                    <span class="description">'.$Notification['Message'].'</span>
                    </div>
                    <div class="content">
                    </div>
                </div>
            </div>';
            }
        } else //if ($Notifications->rowCount()==0){
            echo '<div class="container zero userempty" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                <div class="empty">
                <span class="material-icons-outlined icon">sentiment_very_satisfied</span>
                </div>
                <div class="right_content">
                    <div class="content">
                        <span class="name"></span>
                        <span class="date"></span>
                    </div>
                    <div class="content">
                    <span class="description">No new notifications.</span>
                    </div>
                    <div class="content">
                    </div>
                </div>
            </div>';
            echo '<script>$(".number").html($(".container").length-($(".zero").length));</script>';
        //}

        /* personal notifications above */
        

            ?>
            <!-- Working space for php integration with notifications ends here-->

            <!-- container to work with down -->
           <!-- Notification container starts here <div class="container">
                <div class="empty">
                <span class="material-icons-outlined icon">hail</span>
                </div>
                <div class="right_content">
                    <div class="content">
                        <span class="name">Amrou Ghribi</span>
                        <span class="date">01/12/2021</span>
                    </div>
                    <div class="content">
                    <span class="description">Awaiting your approval to become a transporter!</span>
                    </div>
                    <div class="content">
                        <form action="" method="post">
                    <button type="submit" class="accept button">Accept</button></form>
                    <form action="" method="post">
                    <button type="submit" class="refuse button">Refuse</button></form>
                    <button type="submit" class="verify button" onclick="">Verify</button>
                    </div>
                </div>
            </div> Notification container prototype ends here-->
            <!-- container to work with up -->

        </div> 
        <!-- notification box (outter wrapper) ending-->



        <section>
            <span>Welcome to Easyrocket</span><br><span class="username"><?php echo $user['NAME'].' ';echo $user['Lastname'];?>!</span>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><span class="title">Explore the universe<br>like never before.</span>
        </section>
        <div class="planetsmenu">
        <div id="planets_div" class="planets-div"><a href="#" onclick="earth()"><span class="planets" id="earth">Earth</span></a>
            <a href="#" onclick="mars()"><span class="planets"id="mars">Mars</span></a>
            <a href="#" onclick="moon()"><span class="planets selected"id="moon">Moon</span></a>
            </div>
            <div class="drag">
            <span class="material-icons-outlined" style="color:white; font-size:18px;">swipe</span>
            <span id="test" style="color: white;">Drag left - right to move the object.</span>
            </div>
        </div>

        <iframe id="planet" src='https://my.spline.design/untitledcopy-82502a1c88b7a1935ad89719a1779765/' frameborder='0' width='100%' height='100%'></iframe>
            <script script src="../../assets/javascript/Home/script.js"></script>
</body>
</html>