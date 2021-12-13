<?php
include_once('../../Controllers/commentC.php');

$commentC = new commentC();
$comment_id= $_GET['comment_id'];

$listecomment = $commentC->supprimer_comment($comment_id);

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