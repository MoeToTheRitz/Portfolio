<?php

class Userdatabase extends SQLite3{
// Userdatabase Constructor
    function __construct(){
        $this->open("quizapp.db");
    }
//Funktion um eingelogten User anzuzeigen (wird nicht aufgerufen)
    function fetchUsersFromDatabase(){
       $res= $this->query("Select * from user;");
       while($row = $res ->fetchArray()){
        $id = $row["id"];
        $email = $row["email"];
        $password = $row["password"];

        echo $id;
        echo"<br>";
        echo $email;
        echo"<br>";
        echo $password;
    
       }
    }
    //Funktion um User anhand von EMail und Passwort zu finden.
    function findUserByCredentials($email,$password){
        $res = $this->query("SELECT * from user WHERE email='$email' AND password='$password'");
        $userdata = $res->fetchArray();
        if($userdata!=false){
            //variablen zuweisen
            $id = $userdata["id"];
            $email = $userdata["email"];
            $password = $userdata["password"];
            $user = new User($id,$email,$password);
            return $user;
        } else {
            return null;
        
        }
    }

}
    
