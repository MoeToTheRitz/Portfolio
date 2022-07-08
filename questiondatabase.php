<?php

class Questiondatabase extends SQLite3{

function __construct(){
    $this->open("quizapp.db");
}

//Fragen in Tabelle eintragen
function createNewQuestion($qt,$qn,$qa){ 
    $this->exec("INSERT INTO question(questiontext,quizname,questionanswer) VALUES('$qt','$qn','$qa')");
}


//Quiz aus Tabelle löschen
function deleteQuestionFromDatabase($name){
    $this->exec("DELETE FROM question WHERE quizname='$name'");
}

}