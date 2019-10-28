<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendari</title>
</head>
<body>
    <?php 
    $mes = date("m"); 
    $año = date("Y");
    $numero = cal_days_in_month(CAL_GREGORIAN, $mes, $año);
    echo "$numero";
    echo "<br>";
    switch ($mes){
        case 1: echo "Enero";
        break;
        case 2: echo "Febrero";
        break;
        case 3: echo "Marzo";
        break;
        case 4: echo "Abril";
        break;
        case 5: echo "Mayo";
        break;
        case 6: echo "Junio";
        break;
        case 7: echo "Julio";
        break;
        case 8: echo "Agosto";
        break;
        case 9: echo "Septiembre";
        break;
        case 10: echo "Octubre";
        break;
        case 11: echo "Noviembre";
        break;
        case 12: echo "Diciembre";
        break;
    }

    ?>
    <br>
    <table>
    <tr>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sabado</th>
        <th>Domingo</th>
    </tr>
    </table>

</body>
</html>