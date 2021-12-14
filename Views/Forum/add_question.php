<?php

include_once('../../Controllers/Forum/questionC.php');
session_start();

$questionC = new QuestionC();
        
if( isset($_POST["topic"]) 
)
    {         
        $topic = $_POST['topic'];
        $questiontitle = $_POST['questiontitle'];
        $questioncontent = $_POST['questioncontent'];

        $question_date = date("d/m/Y - h:i:s A");

        //$user_id = $_SESSION['user']->user_id;  
        $user_id = $_SESSION['id'];

        $question = new Question($topic, $questiontitle, $questioncontent, $question_date, $user_id );
    
        $questionC->ajouter_question($question);
        //header('Location: ../views/dash_instructor-chapter-add.php');
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>