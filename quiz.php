<?php
class Quiz{
    private $id;
    private $quizname;
    private $hash;
    private $questiontext;
    private $questionanswer;
    
    function __construct($id=null,$quizname,$hash,$questiontetxt,$questionanswer){
        $this->id = $id;
        $this->quizname = $quizname; 
        $this->hash = $hash;
        $this->questiontext = $questiontext;
        $this->questionanswer = $questionanswer;
    }


    function printQuiz(){
        echo $this->id
        echo $this->Quizname
        echo $this->hash
        
    }
}