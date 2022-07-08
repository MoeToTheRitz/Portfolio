<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="UTF-8">
    <?php
    require_once "userdatabase.php";
    require_once "user.php";
    session_start();
    ?>

<title>Login</title>

</head>
<!--]Input Felder mit Button für Login[-->
<body>
    <div class="container">
        <h1>Login </h1>
    <form  method="POST">
        <div class="form-group">
            <input type="text" name="email" placeholder="E-Mail" required/>
            <input type="password" name="password" placeholder="Password"required/>
            <input class="btn btn-primary" type="submit" Login value ="Login"/>
            </div>
            </form>
            
        
    

<?php
//Variablen für EMail und Passwort vergeben
$em = $_POST["email"];
$pw = $_POST["password"];
//Überprüfung ob $em und $pw eingefügt wurden
if(isset($em)and isset($pw)){
    $udb =new Userdatabase();
    //User wird anhand eingegebener Werte gesucht.
    $user = $udb->findUserByCredentials($em,$pw);
    if($user!=null){
//Wenn übereinstimmend -> LogIn
        $_SESSION ["user"] = $user;
        header("Location: http://moritzweber.ws2122.fhws-webprog.de/portfolio/frontpage.php",301);
        exit();
    }
//wenn nicht, wird die seite neu geladen
    else {
        session_destroy();
        header("Location: http://moritzweber.ws2122.fhws-webprog.de/portfolio/login.php");
    }

 }
 ?>
            </div>
            </body> 
            </html> 


 
