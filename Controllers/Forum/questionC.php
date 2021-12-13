<?php

include_once ('../../config.php');
include_once('../../Models/question.php');

class QuestionC{
/********************************************Function afficher questions d'un utilisateur*****************************************/
Function afficher_questionss($id){

	$sql="SELECT * FROM questions WHERE user_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}
/********************************************Function afficher questions d'un utilisateur*****************************************/
Function afficher_questions($id){

	$sql="SELECT * FROM questions WHERE question_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher all questions*****************************************/
Function afficher_all_questions(){

	$sql="SELECT * FROM questions  ";
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
function supprimer_question($id){
    $sql = "DELETE FROM questions WHERE question_id ='$id' ";
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
function ajouter_question($question){
    $sql = "INSERT INTO questions(	topic , question_title, question_content ,question_date, user_id) VALUES ( :topic ,:question_title, :question_content ,:question_date, :user_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'topic' => $question->gettopic(),
            'question_title' => $question->getquestion_title(),
            'question_content' => $question->getquestion_content(),
            'question_date' => $question->getquestion_date(),
            'user_id' => $question->getuser_id()
        ]);
        header("Location: ../../Views/Forum/myposts.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier question*********************************************
function modifier_question($question, $id){
    $topic = $question->gettopic();
    $question_title = $question->getquestion_title();
    $question_content = $question->getquestion_content();

    $update_question = "UPDATE questions SET topic = :topic, question_title = :question_title, question_content = :question_content  WHERE question_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_question);
        $query->execute([
             'topic' => $topic,
             'question_title' => $question_title,
             'question_content' => $question_content
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