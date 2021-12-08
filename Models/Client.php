<?php

    class Client{
        public int $id;
        public string $name;
        public string $lastname;
        private string $email;
        private string $cin;
        private string $street;
        private string $city;
        private string $phone;
        private string $password;
        public $Dateofcreation;
        public string $role;

        function __construct ($id,$name,$lastname,$email,$cin,$street,$city,$phone,$password,$Dateofcreation,$role)
        {
            $this->id = $id;
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->cin = $cin;
            $this->street = $street;
            $this->city = $city;
            $this->phone = $phone;
            $this->password = $password;
            $this->Dateofcreation = $Dateofcreation;
            $this->role = $role;
        }

            /* Client -- Getters */ 
        function getEmail() {
            return $this->email;
        }
        function getCIN() {
            return $this->cin;
        }
        function getStreet() {
            return $this->street;
        }
        function getCity() {
            return $this->city;
        }
        function getPhone() {
            return $this->phone;
        }
        function getPassword() {
            return $this->password;
        }

            /* Client -- Setters */ 
        function setEmail(string $email) {
            $this->email = $email;
        }
        function setPassword(string $password)
        {
            $this->password = $password;
        }
        function setCIN(string $cin)
        {
            $this->cin = $cin;
        }
        /* incase fix these setters */
    }
?>