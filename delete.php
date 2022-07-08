<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="UTF-8">
<title>Login</title>
<?php
include_once "quizdatabase.php";
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

</head>
<body>
   <h1>Wollen sie das Quiz wirklich löschen ?</h1> 

   <!--]Quiz Löschen button[-->
   <div class="container">
      <form method = POST>
        <input class="btn btn-danger" type="submit" name="delete" value="Löschen"/>
      </form>
    </div>

<!--]Quiz nicht Löschen Button[-->
    <div class="container">
      <form method = POST>
        <input class="btn btn-primary" type="submit" name="nodelete" value="Quiz nicht löschen"/>
      </form>
    </div>
</div>

<?php

$name=$_GET["name"];
echo $name;
//Wenn delete Button gedrückt wird werden Quiz und fragen anhand vom Namen aus der Datenbank gelöscht und zur Frontpage weitergeleitet.
if($_POST["delete"]){
    $db=new Quizdatabase();
    $qdb=new Questiondatabase();
    $db->deleteQuizFromDatabase($name);
    $qdb->deleteQuestionFromDatabase($name);
    header("Location: frontpage.php");

}
//Button nodelte leitet User zurück auf front.php
if($_POST["nodelete"]){

    header("Location: frontpage.php");

}

?>
</body>
</html>