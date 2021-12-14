<?php
include_once('../../Controllers/Forum/questionC.php');

$questionC = new QuestionC();
$question_id= $_GET['question_id'];

$listeQuestions = $questionC->supprimer_question($question_id);

$direction = $_GET['dir'];
if($direction == 1)
{
    header("Location: ./myposts.php"); 
}
else if($direction == 2)
{
    header("Location: ./dashboard-forum.php");
}

?>