<?php

class Quizdatabase extends SQLite3{

function __construct(){
    $this->open("quizapp.db");
}

//Quiz in Tabelle eintragen
function createNewQuiz($quizname,$hash){ 
    $this->exec("INSERT INTO quiz(name,hash) VALUES('$quizname','$hash');"); 
}

//Quiz anzeigen mit id namen und hash, dazu jeweils einen Button
function fetchQuizFromDatabase(){
    $res = $this->query("SELECT * FROM quiz;");
    while ($row = $res->fetchArray()){
        $id = $row["id"];
        $name = $row["name"];
        $hash = $row["hash"];
      
        echo " 
        <div>
        <div class='d-flex justify-content-center font-italic'>
        <h5>ID:$id</h5>
        </div>

        <br>

        <div class='d-flex justify-content-center font-weight-bold'>
        <h6>Quizname: $name</h6>
        </div>

        <br>

        <div class='d-flex justify-content-center font-weight-bold'>
        <h6>Quizhash: $hash</h6>
        </div>

        <br>
        
        </div>
       

       
        <div class='container d-flex justify-content-center'>
               <form action=delete.php?name=$name  method=POST  >
                    <input class='btn btn-danger' type='submit' name='deletequiz' value='Quiz Löschen' />
                </form>
       </div>
       <hr style='border:2px solid black';>
        ";

    }


}
    //Quiz aus Tabelle löschen
    function deleteQuizFromDatabase($name){
        $this->exec("DELETE FROM quiz WHERE name='$name'");
}
}