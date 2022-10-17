<?php

var_dump($_POST);
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($_FILES);
echo "<br>";
echo $_FILES["archivo"]["name"];
echo "<br>";
 $campo = explode(".", $_FILES["archivo"]["name"]);
var_dump($campo);
$extension = $campo[1];
echo "<br>";
echo $extension;
echo "<br>";

$sabor= $_POST["sabor"];
echo "<br>";
echo $sabor;

$tipo =$_POST["tipo"];
echo "<br>";
echo $tipo;

//mantecadp_crema.css


$rutadearchivonuevo = "helados" . "/" . $sabor . "_" . $tipo ."." .$extension;

// $destino = "uploads/" . $_POST["nombre"] . "." . $extension;
move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutadearchivonuevo);


// if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {
//     echo "guardado";
// } else {
//     echo "no guardado". "<br>";
//     echo $_FILES["archivo"]["error"];
// }
