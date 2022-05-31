<?php
require "BDs.php";
$con=conect();

$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellido'];
$correo=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$passEnc=md5($pass);

$completo=$nombre." ".$apellidos;


    $sql="INSERT INTO usuarios
        (nombre, correo, contrasena)
        VALUES ('$completo', '$correo', '$pass')";

    $res=$con->query($sql);


    $obtener="SELECT * FROM usuarios
    WHERE correo='$correo'";

    $res=$con->query($obtener);

    while($row=$res->fetch_array()){
        $id=$row["id"];
    }

    $query="INSERT INTO score
    (id_alum)
    VALUES ('$id')";

    $pedid=$con->query($query);


    header("Location: ../index.php");

?>