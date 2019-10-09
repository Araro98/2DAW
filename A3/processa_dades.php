<?php

echo "El valor del Text és ".$_REQUEST["mytext"];
echo "<br>";
echo "El valor del Radio és ".$_REQUEST["myradio"];
echo "<br>";
foreach($_REQUEST['mycheckbox'] as $value)
{
    echo 'Has seleccionat '.$value.'
'."al Checkbox. ";
}
echo "<br>";
echo "El valor del Text Area és ".$_REQUEST["mytextarea"];

?>