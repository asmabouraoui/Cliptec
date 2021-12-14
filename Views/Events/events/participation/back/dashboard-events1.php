<?php
include "../Controller/participationC.php";
include_once '../config.php';
include_once './controller/servicec.php';
$participation=new participationC();
$listeparticipation=$participation->afficherparticipation();
$produitc=new eventc();
$prod=$produitc->afficherevente();



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
    <link rel="stylesheet" href="dashboard-events.css">
</head>
<body>
    <script src="dashboard.js"></script>
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
              <span>Name lastname</span> <!-- sayebha ba3ed twali automatique m3a l integration taa l user-->
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
            <a href="./dashboard-main.html" class="app-sidebar-link">
                <span class="material-icons">home</span>
            </a>
            <a href="./dashboard-users.html" class="app-sidebar-link">
                <span class="material-icons">people</span>
            </a>
            <a href="./dashboard-store.html" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="" class="app-sidebar-link active">
                <span class="material-icons">confirmation_number</span>
            </a><br><br><br><br><br><br><br><br><br><br><br>
            <a href="./indexC.html" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Events</p>
              <p class="time">November, 11</p> <!-- kif kif 5aleha-->
            </div>
            <div class="projects-section-line">
              <!-- l bar eli fih l total events/active...-->
              <!-- badel/zid kima t7eb-->
              
              <!-- youfa lina-->
              
                <button class="view-btn grid-view active" title="Grid View">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
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
                <p class="box-content-header">list of participants </p>
                <!-- <p class="box-content-subheader">in case you want to add anything here</p> -->
              </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
				  
                  <tr>
                    <th>Idp :</th>
                    <th>Nom :</th>
                    <th>Prenom :</th>
                    <th>Date de naissance :</th>
                    <th>Adresse :</th>
                    <th>Telephone :</th>
                    
                  </tr>
                  </thead>
				  <?php
				  foreach($listeparticipation as $row){
				  ?>

                  <tr>
                    <td> <?php echo $row['idp'];?></td>
					<td> <?php echo $row['nom'];?></td>
					<td> <?php echo $row['prenom'];?></td>
					<td> <?php echo $row['ddn'];?></td>
           <td> <?php echo $row['adresse'];?></td>
					 <td> <?php echo $row['tel'];?></td>
                     
                     <td> 
                     <form method="POST" action="../back/supprimer_participation.php">
                                        <button type="submit"  id="supprimer"  class="btn btn-danger">supprimer</button>
                                        <input type="hidden" value=<?PHP echo $row['idp']; ?> name="idp">
                                        </form>
                                        
                      
                                       <a class="btn btn-warning" href="modifier_participation.php?idp=<?PHP echo $row['idp']; ?>">Modifier </a>
                                     
                     </td>

                   </tr> 
                   <?PHP
				      }
		  	         ?>
                </table> 
            </br>
                <div class="project-box-content-header">
                <p class="box-content-header">Event list</p>
                <!-- <p class="box-content-subheader">in case you want to add anything here</p> -->
              </div>
              <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
      
           
      
            <div class="table-responsive">
          
          
              <table class="table align-items-center table-flush">
   <th>IdE</th>
  <th>Nom Evenement</th>
  <th>Date debut</th>
  <th>Date fin</th>
  <th>nbrt</th>
  <th>Adresse</th>
  <th>image</th>
   <th>Supprimer</th>
  <th>Modifier</th>
<tr>
<?php
foreach($prod as $pro){

?>
<td> <?php echo $pro['idE'] ?> </td>
<td> <?php echo $pro['nomE'] ?> </td>
<td> <?php echo $pro['datedebut'] ?> </td>
<td> <?php echo $pro['datefin'] ?> </td>
<td> <?php echo $pro['nbrt'] ?> </td>
<td> <?php echo $pro['adresse'] ?> </td>


<td><?php echo"<img src='./uploads/".$pro['image']."'>" ?>
      <style>
            img{
            width: 90px;
                        height: 90px;         
            }
            
            </style>

<td> 
<form method="post" action="supprumer.php">
<input type="submit" value="Supprimer">
<input type="hidden" value="<?php echo $pro['idE'] ?>" name="id_event">
</form></td>
<td> 
<form method="GET" action="Modifier.php">
<input type="submit" value="Modifier">
<input type="hidden" value="<?php echo $pro['idE'] ?>" name="id_event">
</form></td>
</tr>
<?php
} 
?>
</table> 

            </div>
          </div>
        </div>
                
</div>
        </div>
      </div>
      </div>
      </div>
      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
      <!-- Right Panel -->
      
      
      <script src="vendors/jquery/dist/jquery.min.js"></script>
          <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
          <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
          <script src="assets/js/main.js"></script>
      
      
          <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
          <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
          <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
          <script src="vendors/jszip/dist/jszip.min.js"></script>
          <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
          <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
          <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
          
      
    
</body>
</html>