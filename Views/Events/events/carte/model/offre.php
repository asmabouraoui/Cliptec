<?PHP
	class offre{
		private  $id = null;
		private  $description = null;
		private  $datedeb = null;
		private  $datefin = null;
		private  $pourcentage = null;
		
		
		function __construct( $description, $datedeb,$datefin,$pourcentage){
			

			$this->description=$description;
			$this->datedeb=$datedeb;
			$this->datefin=$datefin;
			$this->pourcentage=$pourcentage;
			
		}
		
		function getid(){
			return $this->id;
		}
		function getdescription(){
			return $this->description;
		}
		function getdatedeb() {
			return $this->datedeb;
		}
		function getdatefin() {
			return $this->datefin;
		}
		function getpourcentage(){
			return $this->pourcentage;
		}
		

		function setdescription($description){
			$this->description=$description;
		}
		function setid($id){
			$this->id=$id;
		}
		function setdatedeb($datedeb){
			$this->datedeb=$datedeb;
		}
		function setdatefin($datefin){
			$this->datefin;
		}
		function setpourcentage($pourcentage){
			$this->pourcentage;
		}
		
		
	}
?>