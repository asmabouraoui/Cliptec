<?php
class Commande{
    private string $idCommande;
    private string $Status;
    private int $prixCommande;
    private string $dateCommande;
    
    public function __construct(string $Status, int $prixCommande,string $dateCommande)
    {
        $this->Status = $Status;
        $this->prixCommande = $prixCommande;
        $this->dateCommande = $dateCommande;
    }

    public function getId()
    {
        return $this->idCommande;
    }

    public function setStatus(string $status)
    {
        $this->Status = $status;
    }
    public function getStatus()
    {
        return $this->Status;
    }

    public function setPrix(int $prix)
    {
        $this->prixCommande = $prix;
    }
    public function getPrix()
    {
        return $this->prixCommande;
    }

    public function setDate(string $date)
    {
        $this->dateCommande = $date;
    }
    public function getDate()
    {
        return $this->dateCommande;
    }
}