<?php
require 'config.php';

require_once 'trips.php';
include 'tripsController.php';
$tripC = new tripsC();
$listeTrips = $tripC->afficherTrips();
$nbTrips = $tripC->afficherTrips();

$count = 0;

foreach($nbTrips as $sqd) {

  $count++ ;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard users</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/dashboard-users.css">
</head>
<body>
    <script src="./assets/javascript/dashboard.js"></script>
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
              <span>Karim</span>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
            <a href="" class="app-sidebar-link active">
                <span class="material-icons">view_list</span>
            </a>
            </a><br><br><br><br><br><br><br><br><br><br><br>
            <a href="index.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <a href="createTrip.php">ADD Trip</a>
              <p class="time">November, 11</p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                <span class="status-number"><?php echo($count);?></span>
                  <span class="status-type">Total Trips</span>
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
           
              <div class="">
                <!--this is the box to work with-->
                <div class="project-box" style="background-color: #f3f3f3;">
                  <div class="project-box-header">
                    <span></span>
                    <div class="more-wrapper">
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">List of Trips</p>
                
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header"> <tr>
                <tr>   
                <td>ID   </td>
                  <td>Trip    </td>
                  <td>Description     </td>
                  <td>Action    </td >
                  
                    </tr>
              </div>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 0%; background-color: #ff942e"></span>
                </div>
                

                
                <?php foreach ($listeTrips as $trips) 
                { 
                 ?>
                 <p class="box-users">
                  <tr>
                    <td class="box-users"><?php echo $trips['id']; ?> </td>
                    <td class="box-users"><?php echo $trips['nomt']; ?></td>
                    <td class="box-users"><?php echo $trips['desct']; ?></td>
                    
                    <td class="box-users"><a href="supprimerTrips.php?id=<?php echo $trips['id']; ?>" class="">Delete</a></td>
                  </tr>
               
                  </p>
              
              <?php } ?>
              
              <br><br><br><br>
            <!--this is the box to work with-->
          </div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>
