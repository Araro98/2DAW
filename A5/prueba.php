<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>
<body>
<?php
    
    try{
	    $conn = new mysqli('localhost', 'venturaa', 'venturaa', 'venturaa_test');
	}catch(mysqli_sql_exception $e) {
	    $e->errorMessage();
	}
    mysqli_close($con);
?>
</body>
</html>
