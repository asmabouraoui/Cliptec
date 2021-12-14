<?php

include_once('../../Controllers/commentC.php');

$commentC = new commentC();        

if(isset($_POST["r^p"]) )
    {
       

        $id = $_GET['id'];
        $idd=$_GET['idd'];
        $conn=$_GET['conn'];
        $name=$_GET['name'];
        $report=$_GET['report'];
        $comment = new comment($idd,$name,$conn,$report+1);
    
        $commentC->modifier_comment($comment ,$id);
        header("Location:react.php?id=$idd"); 
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>