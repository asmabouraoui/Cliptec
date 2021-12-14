<?php
class event{
	
private $id;
private $name;
private $datedeb;
private $datefin;
private $nbrt;
private $adresse;
private $image;


public  function __construct($id,$name,$datedeb,$datefin,$nbrt,$adresse,$image)
{
	$this->id=$id;
  $this->name=$name;
    $this->datedeb=$datedeb;
    $this->datefin=$datefin;
       $this->nbrt=$nbrt;
    $this->adresse=$adresse;
      $this->image=$image;



}

public  function getid()
{
	return $this->id;
}

public function getname()
{
	return $this->name;
}
public function getdatedeb()
{
	return $this->datedeb;
}
public function getdatefin()
{
	return $this->datefin;
}
public function getnbrt()
{
   return $this->nbrt;
}
public function getadrs()
{
   return $this->adresse;
}

public function getimage()
{
   return $this->image;
}





}
class eventt{
   
private $id;
private $name;
private $datedeb;
private $datefin;



public  function __construct($id,$name,$datedeb,$datefin)
{
   $this->id=$id;
  $this->name=$name;
    $this->datedeb=$datedeb;
    $this->datefin=$datefin;
    

}

public  function getid()
{
   return $this->id;
}

public function getname()
{
   return $this->name;
}
public function getdatedeb()
{
   return $this->datedeb;
}
public function getdatefin()
{
   return $this->datefin;
}






}

?>