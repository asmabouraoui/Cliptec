<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/Dashboard/dashboard-store.css">
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
              <span>Amrou Ghribi</span>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-sidebar">
            <a href="dashboard-main.php" class="app-sidebar-link">
                <span class="material-icons">home</span>
            </a>
            <a href="dashboard-users.php" class="app-sidebar-link">
                <span class="material-icons">people</span>
            </a>
            <a href="#" class="app-sidebar-link active">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="../Tickets/index.php" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a><br><br><br><br><br><br><br><br><br><br><br>
            <a href="./indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Store</p>
              <p class="time"><?php echo (date('Y-m-d'))?></p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <span class="status-number">6</span>
                  <span class="status-type">Total items</span>
                </div>
                <div class="item-status">
                  <span class="status-number">1</span>
                  <span class="status-type">Item(s) out of stock</span>
                </div>
                <div class="item-status">
                  <span class="status-number">4</span>
                  <span class="status-type">Newly added items</span>
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
                <div class="project-box" style="background-color: #8299ff;">
                  <div class="project-box-header">
                    <span></span>
                    <div class="more-wrapper">
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">White T-shirt with Easyrocket logo</p>
                <p class="box-content-subheader">Price $$ - in stock</p>
              </div>
            </div>
          </div>
          <div class="project-box-wrapper">
            <div class="project-box" style="background-color: #ff6262;">
              <div class="project-box-header">
                <span></span>
                <div class="more-wrapper">
            </div>
          </div>
          <div class="project-box-content-header">
            <p class="box-content-header">White T-shirt with Easyrocket logo</p>
            <p class="box-content-subheader">Price $$ - out of stock</p>
          </div>
        </div>
      </div>
      <div class="project-box-wrapper">
        <div class="project-box" style="background-color: #e5ff88;">
          <div class="project-box-header">
            <span></span>
            <div class="more-wrapper">
        </div>
      </div>
      <div class="project-box-content-header">
        <p class="box-content-header">White T-shirt with Easyrocket logo</p>
        <p class="box-content-subheader">Price $$ - in stock NEW</p>
      </div>
    </div>
  </div>
  <div class="project-box-wrapper">
    <div class="project-box" style="background-color: #e5ff88;">
      <div class="project-box-header">
        <span></span>
        <div class="more-wrapper">
    </div>
  </div>
  <div class="project-box-content-header">
    <p class="box-content-header">White T-shirt with Easyrocket logo</p>
    <p class="box-content-subheader">Price $$ - in stock NEW</p>
  </div>
</div>
</div>
<div class="project-box-wrapper">
  <div class="project-box" style="background-color: #e5ff88;">
    <div class="project-box-header">
      <span></span>
      <div class="more-wrapper">
  </div>
</div>
<div class="project-box-content-header">
  <p class="box-content-header">White T-shirt with Easyrocket logo</p>
  <p class="box-content-subheader">Price $$ - in stock NEW</p>
</div>
</div>
</div>
<div class="project-box-wrapper">
  <div class="project-box" style="background-color: #e5ff88;">
    <div class="project-box-header">
      <span></span>
      <div class="more-wrapper">
  </div>
</div>
<div class="project-box-content-header">
  <p class="box-content-header">White T-shirt with Easyrocket logo</p>
  <p class="box-content-subheader">Price $$ - in stock NEW</p>
</div>
</div>
</div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>