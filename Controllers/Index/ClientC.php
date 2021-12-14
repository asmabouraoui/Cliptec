<?php

    include '././config.php';
    include_once '././Models/Client.php';

    class ClientC {
        function register($client){
            // result is the value to test with if cin & email both exist and do actions accordingly.
            $result=0; // suppose that nor the cin or email already exist in the db.
            /** check if user CINexists in the database*/
            $sql = "SELECT * FROM utilisateurs WHERE CIN=:cin";
            $db = config::getConnection();
            $req=$db->prepare($sql);
            $req->bindValue(':cin', $client->getCIN());
			try{
				$req->execute();
                $value1 = $req->rowCount(); // number of results returned for cin = given cin in register.
            }
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            $result+=$value1; // add the value of value(number of rows returned from db) to verification variable result.
            /** check if user exists in the database*/
            // if value1>0 , halt inserting the user in the database and quit by returning the string below.
            if ($value1>0)
                return ('Your CIN already exists, Try signing in by clicking above.');
                // end of in verification.
                // email verification now.
                $sql = "SELECT * FROM utilisateurs WHERE Email=:email";
            $db = config::getConnection();
            $req=$db->prepare($sql);
            $req->bindValue(':email', $client->getEmail());
			try{
				$req->execute();
                $value2 = $req->rowCount(); // number of results returned for cin = given cin in register.
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            $result+=$value2; // add the value of value(number of rows returned from db) to verification variable result.
            /** check if user exists in the database*/
            // if value1>0 , halt inserting the user in the database and quit by returning the string below.
            if ($value2>0)
                return ('Your Email already exists, Try signing in.');
                // end of email verification



            // password hashing //

            $client->setPassword(hash("sha1",$client->getPassword()));

            // *************** //
            
            if ($result<2) {

            /** works fine register part */	
			$sql="INSERT INTO utilisateurs 
			VALUES (:CIN,:Lastname,:Name,:Email,:Password ,now(),'Client','No')";
			$db = config::getConnection();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    'CIN' => $client->getCIN(),
                    'Lastname' => $client->lastname,
					'Name' => $client->name,
                    'Email' => $client->getEmail(),
                    'Password' => $client->getPassword()
				]);	
                
			}
			catch (Exception $e){
				die('Erreur1: '.$e->getMessage());
			}
            $sql="INSERT into clients (CIN) VALUES (:CIN)";
            try{
				$query = $db->prepare($sql);
				$query->execute([
                    'CIN' => $client->getCIN(),
				]);	

                
			}
			catch (Exception $e){
				die('Erreur2: '.$e->getMessage());
			}
            /** works fine register part */		
            

            
		} else {
            $finalresult = "User already exists in the database.";
            return $finalresult;
        }
        }

        function connect($client) {

            $sql = "SELECT * FROM utilisateurs WHERE Email=:email AND PASSWORD=:PWD";
            $db = config::getConnection();
            $req=$db->prepare($sql);
			$req->bindValue(':email', $client->getEmail());
            $req->bindValue(':PWD', hash("sha1",$client->getPassword()));
			try{
				$req->execute();
                $result = $req->rowCount();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            $finalresult="";
            if ($result<1)
                $finalresult = "Invalid Informations";
        return $finalresult;
    
}

        function getUserCIN($email)
        {
            $sql = "SELECT * FROM utilisateurs WHERE Email=:email";
            $db = config::getConnection();
            $req=$db->prepare($sql);
			$req->bindValue(':email', $email);
			try{
				$req->execute();
                $result = $req->rowCount();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            $req = $req->fetch(PDO::FETCH_ASSOC); 
        return $req['CIN'];  
        }

        function getUserInformation($cin)
        {
            $sql = "SELECT * FROM utilisateurs, clients  WHERE utilisateurs.CIN=:CIN AND clients.CIN=:CIN;";
            $db = config::getConnection();
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $cin);
			try{
				$req->execute();
                $result = $req->rowCount();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        return $req; 
        }

        function updateUserInformation($client)
        {
            $sql ="UPDATE utilisateurs set EMAIL=:EMAIL,NAME=:name,Lastname=:lastname WHERE CIN=:CIN;";
            $db = config::getConnection();
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $client->getCIN());
            $req->bindValue(':EMAIL', $client->getEmail());
            $req->bindValue(':name', $client->name);
            $req->bindValue(':lastname', $client->lastname);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            $sql ="UPDATE clients set Street=:street,City=:city,Phone=:phone WHERE CIN=:CIN;";
            $db = config::getConnection();
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $client->getCIN());
            $req->bindValue(':street', $client->getStreet());
            $req->bindValue(':city', $client->getCity());
            $req->bindValue(':phone', $client->getPhone());
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }

        function showExistingUsers()
        {
           
            $sql = "SELECT utilisateurs.CIN,utilisateurs.Lastname,utilisateurs.name,utilisateurs.Email,utilisateurs.Dateofcreation,utilisateurs.Role,utilisateurs.Online,clients.street,clients.city,clients.Phone,clients.ID_C
            from utilisateurs
            INNER JOIN clients on utilisateurs.CIN=clients.CIN order by ID_C ASC";
            $db = config::getConnection();
			try{
				$req=$db->query($sql);
                return $req; 
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }
    }

?>