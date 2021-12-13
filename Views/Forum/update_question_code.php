<?php

include_once('../../Controllers/Forum/questionC.php');

$questionC = new QuestionC();        

if(isset($_POST["topic"]) )
    {   $topic = $_POST['topic'];
        $questiontitle = $_POST['questiontitle'];
        $questioncontent = $_POST['questioncontent'];

        $id = $_GET['id'];
        
        $question = new Question($topic, $questiontitle, $questioncontent, "", 1);
    
        $questionC->modifier_question($question ,$id);
        header("Location: ./myposts.php"); 
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>