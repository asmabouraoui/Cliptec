<?php
include_once '../config.php';
include_once '../controller/servicec.php';

$db=config::getConnexion();
$sql="SELECT * FROM evennement where idE=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_GET['id_event']]);
$prod=$recipesStatement->fetchall();


session_start();

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
    <link rel="stylesheet" href="./dashboard-forum.css">
</head>
<body>
    <script src="./script-dash.js"></script>
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
              <span>Sarah</span>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
            <a href="./dashboard-main.php" class="app-sidebar-link">
                <span class="material-icons">home</span>
            </a>
            <a href="" class="app-sidebar-link">
                <span class="material-icons">people</span>
            </a>
            <a href="./dashboard-store.html" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="./dashboard-events.html" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a><br><br><br><br><br><br><br><br><br><br><br>
            <a href="./indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Events</p>
              <p class="time">November, 11</p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <!-- <span class="status-number">Whatever</span>
                  <span class="status-type">whatever</span> -->
                </div>
              </div>
      
                <button class="view-btn grid-view active" title="Grid View">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
              </div>
           
           
      
            <div class="table-responsive">
              <!-- Projects table -->
          
   <form class="table align-items-center table-flush"  name="f1"  method="post" action="Modifierser.php" enctype="multipart/form-data" onSubmit="return verif()">
        <center><legend><h2> Modifier
<?php
foreach ($prod as $res) {

}
?>

        </h2></legend></center>
        <table id="example1" class="table table-striped">
        <tr>
          <input type="hidden" name="id_produit"  value="<?php echo $res['idE'] ?>">
          <th>Nom event</th>
          
             <th><input type="text" name="nom" value="<?php  echo $res['nomE']; ?>"/></th>
        </tr>
        <th>Date Debut</th>
          <th><input type="date" name="datedeb" value="<?php  echo $res['datedebut']; ?>"/></th>
         <tr>
          <th>Date fin</th>
          <th><input type="date" name="datefin" value="<?php  echo $res['datefin']; ?>"/></th>
        </tr>
        </table>
        <br>
        <center>
        <td><button type="submit" name="Modifier" value="Modifier" class="btn btn-danger">Modifier</button></td>
      </center>
      </form>
            </div>
          </div>
        </div>
       <table>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
    
    </div>
  </div>
  <!--   Core   -->
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
    

    
  </script>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


</body>

</html>