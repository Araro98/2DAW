<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Formulari</title>
</head>
<body style="background-color:#FCFE8C;">

<?php
//validacio

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //text
    if ($_REQUEST["mytext"] == "") {
        print "No ha escrit res al camp de nom";
    } else {
        print "El teu nom es $_REQUEST[mytext]";
    }
    echo "<br>";
    //radio
        echo "Ets del curs: ".$_REQUEST["myradio"];

        echo "<br>";
    //checkbox
    if (isset($_REQUEST["mycheckbox"])){
        foreach($_REQUEST['mycheckbox'] as $value){
            echo 'Tens pendent: '.$value.". ";
        }
    } else {
        echo "No tens ninguna assignatura pendent.";
    }
    echo "<br>";
    //textarea
    
        $input = isset($_REQUEST['mytextarea']) ? strtolower($_REQUEST['mytextarea']) : '';
        if(preg_match('~^[a-z0-9]{5,50}$~', $input)){
            print "Informació extra: $_REQUEST[mytextarea]";
        }else{
            echo 'La informació extra ha de tenir entre 5 i 15 caracters.';
        }
        echo "<br>";

    //subida fitxeros
    $dir_subida = '/home/venturaa/html/ficherosubido-';
    $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
    
    echo "Fitxer: ";
    if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
        echo "S'ha pujat correctament.\n";
    } else {
        echo "No s'ha pujat correctament.\n";
    }
    echo "<br>"
    ?>
        <a href=<?php echo $fichero_subido ?> > Fichero </a>

    <?php    
} else {

//pintar formulari    
?>
<div style="margin: 30px 10%;">
<h1>Formulari</h1>
<h3>Els camps * son obligatoris</h3>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform" name="myform">

    <label>Nom i cognoms *</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />

    <p>Selecciona el teu curs. *</p>
    <input type="radio" name="myradio" value="1DAW" /> Curs 1DAW
    <input type="radio" checked="checked" name="myradio" value="2DAW" /> Curs 2DAW<br /><br />

    <p>Selecciona les assignatures que tens pendents. </p>
    <input type="checkbox" name="mycheckbox[]" value="M01" /> M01
    <input type="checkbox" checked="checked" name="mycheckbox[]" value="M02" /> M02<br /><br />

    <label>Select ... </label>
    <select name="myselect" id="">
        <optgroup label="group 1">
            <option value="1" selected="selected">item one</option>
        </optgroup>
        <optgroup label="group 2" >
            <option value="2">item two</option>
        </optgroup>
    </select><br /><br />

    <p>Informació extra (entre 5 i 50 caracters): *</p>
    <textarea name="mytextarea" id="" rows="3" cols="30"></textarea> <br /><br />

    <input type="hidden" name="size" value="30000" />
    Envia la teva documentació: <input name="fichero_usuario" type="file"/>
    <p><button id="mysubmit" type="submit">Submit</button></p><br/><br/>

</form>
</div>
<?php
}
?>
</body>
</html>