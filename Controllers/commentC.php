<?php

include_once ('../../config.php');
include_once('../../Models/comment.php');

class commentC{

/********************************************Function afficher comment d'un utilisateur*****************************************/
Function afficher_comment($id){

	$sql="SELECT * FROM comment WHERE question_idd = '$id' order by likee desc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher all comment*****************************************/
Function afficher_all_comment(){

	$sql="SELECT * FROM comment  ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//*****************************************Function récupérer question***********************************************
Function recuperer_question($id){

    $sql="SELECT * FROM questions WHERE question_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer question***********************************************
function supprimer_comment($id){
    $sql = "DELETE FROM comment WHERE comment_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_question**************************************
function ajouter_comment($comment){
    $sql = "INSERT INTO comment(question_idd , user_name, comment_content, likee) VALUES ( :question_idd ,:user_name, :comment_content,:likee )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'question_idd' => $comment->getquestion_idd(),
            'user_name' => $comment->getuser_name(),
            'comment_content' => $comment->getcomment_content(),
            'likee' => $comment->getlikee()
        ]);
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier question*********************************************
function modifier_comment($comment, $id){
    $question_idd = $comment->getquestion_idd();
    $user_name = $comment->getuser_name();
    $comment_content = $comment->getcomment_content();
    $likee = $comment->getlikee();
    $update_comment = "UPDATE comment SET question_idd = :question_idd, user_name = :user_name, comment_content = :comment_content,likee= :likee  WHERE comment_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_comment);
        $query->execute([
             'question_idd' => $question_idd,
             'user_name' => $user_name,
             'comment_content' => $comment_content,
             'likee' => $likee
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //  header("Location: ../views/...");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}










}//end class QuestionC



?>