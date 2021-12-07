<?php
class Commande
{
    private string $idCommande;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $adress;
    private string $adress2;
    private string $country;
    private string $state;
    private string $zipcode;
    private float $total_price;
    private string $order_status;
    private string $dateCommande;
    private string $dateUpdate;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $adress,
        string $adress2,
        string $country,
        string $state,
        string $zipcode,
        float $total_price,
        string $order_status
    ) {
        $this->firstname = $firstName;
        $this->lastname = $lastName;
        $this->email = $email;
        $this->adress = $adress;
        $this->adress2 = $adress2;
        $this->country = $country;
        $this->state = $state;
        $this->zipcode = $zipcode;
        $this->total_price = $total_price;
        $this->order_status = $order_status;
    }

    public function getId()
    {
        return $this->idCommande;
    }

    public function setStatus(string $order_status)
    {
        $this->order_status = $order_status;
    }
    public function getStatus()
    {
        return $this->order_status;
    }

    public function setFirst(string $firstName)
    {
        $this->firstName = $firstName;
    }
    public function getFirst()
    {
        return $this->firstName;
    }

    public function setLast(string $lastName)
    {
        $this->$lastName = $lastName;
    }
    public function getLast()
    {
        return $this->lastName;
    }

    public function setEmail(string $email)
    {
        $this->$email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setAdress(string $adress)
    {
        $this->$adress = $adress;
    }
    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress2(string $adress2)
    {
        $this->$adress2 = $adress2;
    }
    public function getAdress2()
    {
        return $this->adress2;
    }

    public function setCountry(string $country)
    {
        $this->$country = $country;
    }
    public function getCountry()
    {
        return $this->country;
    }


    public function setState(string $state)
    {
        $this->$state = $state;
    }
    public function getState()
    {
        return $this->state;
    }

    public function setZip(string $zipcode)
    {
        $this->$zipcode = $zipcode;
    }
    public function getZip()
    {
        return $this->zipcode;
    }

    public function setPrice(int $total_price)
    {
        $this->total_price = $total_price;
    }
    public function getPrice()
    {
        return $this->total_price;
    }

    public function getDate()
    {
        return $this->dateCommande;
    }
}
