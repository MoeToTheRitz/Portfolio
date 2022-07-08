<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="UTF-8">
<title>Login</title>
<?php
include_once "user.php";
include_once "quizdatabase.php";
//Session überprüfen, falls nicht vorhanden wird man wieder auf Login geschickt.
if (!session_id()){
  session_start();
}


if (!$_SESSION["user"]){ 
header("Location:login.php");
die();
}
?>
</head>

<body>

<div class="d-flex justify-content-center">
<h1> Willkommen im Adminbereich </h1>
</div>

<br>
<br>

<!--]Logout Button[-->
<div class="container">
      <form method = POST>
        <input class="btn btn-danger" type="submit" name="logout" value="Logout"/>
      </form>
    </div>

    <br>

    <!--]Quiz erstellen Button[-->
    <div class="container">
      <form method = POST>
        <input class="btn btn-primary" type="submit" name="quiz" value="Quiz erstellen"/>
      </form>
    </div>

    <br>
    <br>

  
    <?php
// Quiz aus Database auslesen
       $db = new Quizdatabase();
       $db ->fetchQuizFromDatabase();
   
  
//Logout und session zerstören wenn Logout Button gedrückt wird
    if($_POST["logout"]){
      session_destroy();
      header("Location: login.php");
      die();
    }
//Weiterleitung auf input.php wo man quiz erstellen kann.
    if ($_POST["quiz"]) {
     header("Location: input.php");
    }
    
    ?>


</body> 
</html>  