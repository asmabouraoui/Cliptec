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
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Dashboard/dashboard.css">
</head>
<body onload="test()">
<script src="../../assets/javascript/Home/script.js"></script>
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
            <a href="" class="app-sidebar-link active">
                <span class="material-icons">home</span>
            </a>
            <a href="./dashboard-users.php" class="app-sidebar-link">
                <span class="material-icons">people</span>
            </a>
            <a href="" class="app-sidebar-link">
                <span class="material-icons">forum</span>
            </a>
            <a href="./dashboard-store.php" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="../Events/events/view/dashboard-events.php" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a><br><br><br><br><br><br><br>
            <a href="../Index/indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Home</p>
              <p class="time"><?php echo date('d F Y');?></p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <span class="status-number"><?php echo $ClientList->rowCount();?></span>
                  <span class="status-type">Total users</span>
                </div>
                <div class="item-status">
                  <span class="status-number">0</span>
                  <span class="status-type">Products sold</span>
                </div>
                <div class="item-status">
                    <span class="status-number">0</span>
                    <span class="status-type">Tickets sold</span>
                  </div>
              </div>
              <div class="view-actions">
                <button class="view-btn list-view" title="List View">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01" y2="12" />
                    <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
                </button>
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
                <div class="project-box" style="background-color: #fee4cb;">
                  <div class="project-box-header">
                    <span>November 11, 2021</span>
                    <div class="more-wrapper">
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">Tickets sold</p>
                <p class="box-content-subheader">Store</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header">Number of tickets sold</p>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 0%; background-color: #ff942e"></span>
                </div>
                <p class="box-progress-percentage">0</p>
              </div>
            </div>
          </div>
          <div class="project-box-wrapper">
            <div class="project-box" style="background-color: #e9e7fd;">
              <div class="project-box-header">
                <span>November 11, 2021</span>
                <div class="more-wrapper">
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">New users</p>
                <p class="box-content-subheader">General</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header">Newly joined users</p>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: <?php echo $ClientList->rowCount();?>%; background-color: #4f3ff0"></span>
                </div>
                <p class="box-progress-percentage"><?php echo $ClientList->rowCount();?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>