<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="UTF-8">

<?php
include_once "quizdatabase.php";
include_once "hash.php";
include_once "questiondatabase.php";
include_once "user.php";

//Session überprüfen, falls nicht vorhanden wird man wieder auf Login geschickt.
if (!session_id()){
    session_start();
  }
  
  
  if (!$_SESSION["user"]){ 
  header("Location:login.php");
  die();
}
?>
 
<title>Quiz</title>
</head>
<body>

    <h1 class="text-center"> Quiz erstellen</h1>
<!--]Input Fekder für quizname und die jewiligen Fragen und Antworten[-->
    <form  method="POST">
        <div class="form-group text-center">

        <input class="w-25 p-2" type="text" name="quizname" placeholder="Quiz Name" required/>

        <br>
        <br>
            <input class="w-25 p-2" type="text" name="quest1" placeholder="Frage 1" required/>
            <input class="w-25 p-2" type="text" name="answer1" placeholder="Antwort 1"required/>
            <br>
            <input class="w-25 p-2" type="text" name="quest2" placeholder="Frage 2" required/>
            <input class="w-25 p-2" type="text" name="answer2" placeholder="Antwort 2"required/>
            <br>
            <input class="w-25 p-2" type="text" name="quest3" placeholder="Frage 3" required/>
            <input class="w-25 p-2" type="text" name="answer3" placeholder="Antwort 3"required/>
            <br>
            <br>
            <input class="btn btn-primary" type="submit" Login value ="Quiz Erstellen"/>
            </div>
            </form>


<?php

//Variablen für Quiz Input Felder zuweisen.
$qn=$_POST["quizname"];

$qu1=$_POST["quest1"];
$qu2=$_POST["quest2"];
$qu3=$_POST["quest3"];

$an1=$_POST["answer1"];
$an2=$_POST["answer2"];
$an3=$_POST["answer3"];


//Überprüfen ob alle felder eingegeben wurde
if(isset($qn)and isset($qu1)and isset($an1)and isset($qu2)and isset($an2)and isset($qu3)and isset($an3)){
    //Hash wird durch Hash Funktion generiert und Variable $h zugewiesen
    $h=generateHash(1,2);
    $db = new Quizdatabase();
    //Neues Quiz wird generiert  und in die Datenbank eingepflegt
   $db->createNewQuiz($qn,$h);

   $qdb = new Questiondatabase();
   //Fragen werden generiert und in die Datenbank eingepflegt
   $qdb->createNewQuestion($qu1,$qn,$an1);
   $qdb->createNewQuestion($qu2,$qn,$an2);
   $qdb->createNewQuestion($qu3,$qn,$an3);
   header("Location:frontpage.php");

   
}

?>

</body>
</html>