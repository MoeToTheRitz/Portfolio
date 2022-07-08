<?php
//User Klasse erstellen
class User {
    private $id;
    private $email;
    private $password;

    function __construct($id,$email,$password){
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    function printUser(){
        echo "
        ID: $this->id </br>
        Email: $this->email </br>
        Password: $this->password</br>
        ";
    }


    public function getId(){
        return $this->id;
    }

    public function setId($newId){
        $this->id = $newId;
    }

    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($newEmail){
        $this->email = $newEmail;
    }


    public function getPassword(){
        return $this->password;
    }
    public function setPassword($newPassword){
        $this->password = $newPassword;
    }

}



?>

