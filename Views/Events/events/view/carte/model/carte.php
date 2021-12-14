<?PHP
	class carte{
		private  $idc;
		private  $nom = null;
		private  $prenom = null;
		private  $ddn = null;
		private  $adresse = null;
        private  $tel = null;
		
		function __construct( $nom, $prenom, $ddn, $adresse, $tel){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->ddn=$ddn;
			$this->adresse=$adresse;
            $this->tel=$tel;
		}
		
		function getidc(){
			return $this->idc;
		}
		function getNom(){
			return $this->nom;
		}
		function getprenom() {
			return $this->prenom;
		}
		function getddn(){
			return $this->ddn;
		}
		function getadresse(){
			return $this->adresse;
		}
        function gettel(){
			return $this->tel;
		}

		function setNom($nom){
			$this->nom=$nom;
		}
		function setprenom($prenom){
			$this->prenom;
		}
		function setddn($ddn){
			$this->ddn=$ddn;
		}
        function setadresse($adresse){
			$this->adresse=$adresse;
		}
        function settel($tel){
			$this->tel=$tel;
		}
		
	}
?>