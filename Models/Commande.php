<?php
class Commande{
    private string $idCommande;
    private string $Nom;
    private int $prixCommande;
    private string $dateCommande;
    
    public function __construct(string $idCommande,string $Nom, int $prixCommande,string $dateCommande)
    {
        $this->idCommande = $idCommande;
        $this->Nom = $Nom;
        $this->prixCommande = $prixCommande;
        $this->dateCommande = $dateCommande;
    }

    public function setId(string $id)
    {
        $this->idCommande = $id;
    }
    public function getId()
    {
        return $this->idCommande;
    }

    public function setNom(string $nom)
    {
        $this->Nom = $nom;
    }
    public function getNom()
    {
        return $this->Nom;
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