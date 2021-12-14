<?php
	class trips{
		//private $idu=null;
		private $nomt=null;
		private $desct=null;
		
		function __construct(/*$idu, */$nomt, $desct){
			//$this->idu=$idu;
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
        //////////


		function setNom(string $nomt){
			$this->nomt=$nomt;
		}
		function setDesc(string $desct){
			$this->desct=$desct;
		}
	}


?>