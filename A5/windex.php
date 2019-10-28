<?php
session_start();

// dades de configuració
$ip = 'localhost'; 
$usuari = 'venturaa'; 
$password = 'venturaa';
$db_name = 'venturaa_test';

// connectem amb la db
$con = mysqli_connect($ip,$usuari,$password,$db_name);
if (!$con)  {
    echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
}

    $sql = "SELECT CORREU FROM Usuaris";
    $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));

mysqli_free_result($resultat);
mysqli_close($con);

$errors="";

if(isset($_GET["cookies"])){
    setcookie("politica","1",time()+365*24*60*60);
}

if(isset($_COOKIE["user"])&&isset($_COOKIE["password"])){

    $usuari="aaron@gmail.com";
    $password="123456";

    if($_COOKIE["user"]==md5($usuari)&&$_COOKIE["password"]==md5($password)){
        $_SESSION["usuari"]=$usuari;
        header("location:privada.php");

    }else{
        setcookie("user",null,null);
        setcookie("password".null,null);
    }
    
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuari="aaron@gmail.com";
    $password="123456";


    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $errors.="email mal<br>";
    }

    if(!preg_match('/^[\w]+$/', $_POST["password"])){
        $errors.="pass mal<br>";
    }

    if(($_POST["email"]!=$usuari||$_POST["password"]!=$password)&&($errors=="")){
        $errors.="Les credencials no son vàlides";
    }else if($_POST["email"]!=$usuari&&$_POST["password"]==$password){
        header("location:privada.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estil.css">
</head>
<body>

    <?php
        if(!isset($_COOKIE["politica"])||!isset($_GET["cookies"])){

    ?>

<form method="post">
    <?=$errors?>

    email: <input type="text" name="email" > <br>
    password: <input type="password" name="password" ><br>
    <input type="submit" value="Login"><br>
    <a href="?registrar">¿No tienes cuenta? Registrate aquí.</a>

</form>

<?php
        }else{
?>

<div id="cookies">
acceptes la politica de cookies?<br>
<a href="?cookies">Acceptar</a><br>
<a href="http://www.google.com">Cancelar</a><br>
</div>
<?php

}
?>

</body>
</html>