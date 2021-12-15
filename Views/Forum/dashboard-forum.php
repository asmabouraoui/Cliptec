<?php
include_once('../../Controllers/Forum/questionC.php');


$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_all_questions();
?>
<?php
include_once('../../Controllers/commentC.php');


$commentC = new commentC();
$listecomment = $commentC->afficher_all_comment();
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
              <span>Name here</span>
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
            <a href="" class="app-sidebar-link active">
                <span class="material-icons">forum</span>
            </a>
            <a href="../Dashboard/dashboard-store.php" class="app-sidebar-link">
                <span class="material-icons">shopping_cart</span>
            </a>
            <a href="../Events/events/view/dashboard-events.php" class="app-sidebar-link">
                <span class="material-icons">confirmation_number</span>
            </a>
            <a href="../Index/indexC.php" class="app-sidebar-link">
                <span class="material-icons">keyboard_return</span>
            </a>
          </div>
          <div class="projects-section">
            <div class="projects-section-header">
              <p>Forum</p>
              <p class="time"><?php echo date('d F Y');?></p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <!-- <span class="status-number">Whatever</span>
                  <span class="status-type">whatever</span> -->
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
                <p class="box-content-header">List of questions</p>
                <!-- <p class="box-content-subheader">in case you want to add anything here</p> -->
              </div>
              <table style="position: relative; left: 50%; transform: translateX(-50%);">
                <tr>
                <th>Question title</th>
                <th>Question content</th>
                <th>Date question</th>
                <th>Delete</th>
                </tr>
                <?php
                    foreach ($listeQuestions as $question) {
                ?>
                  <tr>
                  <td><?php echo $question['question_title']; ?></td>
                  <td><?php echo $question['question_content']; ?></td>
                  <td><?php echo $question['question_date']; ?></td>
                  <td><a href="delete_question.php?question_id=<?php echo $question['question_id'] ?>&dir=2"><span class="material-icons-outlined">delete_forever</span></a></td>
                </tr>
                <?php } ?>
                </table>




                <div class="project-box-content-header">
                <p class="box-content-header">List of Comments</p>
                <!-- <p class="box-content-subheader">in case you want to add anything here</p> -->
              </div>
              <table style="position: relative; left: 50%; transform: translateX(-50%);">
                <tr>
                <th>Username</th>
                <th>Comment</th>
                </tr>
                <?php
                    foreach ($listecomment as $comment) {
                ?>
                  <tr>
                  <td><?php echo $comment['user_name']; ?></td>
                  <td><?php echo $comment['comment_content']; ?></td>
                  <td><a href="delete_comment.php?comment_id=<?php echo $comment['comment_id'] ?>&dir=2"><span class="material-icons-outlined">delete_forever</span></a></td>
                </tr>
                <?php } ?>
                </table>
            </div>

               <iframe src="StatisticsComment.php" style=" height:400px;width:100%;display:block"></iframe>
               <iframe src="StatisticsQuestions.php" style=" height:400px;width:100%;display:block"></iframe>
           

               <p class="box-content-header">reported questions</p>
                <!-- <p class="box-content-subheader">in case you want to add anything here</p> -->
              </div>
              <table style="position: relative; left: 50%; transform: translateX(-50%);">
                <tr>
                <th>reports</th>
                </tr>
                <?php
                    foreach ($listeQuestions as $question) {
                ?>
                  <tr>
                  <td><?php echo $question['question_title']; ?></td>
                  <td><?php echo $question['question_content']; ?></td>
                  <td><?php echo $question['question_date']; ?></td>
                  <td><a href="delete_question.php?question_id=<?php echo $question['question_id'] ?>&dir=2"><span class="material-icons-outlined">delete_forever</span></a></td>
                </tr>
                <?php } ?>
                </table>
            <!--this is the box to work with--          </div>
        </div>
      </div>
      </div>
      </div>
    
</body>
</html>