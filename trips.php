<?php
	class trips{
		//private $idu=null;
		private $nomt=null;
		private $desct=null;
		private $prix=0;
		private $image=null;

		function __construct(/*$idu, */$nomt, $desct,$prix,$image){
			//$this->idu=$idu;
			$this->prix=$prix;
			$this->image=$image;
			$this->nomt=$nomt;
			$this->desct=$desct;
		}
		/*function getId(){
			return $this->idu;
		}*/
		function getNom(){
			return $this->nomt;
		}
		function getDesc(){
			return $this->desct;
		}
		function getPrix(){
			return $this->prix;
		}
		function getImage(){
			return $this->image;
		}
        //////////


		function setNom(string $nomt){
			$this->nomt=$nomt;
		}
		function setDesc(string $desct){
			$this->desct=$desct;
			
		}
		function setPrix(float $prix){
			$this->prix=$prix;
		}
		function setImage(string $image){
			$this->image=$image;
		}
	}


?>