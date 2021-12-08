<?php
    include_once '../../Models\Client.php';
    include_once '../../Controllers/Profile/ClientC.php';
session_start();
$ClientC=new ClientC();

 $result = $ClientC->getUserInformation($_SESSION['CIN']);
 global $user;

 $user = $result->fetch(PDO::FETCH_ASSOC);

$image = 'https://media.makeameme.org/created/access-denied-epf7y8.jpg';
$imageData = base64_encode(file_get_contents($image));

 if ($user['Role']!='Admin')
die('<img src="data:image/jpeg;base64,'.$imageData.'">');
$ClientList= $ClientC->showExistingUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard users</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Dashboard/dashboard-users.css">
</head>
<body onload="test()">
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
    <script src="./assets/javascript/script.js"></script>
    <div class="app-container">
        <div class="app-header">
          <div class="app-header-left">
            <span class="material-icons app-icon">dashboard</span>
            <p class="app-name">Easyrocket dashboard</p>
          </div>
          <div class="app-header-right">
            <button class="mode-switch" title="Switch Theme">
              <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
              </svg>
            </button>
            <button class="profile-btn" style="pointer-events: none;">
              <span><?php echo $user['NAME'].' '.$user['Lastname']; ?></span>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
            <a href="./dashboard-main.php" class="app-sidebar-link">
                <span class="material-icons">home</span>
            </a>
            <a href="" class="app-sidebar-link active">
                <span class="material-icons">people</span>
            </a>
            <a href="./dashboard-store.html" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="./dashboard-events.html" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a><br><br><br><br><br><br><br><br><br><br><br>
            <a href="../Index/indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Users</p>
              <p class="time"><?php echo date('d F Y');?></p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <span class="status-number"><?php echo $ClientList->rowCount();?></span>
                  <span class="status-type">Total users</span>
                </div>
                <div class="item-status">
                  <span class="status-number client">0</span>
                  <span class="status-type">Client(s)</span>
                </div>
                <div class="item-status">
                  <span class="status-number transporter">0</span>
                  <span class="status-type">Transporter(s)</span>
                </div>
                <div class="item-status">
                  <span class="status-number admin">0</span>
                  <span class="status-type">Admin(s)</span>
                </div>
                <div class="item-status">
                  <span class="status-number online">0</span>
                  <span class="status-type">User(s) online</span>
                </div>
              </div>
              <div class="view-actions">
                <button class="view-btn grid-view active" title="Grid View">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
              </div>
            </div>
            <div class="project-boxes jsGridView">
              <div class="project-box-wrapper">
                <!--this is the box to work with-->
                <div class="project-box" style="background-color: #f3f3f3;">
                  <div class="project-box-header">
                    <span></span>
                    <div class="more-wrapper">
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">List of users</p>
                <p class="box-content-subheader">General</p>
              </div>
              <?php 
                if ($ClientList->rowCount()==NULL)
                  echo '<div style="position: relative; left: 50%; transform: translateX(-50%); text-align: center;"><h3>Empty List</h3></div>';
                else 
                echo '<table style="position: relative; left: 50%; transform: translateX(-50%);">
                <tr>
                <th style="padding: 0px 20px;">CIN</th>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Street</th>
                <th>City</th>
                <th>Phone</th>
                <th>Date of creation</th>
                <th>Role</th>
                <th>Online</th>
                <th>Grant Admin</th>
                <th>Revoke Admin</th>
                <th>Delete</th>
                </tr>';
              ?>
                  <?php
                  $transporters=0;
                  $admins=0;
                  $online=0;
                  $total = $ClientList->rowCount();
                  foreach($ClientList as $client){
                      if ($client['Role']=='Transporter')
                        $transporters++;
                        else if ($client['Role']=='Admin')
                        $admins++;
                        if ($client['Online']=='Yes')
                          $online++;
                  ?>
                  <tr>
                  <td><?php echo $client['CIN']; ?></td>
                  <td><?php echo $client['ID_C']; ?></td>
                  <td><?php echo $client['name']; ?></td>
                  <td><?php echo $client['Lastname']; ?></td>
                  <td><?php echo $client['Email']; ?></td>
                  <?php if ($client['street']=='')
                  echo '<td>empty</td>';
                  else
                  echo '<td>'.$client['street'].'</td>';
                  ?>
                  <?php if ($client['city']=='')
                  echo '<td>empty</td>';
                  else
                  echo '<td>'.$client['city'].'</td>';
                  ?>
                  <?php if ($client['Phone']=='')
                  echo '<td>empty</td>';
                  else
                  echo '<td>'.$client['Phone'].'</td>';
                  ?>
                  <td><?php echo $client['Dateofcreation']; ?></td>
                  <td><?php echo $client['Role']; ?></td>
                  <td><?php echo $client['Online']; ?></td>
                  <?php if ($client['Role']=='Admin') {
                        echo ('<td><b>Granted</b></td>');
                        echo ('<td><a href="revokeAdmin.php?CIN='.$client['CIN'].'"><span class="material-icons-outlined">remove_circle</span></a></td>');
                      }
                        else {
                        echo ('<td><a href="addAdmin.php?CIN='.$client['CIN'].'"><span class="material-icons-outlined">add_circle</span></a></td>');
                        echo ('<td><b>Not Granted</b></td>');
                      }
                  ?>
                  <td><a href="deleteuser.php?CIN=<?php echo $client['CIN'];?>&page=dashboard"><span class="material-icons-outlined">delete_forever</span></a></td>
                </tr>
                  <?php
                    }
                  ?>
                </table>
            </div>
            <script> $(".transporter").html(<?php echo $transporters?>); $(".admin").html(<?php echo $admins?>); $(".client").html(<?php echo ($total-($transporters+$admins));?>); $(".online").html(<?php echo $online; ?>);</script>
            <!--this is the box to work with-->
          </div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>