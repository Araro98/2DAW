<?php
session_start();
if(!isset($_SESSION["usuari"])){
    header("location:index.php");
}


if(isset($_GET["logout"])){
    session_destroy();
    session_abort();
    $_SESSION=null;
    setcookie("user",null,null);
    setcookie("password",null,null);
    header("location:index.php");
}

?>

<a href="?logout">[ Logout ]</a>