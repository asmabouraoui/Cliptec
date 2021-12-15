<?php
require 'db.php';
session_start();
$sql = 'SELECT * FROM billetterie WHERE confirmation!=:conf';
$sql1 = 'SELECT * FROM billetterie WHERE confirmation=:conf';
$s = 'SELECT * FROM billetterie';
$stat = $connection->prepare($s);
$statement1 = $connection->prepare($sql1);
$statement = $connection->prepare($sql);
$cnf = "confirmer";
$stat->execute();
$statement->execute([':conf' =>$cnf ]);

$statement1->execute([':conf' => $cnf]);
$count = 0;
$commands = $statement->fetchAll(PDO::FETCH_OBJ);
$rq = $statement1->fetchAll(PDO::FETCH_OBJ);
$req = $stat->fetchAll(PDO::FETCH_OBJ);
foreach($req as $d):
$count++ ;
endforeach;
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
              <span><?php echo $_SESSION['name'].' '.$_SESSION['lastname']; ?></span>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
          <a href="../Dashboard/dashboard-main.php" class="app-sidebar-link">
                <span class="material-icons">home</span>
            </a>
            <a href="../Dashboard/dashboard-users.php" class="app-sidebar-link">
                <span class="material-icons">people</span>
            </a>
            <a href="../forum/dashboard-forum.php" class="app-sidebar-link">
                <span class="material-icons">forum</span>
            </a>
            <a href="../Dashboard/dashboard-store.php" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="../Events/events/view/dashboard-events.php" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a>
            <a href="#" class="app-sidebar-link active">
          <span class="material-icons">book_online</span>
        </a>
            <a href="../Index/indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <a href="create.php">ADD Reservation</a>
              <p class="time"><?php echo date('d F Y');?></p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <span class="status-number"><?php echo($count);?></span>
                  <span class="status-type">Total Voyageurs</span>
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
                <p class="box-content-header">List of Voyageur</p>
                <p class="box-content-subheader">Non Confirmer</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header"> <tr>
                <tr>   
                <td>ID   </td>
                  <td>FullName    </td>
                  <td>city     </td>
                  <td>codeposte     </td>
                  <td>Addresse   </td>
                  <td>Confirmation</td>
                  <td>Action    </td >
                  
                    </tr>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 0%; background-color: #ff942e"></span>
                </div>
                <p class="box-users"><?php foreach($commands as $cmd):  ?>
                  <tr>
                    <td  class="box-users"><?= $cmd->id_v; ?>     </td>
                    <td  class="box-users"><?= $cmd->fullname; ?></td>
                    <td  class="box-users"><?= $cmd->city; ?></td>
                    
                    <td  class="box-users"><?= $cmd->p_code; ?></td>
                    <td  class="box-users"><?= $cmd->addresse; ?></td>
                    <td  class="box-users"><?= $cmd->confirmation; ?></td>
                    <td  class="box-users">
                      <a href="update.php?id=<?= $cmd->id_v ?>" class="">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $cmd->id_v ?>" class='btn btn-danger'>Delete</a>
                      <a onclick="return confirm('Are you sure you want to accept this entry?')" href="confirmation.php?id=<?= $cmd->id_v ?>" class='btn btn-danger'>Confirmer</a><br>
                    </td>
                    </td>
            
                  </tr>
                <?php endforeach; ?>
              </div>
              <br><br><br><br>
              <div class="box-progress-bar">
                  <span class="box-progress" style="width: 0%; background-color: #ff942e"></span>
                </div>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 0%; background-color: #ff942e"></span>
                </div>
              <div class="project-box-content-header">
              <p class="box-content-header">List of Voyageur</p>
                <p class="box-content-subheader">Confirmer</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header"> <tr>
                <tr>   
                <td>ID   </td>
                  <td>FullName    </td>
                  <td>city     </td>
                  <td>codeposte     </td>
                  <td>Addresse   </td>
                  <td>Confirmation</td>
                  <td>Action    </td >
                  
                    </tr>
               
                <p class="box-users"><?php foreach($rq as $r):  ?>
                  <tr>
                    <td  class="box-users"><?= $r->id_v; ?>     </td>
                    <td  class="box-users"><?= $r->fullname; ?></td>
                    <td  class="box-users"><?= $r->city; ?></td>
                    
                    <td  class="box-users"><?= $r->p_code; ?></td>
                    <td  class="box-users"><?= $r->addresse; ?></td>
                    <td  class="box-users"><?= $r->confirmation; ?></td>
                    <td  class="box-users">
                      <a href="update.php?id=<?= $r->id_v ?>" class="">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $r->id_v ?>" class='btn btn-danger'>Delete</a><br>
                    </td>
                    </td>
            
                  </tr>
                <?php endforeach; ?>
              </div>
    
            <!--this is the box to work with-->
          </div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>
