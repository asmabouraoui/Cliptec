<?php

    include_once '../../Models\Client.php';
    include_once '../../Controllers/Profile/ClientC.php';

    include_once '../../Models\NotificationsTransporter.php';
    include_once '../../Controllers/Profile/NotificationsTransporterC.php';

    include_once '../../Models\NotificationsUser.php';
    include_once '../../Controllers/Profile/NotificationsUserC.php';
    
    include_once '../../Models\Transporter.php';
    include_once '../../Controllers/Profile/TransporterC.php';
session_start();

$client = null;

 // create an instance of the client controller
 $clientC = new ClientC();
 $transporterC = new TransporterC();

 $result = $clientC->getUserInformation($_SESSION['CIN']);

 if ($_SESSION['role']=='Transporter') {
    $resultTransporter = $transporterC->getData($_SESSION['CIN']);
    $transp = $resultTransporter->fetch(PDO::FETCH_ASSOC);
 }

 global $user;

 $user = $result->fetch(PDO::FETCH_ASSOC);

 $sql = "SELECT * FROM notificationst WHERE From_Client=:cin AND Approved='No'";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			$req->bindValue(':cin', $_SESSION['CIN']);
			try{
				$req->execute();
                $result = $req->rowCount();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
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
    <link rel="stylesheet" href="../../assets/css/Profile/userprofile.css">
</head>
<body>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
<script src="../../assets/javascript/Home/script.js"></script>

        <header>
            <img id="easyrocket" src="../../assets/images/logo black bg-trimmy.png" alt="" srcset="" onclick="goToIndexC()">
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
       <a href="#" id="notification" onmouseup="togglenotifications()"><span class="material-icons-outlined notification">notifications</span></a>   
        <div class="number"></div>  
        </header>

    <div class="profilewrapper">
        <div class="background"></div>

            <div class="buttons-container">
    <a class="php" href="modifyuser.php?UpdateUser&Name=<?php echo $user['NAME']; ?>&Lastname=<?php echo $user['Lastname']; ?>&Role=<?php echo $user['Role'];?>&Email=<?php echo $user['Email'];?>&Street=<?php echo $user['Street']; ?>&City=<?php echo $user['City'];?>&Phone=<?php echo $user['Phone']; ?>&cin=<?php echo $user['CIN'];?>"><span class="material-icons-outlined icon">manage_accounts</span></a>  
    <a class="php" href="../../Controllers/Profile/deleteuser.php?CIN=<?php echo $user['CIN'];?>&page=profile"><span class="material-icons-outlined icon" onclick="return confirm('Are you sure you want to delete your account?');">delete</span></a>
    <a href="../../Controllers/Profile/endsession.php"><span class="material-icons-outlined icon">logout</span></a>
    </div>
    <div class="profile" style="background: url('https://avatars.dicebear.com/api/adventurer-neutral/espritta.svg?mood[]=happy&background=%23000000');"></div>
    <pre class="nameuser"><?php echo $user['NAME'];?> <?php echo $user['Lastname'];?></pre><p><?php echo $user['Role'];?></p><br><hr class="upper">
        <pre class="info">Profile details</pre>
    <!-- form container -->
    <div class="formwrapper">
    <div class="containerform">
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">alternate_email</span>Email</span>
            <span class="userdata"><?php echo $user['Email'];?></span>
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">calendar_today</span>Date of creation</span>
            <span class="userdata"><?php echo $user['Dateofcreation'];?></span>
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">info</span>Street</span>
            <span class="userdata"><?php if (empty($user['Street'])) echo 'not set yet'; else echo $user['Street'];?></span>
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform" >info</span>City</span>
            <span class="userdata"><?php if (empty($user['City'])) echo 'not set yet'; else echo $user['City'];?></span>
        </div>
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform" >phone_iphone</span>Phone</span>
            <span class="userdata"><?php if (empty($user['Phone'])) echo 'not set yet'; else echo $user['Phone'];?></span>
        </div>
    </div>
    <!-- form container ends here-->
    <?php if ($_SESSION['role']=='Transporter') {
    echo '<div class="containerform">
        <div class="smallcontainer">
            <span class="title"><span class="material-icons-outlined iconform">calendar_today</span>Governorate</span>';
            if ($transp['Governorat']=='')
            { echo '<span class="userdata">Not set yet</span>         </div>
                </div>';}
            else echo'
            <span class="userdata">'.$transp['Governorat'].'</span>
        </div>
    </div>'; }
    ?>
    </div>
            <!-- WIP -->

    <?php
        if ($result<1)
            $text = 'Submit your request';
            else
            $text = 'Waiting for approval';
    if ($user['Role']=='Client')
   echo '<div class="reqTransporter">
        <div class="content_wrapper">
        <div class="contenttransporter">
            <span class="titletransporter">Being a transporter interests you?<br> Apply now!</span>
        </div>
        </div>
        <div class="content_wrapper">
        <div class="contenttransporter submit">
            <form action="../../Controllers/Profile/addTransporter.php?cin='.$user['CIN'].'" method="post" onsubmit="return checkInfos()">
            <button type="submit">'.$text.'</button></form>
        </div>
        </div>

    </div>';
    ?>
    </div> 

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
                    <button type="submit" class="verify button" onclick=profile("'.$NotClient['CIN'].'","profile"")>Verify</button>
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
 
    
        <footer>
        </footer>
</body>
</html>